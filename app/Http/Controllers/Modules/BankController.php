<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bank;
use App\Models\Stock;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Services\Modules\BankService;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\StockService;
use App\Http\Requests\BarcodeStoreUpdateRequest;

class BankController extends Controller
{
    private $bankService;

    public function __construct()
    {
        $this->bankService = new BankService(Bank::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $banks = $this->bankService->all();

        return view('modules.bank.index', compact('banks'));
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

        return view('modules.bank.create', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BarcodeStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BarcodeStoreUpdateRequest $request)
    {
        $this->bankService->create($request->input());

        return redirect()->route('banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $bank = $this->bankService->findById($id);

        return view('modules.bank.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $bank = $this->bankService->findById($id);

        $stockService = new StockService(Stock::class);
        $stocks = $stockService->all();

        return view('modules.bank.edit', compact('bank', 'stocks'));
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
        $this->bankService->update($id, $request->input());

        return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->bankService->destroy($id);

        return redirect()->route('banks.index');
    }
}
