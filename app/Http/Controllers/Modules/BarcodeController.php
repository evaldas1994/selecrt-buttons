<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Barcode;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BarcodeStoreUpdateRequest;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $barcodes = Barcode::simplePaginate();

        return view('modules.barcode.index', compact('barcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.barcode.create', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BarcodeStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BarcodeStoreUpdateRequest $request)
    {
        Barcode::create($request->validated());

        return redirect()->route('barcodes.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Barcode $barcode
     * @return View
     */
    public function edit(Barcode $barcode)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.barcode.edit', compact('barcode', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BarcodeStoreUpdateRequest $request
     * @param Barcode $barcode
     * @return RedirectResponse
     */
    public function update(BarcodeStoreUpdateRequest $request, Barcode $barcode)
    {
        try {
            $barcode->update($request->validated());

            return redirect()->route('barcodes.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('barcodes.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Barcode $barcode
     * @return RedirectResponse
     */
    public function destroy(Barcode $barcode)
    {
        try {
            $barcode->delete();

            return redirect()->route('barcodes.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('barcodes.index')->withError(trans('global.delete_failed'));
        }
    }
}
