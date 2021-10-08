<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Barcode;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\StockService;
use App\Services\Modules\BarcodeService;
use App\Http\Requests\BarcodeStoreUpdateRequest;

class BarcodeController extends Controller
{
    private $barcodeService;

    public function __construct()
    {
        $this->barcodeService = new BarcodeService(Barcode::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $barcodes = $this->barcodeService->all();

        return view('modules.barcode.index', compact('barcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stockService = new StockService(Stock::class);
        $stocks = $stockService->all();

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
        $this->barcodeService->create($request->input());

        return redirect()->route('barcodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $barcode = $this->barcodeService->findById($id);

        return view('modules.barcode.show', compact('barcode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $barcode = $this->barcodeService->findById($id);

        $stockService = new StockService(Stock::class);
        $stocks = $stockService->all();

        return view('modules.barcode.edit', compact('barcode', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BarcodeStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BarcodeStoreUpdateRequest $request, $id)
    {
        $this->barcodeService->update($id, $request->input());

        return redirect()->route('barcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->barcodeService->destroy($id);

        return redirect()->route('barcodes.index');
    }
}
