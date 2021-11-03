<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Store;
use App\Models\Markup;
use App\Models\Partner;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Models\StockGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MarkupStoreUpdateRequest;

class MarkupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $markups = Markup::simplePaginate();

        return view('modules.markup.index', compact('markups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.markup.create', compact(
            'stocks',
            'partners',
            'stockGroups',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MarkupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(MarkupStoreUpdateRequest $request)
    {
        Markup::create($request->validated());

        return redirect()->route('markups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Markup $markup
     * @return View
     */
    public function edit(Markup $markup)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.markup.edit', compact(
            'markup',
            'stocks',
            'partners',
            'stockGroups',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MarkupStoreUpdateRequest $request
     * @param Markup $markup
     * @return RedirectResponse
     */
    public function update(MarkupStoreUpdateRequest $request, Markup $markup)
    {
        try {
            $markup->update($request->validated());

            return redirect()->route('markups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('markups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Markup $markup
     * @return RedirectResponse
     */
    public function destroy(Markup $markup)
    {
        try {
            $markup->delete();

            return redirect()->route('markups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('markups.index')->withError(trans('global.delete_failed'));
        }
    }
}
