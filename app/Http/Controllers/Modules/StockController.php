<?php

namespace App\Http\Controllers\Modules;

use App\Models\Vat;
use App\Models\Unit;
use App\Models\Disch;
use App\Models\Stock;
use App\Models\Person;
use App\Models\Partner;
use App\Models\Account;
use App\Models\Project;
use App\Models\Currency;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Models\Department;
use App\Models\StockGroup;
use Illuminate\Support\Arr;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StockStoreUpdateRequest;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stocks = Stock::simplePaginate();

        return view('modules.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $units = Unit::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $manufacturers = Manufacturer::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $discountsh = Disch::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $types = Stock::$types;
        $pacTypes = Stock::$gpaisPacTypes;
        $defaultUnit = Stock::$defaultUnit;

        return view('modules.stock.create', compact(
            'stockGroups',
            'units',
            'manufacturers',
            'discountsh',
            'vats',
            'stocks',
            'currencies',
            'partners',
            'accounts',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'persons',
            'projects',
            'types',
            'pacTypes',
            'defaultUnit'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StockStoreUpdateRequest $request)
    {
        $stock = Stock::create($request->validated());

        switch ($request->input('action')) {
            case 'price-sale-create':
                return redirect()->route('prices.create' , [$stock, 'S']);

            case 'price-purch-create':
                return redirect()->route('prices.create' , [$stock, 'P']);
        }

        if (session()->exists('queue_of_actions')) {
            $lastOfQueue = Arr::last(session('queue_of_actions'));

            $prevRoute = Arr::get($lastOfQueue, 'route-prev.route');
            $prevData = Arr::get($lastOfQueue, 'route-prev.data');
            $targetField = Arr::get($lastOfQueue, 'route-prev.target_field');

            // collect data
            $prevData = Arr::set($prevData, $targetField, $stock->f_id);

            //remove session
            session()->forget('queue_of_actions');

            //redirect
            return redirect()->route($prevRoute)->withInput($prevData);
        }
        return redirect()->route('stocks.index', $stock)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stock $stock
     * @return View
     */
    public function edit(Stock $stock)
    {
        $pricesSale = $stock->prices()->where('f_type', 'S')->get();;
        $pricesPurch = $stock->prices()->where('f_type', 'P')->get();;

        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $units = Unit::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $manufacturers = Manufacturer::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $discountsh = Disch::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $types = Stock::$types;
        $pacTypes = Stock::$gpaisPacTypes;

        return view('modules.stock.edit', compact(
            'pricesSale',
            'pricesPurch',
            'stock',
            'stockGroups',
            'units',
            'manufacturers',
            'discountsh',
            'vats',
            'stocks',
            'currencies',
            'partners',
            'accounts',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'persons',
            'projects',
            'types',
            'pacTypes'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function update(StockStoreUpdateRequest $request, Stock $stock)
    {
        try {
            $stock->update($request->validated());

            switch ($request->input('action')) {
                case 'price-sale-create':
                    return redirect()->route('prices.create' , [$stock, 'S']);

                case 'price-purch-create':
                    return redirect()->route('prices.create' , [$stock, 'P']);
            }

            return redirect()->route('stocks.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function destroy(Stock $stock)
    {
        try {
            $stock->delete();

            return redirect()->route('stocks.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.index')->withError(trans('global.delete_failed'));
        }
    }
}
