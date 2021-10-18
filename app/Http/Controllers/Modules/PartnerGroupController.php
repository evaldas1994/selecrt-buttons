<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\PartnerGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PartnerGroupStoreUpdateRequest;

class PartnerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partnerGroups = PartnerGroup::simplePaginate();

        return view('modules.partnerGroup.index', compact('partnerGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.partnerGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerGroupStoreUpdateRequest $request)
    {
        PartnerGroup::create($request->validated());

        return redirect()->route('partner-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PartnerGroup $partnerGroup
     * @return View
     */
    public function edit(PartnerGroup $partnerGroup)
    {
        return view('modules.partnerGroup.edit', compact('partnerGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerGroupStoreUpdateRequest $request
     * @param PartnerGroup $partnerGroup
     * @return RedirectResponse
     */
    public function update(PartnerGroupStoreUpdateRequest $request, PartnerGroup $partnerGroup)
    {
        try {
            $partnerGroup->update($request->validated());

            return redirect()->route('partner-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('partner-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PartnerGroup $partnerGroup
     * @return RedirectResponse
     */
    public function destroy(PartnerGroup $partnerGroup)
    {
        try {
            $partnerGroup->delete();

            return redirect()->route('partner-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partner-groups.index')->withError(trans('global.delete_failed'));
        }
    }
}
