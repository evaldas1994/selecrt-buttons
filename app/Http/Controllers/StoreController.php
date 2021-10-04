<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreUpdateRequest;
use App\Models\R1;
use App\Models\R2;
use App\Models\R3;
use App\Models\R4;
use App\Models\R5;
use App\Models\Store;
use App\Services\R1Service;
use App\Services\R2Service;
use App\Services\R3Service;
use App\Services\R4Service;
use App\Services\R5Service;
use App\Services\StoreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StoreController extends Controller
{

    private $storeService;

    public function __construct()
    {
        $this->storeService = new StoreService(Store::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stores = $this->storeService->all();

        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
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

        return view('store.create', compact('r1s', 'r2s', 'r3s', 'r4s', 'r5s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStoreUpdateRequest $request)
    {
        $this->storeService->create(($request->input()));

        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $store = $this->storeService->findById($id);

        return view('store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $store = $this->storeService->findById($id);

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

        return view('store.edit', compact('store', 'r1s', 'r2s', 'r3s', 'r4s', 'r5s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(StoreStoreUpdateRequest $request, $id)
    {
        $this->storeService->update($id, $request->input());

        return redirect()->route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->storeService->destroy($id);

        return redirect()->route('stores.index');
    }
}
