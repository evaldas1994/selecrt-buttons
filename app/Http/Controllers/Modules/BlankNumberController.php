<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Counter;
use Illuminate\View\View;
use App\Models\BlankNumber;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BlankNumberStoreUpdateRequest;

class BlankNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $blankNumbers = BlankNumber::simplePaginate();

        return view('modules.blankNumber.index', compact('blankNumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $counters = Counter::select('f_id', 'f_txt')->orderBy('f_txt')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.blankNumber.create', compact('counters', 'stores', 'stockOperationGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlankNumberStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BlankNumberStoreUpdateRequest $request)
    {
        BlankNumber::create($request->validated());

        return redirect()->route('blank-numbers.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlankNumber $blankNumber
     * @return View
     */
    public function edit(BlankNumber $blankNumber)
    {
        $counters = Counter::select('f_id', 'f_txt')->orderBy('f_txt')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.blankNumber.edit', compact('blankNumber', 'stores', 'counters', 'stockOperationGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlankNumberStoreUpdateRequest $request
     * @param BlankNumber $blankNumber
     * @return RedirectResponse
     */
    public function update(BlankNumberStoreUpdateRequest $request, BlankNumber $blankNumber)
    {
        try {
            $blankNumber->update($request->validated());

            return redirect()->route('blank-numbers.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('blank-numbers.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BlankNumber $blankNumber
     * @return RedirectResponse
     */
    public function destroy(BlankNumber $blankNumber)
    {
        try {
            $blankNumber->delete();

            return redirect()->route('blank-numbers.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('blank-numbers.index')->withError(trans('global.delete_failed'));
        }
    }
}
