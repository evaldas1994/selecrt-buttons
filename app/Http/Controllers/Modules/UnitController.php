<?php

namespace App\Http\Controllers\Modules;

use App\Models\Unit;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UnitStoreUpdateRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $units = Unit::orderBy('f_create_date', 'desc')->simplePaginate();

        return view('modules.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(UnitStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

//        return $this->checkButtonAction($request, $productionCard, 'global.created_successfully');

        $unit = Unit::create($request->validated());

        if (session()->exists('queue_of_actions')) {
            $arr = session('queue_of_actions');

            $lastOfQueue = Arr::pull($arr, key(array_slice($arr, -1, 1, true)));
            if ($arr === []) {
                session()->forget('queue_of_actions');
            }else {
                session(['queue_of_actions' => $arr]);
            }

            $prevRoute = Arr::get($lastOfQueue, 'route-prev.route');
            $prevData = Arr::get($lastOfQueue, 'route-prev.data');
            $targetField = Arr::get($lastOfQueue, 'route-prev.target_field');

            // collect data
            $prevData = Arr::set($prevData, $targetField, $unit->f_id);

            //redirect
            if ($prevData['_method'] == 'PUT' || $prevData['_method'] == 'PATCH')
            {
                $id = Arr::get($prevData, 'f_id');
//                dd($prevRoute, $id);
                return redirect()->route($prevRoute, $id)->withInput($prevData);
            } else {
                return redirect()->route($prevRoute)->withInput($prevData);
            }
        }

        return redirect()->route('units.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Unit $unit
     * @return View
     */
    public function edit(Unit $unit)
    {
        return view('modules.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitStoreUpdateRequest $request
     * @param Unit $unit
     * @return RedirectResponse
     */
    public function update(UnitStoreUpdateRequest $request, Unit $unit)
    {
        try {
            $unit->update($request->validated());

            return redirect()->route('units.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('units.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Unit $unit
     * @return RedirectResponse
     */
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();

            return redirect()->route('units.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('units.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonActionWithoutValidation(
        UnitStoreUpdateRequest $request,
        Unit $unit = null,
        string $message = 'global.empty'
    ): RedirectResponse {
//        session()->forget('queue_of_actions');
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));

        switch (Arr::first($actionWithoutValidation)) {
            case 'close':
                return redirect()->route('units.index');

            case 'selected-by':
                $unitId = $actionWithoutValidation[1];
                if (session()->exists('queue_of_actions')) {
                    $arr = session('queue_of_actions');

                    $lastOfQueue = Arr::pull($arr, key(array_slice($arr, -1, 1, true)));
                    if ($arr === []) {
                        session()->forget('queue_of_actions');
                    }else {
                        session(['queue_of_actions' => $arr]);
                    }

                    $prevRoute = Arr::get($lastOfQueue, 'route-prev.route');
                    $prevData = Arr::get($lastOfQueue, 'route-prev.data');
                    $targetField = Arr::get($lastOfQueue, 'route-prev.target_field');

                    // collect data
                    $prevData = Arr::set($prevData, $targetField, $unitId);

                    //redirect
                    if ($prevData['_method'] == 'PUT' || $prevData['_method'] == 'PATCH')
                    {
                        $id = Arr::get($prevData, 'f_id');
                        return redirect()->route($prevRoute, $id)->withInput($prevData);
                    } else {
                        return redirect()->route($prevRoute)->withInput($prevData);
                    }
                }
                return redirect()->route('units.index');
        }

        return redirect()->route('units.index')->withSuccess(trans($message));
    }

    private function getPrevRoute(): string
    {
        return app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
    }

    private function getQueueOfActionsSessionData($prevRoute, $prevData, $nextRoute, $nextData, $field): array
    {
        $data = Arr::add([], 'route-prev.route', $prevRoute);
        $data = Arr::add($data, 'route-prev.data', $prevData);
        $data = Arr::add($data, 'route-next.route', $nextRoute);
        $data = Arr::add($data, 'route-next.data', $nextData);
        $data = Arr::add($data, 'route-prev.target_field', $field);

        return $data;
    }
}
