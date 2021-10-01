<?php

namespace App\Http\Controllers;

use App\Models\Cur;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\Vat;
use App\Services\CurService;
use App\Services\UnitService;
use App\Services\VatService;
use Illuminate\View\View;
use App\Services\StockService;
use App\Http\Requests\StockRequest;
use Illuminate\Http\RedirectResponse;

class StockController extends Controller
{

    private $stockService;

    public function __construct()
    {
        $this->stockService = new StockService(Stock::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stocks = $this->stockService->all();

        return view('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $unitService = new UnitService(Unit::class);
        $units = $unitService->all();

        $vatService = new VatService(Vat::class);
        $vats = $vatService->all();

        $curService = new CurService(Cur::class);
        $curs = $curService->all();

        return view('stock.create', compact('units', 'vats', 'curs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockRequest $request
     * @return RedirectResponse
     */
    public function store(StockRequest $request)
    {
        $this->stockService->create($request->input());

        return redirect()->route('stocks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $stock = $this->stockService->findById($id);

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $stock = $this->stockService->findById($id);

        $unitService = new UnitService(Unit::class);
        $units = $unitService->all();

        $vatService = new VatService(Vat::class);
        $vats = $vatService->all();

        $curService = new CurService(Cur::class);
        $curs = $curService->all();

        return view('stock.edit', compact('stock', 'units', 'vats', 'curs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(StockRequest $request, $id)
    {
        $this->stockService->update($id, $request->input());

        return redirect()->route('stocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->stockService->destroy($id);

        return redirect()->route('stocks.index');
    }
}
