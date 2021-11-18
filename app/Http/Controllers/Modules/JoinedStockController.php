<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use Illuminate\View\View;
use App\Models\JoinedStock;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JoinedStockStoreUpdateRequest;

class JoinedStockController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Stock $stock
     * @return View
     */
    public function create(Stock $stock)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.joinedStock.create', compact('stock', 'stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JoinedStockStoreUpdateRequest $request
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function store(JoinedStockStoreUpdateRequest $request, Stock $stock)
    {
        $stock->joinedStocks()->create($request->validated());

        return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stock $stock
     * @param JoinedStock $joinedStock
     * @return View
     */
    public function edit(Stock $stock, JoinedStock $joinedStock)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.joinedStock.create', compact('stock', 'joinedStock', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JoinedStockStoreUpdateRequest $request
     * @param Stock $stock
     * @param JoinedStock $joinedStock
     * @return RedirectResponse
     */
    public function update(JoinedStockStoreUpdateRequest $request, Stock $stock, JoinedStock $joinedStock)
    {
        try {
            $joinedStock->update($request->validated());

            return redirect()->route('joined-stocks.edit', $stock)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('joined-stocks.edit', $stock)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stock $stock
     * @param JoinedStock $joinedStock
     * @return RedirectResponse
     */
    public function destroy(Stock $stock, JoinedStock $joinedStock)
    {
        try {
            $joinedStock->delete();

            return redirect()->route('joined-stocks.edit', $stock)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('joined-stocks.edit', $stock)->withError(trans('global.delete_failed'));
        }
    }
}
