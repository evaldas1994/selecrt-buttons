<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Counter;
use Illuminate\View\View;
use App\Models\BlankNumber;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\StoreService;
use App\Services\Modules\CounterService;
use App\Services\Modules\BlankNumberService;
use App\Http\Requests\BlankNumberStoreUpdateRequest;

class BlankNumberController extends Controller
{
    private $blankNumberService;

    public function __construct()
    {
        $this->blankNumberService = new BlankNumberService(BlankNumber::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $blankNumbers = $this->blankNumberService->all();

        return view('modules.blankNumber.index', compact('blankNumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $storeService = new StoreService(Store::class);
        $stores = $storeService->all();

        $counterService = new CounterService(Counter::class);
        $counters = $counterService->all();

        return view('modules.blankNumber.create', compact('stores', 'counters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlankNumberStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BlankNumberStoreUpdateRequest $request)
    {
        $this->blankNumberService->create($request->input());

        return redirect()->route('blank-numbers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $blankNumber = $this->blankNumberService->findById($id);

        return view('modules.blankNumber.show', compact('blankNumber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $blankNumber = $this->blankNumberService->findById($id);

        $storeService = new StoreService(Store::class);
        $stores = $storeService->all();

        $counterService = new CounterService(Counter::class);
        $counters = $counterService->all();

        return view('modules.blankNumber.edit', compact('blankNumber', 'stores', 'counters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlankNumberStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BlankNumberStoreUpdateRequest $request, $id)
    {
        $this->blankNumberService->update($id, $request->input());

        return redirect()->route('blank-numbers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->blankNumberService->destroy($id);

        return redirect()->route('blank-numbers.index');
    }
}
