<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\Discounth;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscounthStoreUpdateRequest;

class DiscounthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $discounts = Discounth::simplePaginate();

        return view('modules.discounth.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.discounth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscounthStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DiscounthStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $discountsh = Discounth::create($request->validated());

        return $this->checkButtonAction($request, $discountsh, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Discounth $discountsh
     * @return View
     */
    public function edit(Discounth $discountsh)
    {
        $allDiscountsd = $discountsh->discountsd;

        return view('modules.discounth.edit', compact('discountsh', 'allDiscountsd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscounthStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function update(DiscounthStoreUpdateRequest $request, Discounth $discountsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountsh);
        }

        try {
            $discountsh->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('discountsh.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $discountsh, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function destroy(Discounth $discountsh)
    {
        try {
            $discountsh->delete();

            return redirect()->route('discountsh.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(DiscounthStoreUpdateRequest $request, Discounth $discounth, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'discountd-create':
                return redirect()->route('discountsh.edit', $discounth);
        }

        return redirect()->route('discountsh.index')->withSuccess(trans($message));
    }

    private function checkButtonActionWithoutValidation(DiscounthStoreUpdateRequest $request, Discounth $disch = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('discountsh.index');
        }

        return redirect()->route('discountsh.index')->withSuccess(trans($message));
    }
}
