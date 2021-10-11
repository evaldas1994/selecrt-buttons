<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\CounterStoreUpdateRequest;
use App\Models\Counter;
use App\Models\Stock;
use App\Services\Modules\CounterService;
use App\Services\Modules\StockService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CounterController extends Controller
{
    private $counterService;

    public function __construct()
    {
        $this->counterService = new CounterService(Counter::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $counters = $this->counterService->all();

        return view('modules.counter.index', compact('counters'));
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

        return view('modules.counter.create', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CounterStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(CounterStoreUpdateRequest $request)
    {
        $this->counterService->create($request->input());

        return redirect()->route('counters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $counter = $this->counterService->findById($id);

        return view('modules.counter.show', compact('counter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $counter = $this->counterService->findById($id);

        $stockService = new StockService(Stock::class);
        $stocks = $stockService->all();

        return view('modules.counter.edit', compact('counter', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CounterStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CounterStoreUpdateRequest $request, $id)
    {
        $this->counterService->update($id, $request->input());

        return redirect()->route('counters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->counterService->destroy($id);

        return redirect()->route('counters.index');
    }
}
