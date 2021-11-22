<?php

namespace App\Http\Controllers\Modules;

use App\Models\Discountd;
use App\Models\Discounth;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscountdStoreUpdateRequest;

class DiscountdController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Discounth $discounth)
    {
        return view('modules.discountd.create', compact('discounth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscountdStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function store(DiscountdStoreUpdateRequest $request, Discounth $discountsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountsh);
        }

        $discountsh->discountsd()->create($request->validated());

        return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Discounth $discounth
     * @param Discountd $discountd
     * @return View
     */
    public function edit(Discounth $discounth, Discountd $discountd)
    {
        return view('modules.discountd.edit', compact('discounth', 'discountd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscountdStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @param Discountd $discountsd
     * @return RedirectResponse
     */
    public function update(DiscountdStoreUpdateRequest $request, Discounth $discountsh, Discountd $discountsd)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountsh);
        }

        try {
            $discountsd->update($request->validated());

            return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.edit', $discountsh)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discounth $discountsh
     * @param Discountd $discountsd
     * @return RedirectResponse
     */
    public function destroy(Discounth $discountsh, Discountd $discountsd)
    {
        try {
            $discountsd->delete();

            return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.edit', $discountsh)->withError(trans('global.delete_failed'));
        }
    }
}
