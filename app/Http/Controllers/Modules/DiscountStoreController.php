<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use Illuminate\View\View;
use App\Models\Discounth;
use Illuminate\Support\Arr;
use App\Models\DiscountStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscountStoreStoreUpdateRequest;

class DiscountStoreController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Discounth $discountsh)
    {
        dd('create');
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.discountStore.create', compact('discountsh','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscountStoreStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function store(DiscountStoreStoreUpdateRequest $request, Discounth $discountsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $discountsh->components()->create($request->validated());

        return redirect()->route('discount-stores.edit', $discountsh)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Discounth $discountsh
     * @param DiscountStore $discountStore
     * @return View
     */
    public function edit(Discounth $discountsh, DiscountStore $discountStore)
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.discountStore.edit', compact('discountsh', 'discountStore', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscountStoreStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @param DiscountStore $discountStore
     * @return RedirectResponse
     */
    public function update(DiscountStoreStoreUpdateRequest $request, Discounth $discountsh, DiscountStore $discountStore)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        try {
            $discountStore->update($request->validated());

            return redirect()->route('discount-stores.edit', $discountsh)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('discount-stores.edit', $discountsh)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discounth $discountsh
     * @param DiscountStore $discountStore
     * @return RedirectResponse
     */
    public function destroy(Discounth $discountsh, DiscountStore $discountStore)
    {
        try {
            $discountStore->delete();

            return redirect()->route('discount-stores.edit', $discountsh)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discount-stores.edit', $discountsh)->withError(trans('global.delete_failed'));
        }
    }
}
