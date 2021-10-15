<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetGroupStoreUpdateRequest;
use App\Models\AssetGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssetGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $assetGroups = AssetGroup::simplePaginate();

        return view('modules.assetGroup.index', compact('assetGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.assetGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssetGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(AssetGroupStoreUpdateRequest $request)
    {
        AssetGroup::create($request->validated());

        return redirect()->route('asset-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AssetGroup $assetGroup
     * @return View
     */
    public function edit(AssetGroup $assetGroup)
    {
        return view('modules.assetGroup.edit', compact('assetGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssetGroupStoreUpdateRequest $request
     * @param AssetGroup $assetGroup
     * @return RedirectResponse
     */
    public function update(AssetGroupStoreUpdateRequest $request, AssetGroup $assetGroup)
    {
        try {
            $assetGroup->update($request->validated());

            return redirect()->route('asset-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('asset-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AssetGroup $assetGroup
     * @return RedirectResponse
     */
    public function destroy(AssetGroup $assetGroup)
    {
        try {
            $assetGroup->delete();

            return redirect()->route('asset-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('asset-groups.index')->withError(trans('global.delete_failed'));
        }
    }
}
