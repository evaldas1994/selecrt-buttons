<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
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
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
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

        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(StoreRequest $request, $id)
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
