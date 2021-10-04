<?php

namespace App\Http\Controllers;

use App\Models\Cur;
use App\Models\R1;
use App\Models\R2;
use App\Models\R3;
use App\Models\R4;
use App\Models\R5;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\Vat;
use App\Services\CurService;
use App\Services\R1Service;
use App\Services\R2Service;
use App\Services\R3Service;
use App\Services\R4Service;
use App\Services\R5Service;
use App\Services\UnitService;
use App\Services\VatService;
use Illuminate\View\View;
use App\Services\StockService;
use App\Http\Requests\StockStoreUpdateRequest;
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

        $r1Service = new R1Service(R1::class);
        $r1s = $r1Service->all();

        $r2Service = new R2Service(R2::class);
        $r2s = $r2Service->all();

        $r3Service = new R3Service(R3::class);
        $r3s = $r3Service->all();

        $r4Service = new R4Service(R4::class);
        $r4s = $r4Service->all();

        $r5Service = new R5Service(R5::class);
        $r5s = $r5Service->all();

        return view('stock.create', compact('units', 'vats', 'curs', 'r1s', 'r2s', 'r3s', 'r4s', 'r5s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StockStoreUpdateRequest $request)
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

        $r1Service = new R1Service(R1::class);
        $r1s = $r1Service->all();

        $r2Service = new R2Service(R2::class);
        $r2s = $r2Service->all();

        $r3Service = new R3Service(R3::class);
        $r3s = $r3Service->all();

        $r4Service = new R4Service(R4::class);
        $r4s = $r4Service->all();

        $r5Service = new R5Service(R5::class);
        $r5s = $r5Service->all();

        return view('stock.edit', compact('stock', 'units', 'vats', 'curs', 'r1s', 'r2s', 'r3s', 'r4s', 'r5s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(StockStoreUpdateRequest $request, $id)
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
