<?php

namespace App\Http\Controllers\Modules;

use App\Models\Disch;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DischStoreUpdateRequest;

class DischController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $discounts = Disch::simplePaginate();

        return view('modules.disch.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.disch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DischStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DischStoreUpdateRequest $request)
    {
        Disch::create($request->validated());

        return redirect()->route('discountsh.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disch $discountsh
     * @return View
     */
    public function edit(Disch $discountsh)
    {
        return view('modules.disch.edit', compact('discountsh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DischStoreUpdateRequest $request
     * @param Disch $disch
     * @return RedirectResponse
     */
    public function update(DischStoreUpdateRequest $request, Disch $discountsh)
    {
        try {
            $discountsh->update($request->validated());

            return redirect()->route('discountsh.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Disch $discountsh
     * @return RedirectResponse
     */
    public function destroy(Disch $discountsh)
    {
        try {
            $discountsh->delete();

            return redirect()->route('discountsh.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.index')->withError(trans('global.delete_failed'));
        }
    }
}
