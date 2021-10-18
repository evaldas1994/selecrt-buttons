<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ManufacturerStoreUpdateRequest;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $manufacturers = Manufacturer::simplePaginate();

        return view('modules.manufacturer.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManufacturerStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ManufacturerStoreUpdateRequest $request)
    {
        Manufacturer::create($request->validated());

        return redirect()->route('manufacturers.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Manufacturer $manufacturer
     * @return View
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('modules.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManufacturerStoreUpdateRequest $request
     * @param Manufacturer $manufacturer
     * @return RedirectResponse
     */
    public function update(ManufacturerStoreUpdateRequest $request, Manufacturer $manufacturer)
    {
        try {
            $manufacturer->update($request->validated());

            return redirect()->route('manufacturers.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('manufacturers.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Manufacturer $manufacturer
     * @return RedirectResponse
     */
    public function destroy(Manufacturer $manufacturer)
    {
        try {
            $manufacturer->delete();

            return redirect()->route('manufacturers.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('manufacturers.index')->withError(trans('global.delete_failed'));
        }
    }
}
