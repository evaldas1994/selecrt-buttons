<?php

namespace App\Http\Controllers\Modules;

use App\Models\Vat;
use App\Models\Vat2;
use Illuminate\Support\Arr;
use App\Helpers\Classes\Grid;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\VatStoreUpdateRequest;

class VatController extends Controller
{

    protected $gridFormName = 'vat.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $grid = new Grid($this->gridFormName);

        $vats = Vat::sortable($grid->getSortableDefaultColumn())->simplePaginate();

        return view('modules.vat.index', compact('vats'))->withForm($this->gridFormName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $vat2s = Vat2::select('f_id', 'f_name')->orderBy('f_order')->get();

        return view('modules.vat.create', compact('vat2s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VatStoreUpdateRequest $request
     *
     *
     */
    public function store(VatStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $vat = Vat::create($request->validated());

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
            $prevData = Arr::set($prevData, $targetField, $vat->f_id);

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

        return redirect()->route('vats.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vat $vat
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Vat $vat)
    {
        $vat2s = Vat2::select('f_id', 'f_name')->orderBy('f_order')->get();
        return view('modules.vat.edit', compact('vat2s', 'vat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VatStoreUpdateRequest $request
     * @param Vat $vat
     *
     * @return \Illuminate\Http\Response
     */
    public function update(VatStoreUpdateRequest $request, Vat $vat)
    {
        $vat->update($request->validated());
        return redirect()->route('vats.index')->withSuccess(trans('global.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vat $vat
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat)
    {
        try {
            $vat->delete();
            return redirect()->route('vats.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('vats.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonActionWithoutValidation(
        VatStoreUpdateRequest $request,
        Vat $vat = null,
        string $message = 'global.empty'
    ): RedirectResponse {
//        session()->forget('queue_of_actions');
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));

        switch (Arr::first($actionWithoutValidation)) {
            case 'close':
                return redirect()->route('vats.index');

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
                return redirect()->route('vats.index');
        }

        return redirect()->route('vats.index')->withSuccess(trans($message));
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
