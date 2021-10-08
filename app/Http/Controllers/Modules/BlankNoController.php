<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\BlankNo;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\StoreService;
use App\Services\Modules\BlankNoService;
use App\Http\Requests\BlankNoStoreUpdateRequest;

class BlankNoController extends Controller
{
    private $blankNoService;

    public function __construct()
    {
        $this->blankNoService = new BlankNoService(BlankNo::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $blankNos = $this->blankNoService->all();

        return view('modules.blankNo.index', compact('blankNos'));
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

        return view('modules.blankNo.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlankNoStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BlankNoStoreUpdateRequest $request)
    {
        $this->blankNoService->create($request->input());

        return redirect()->route('blankNos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $blankNo = $this->blankNoService->findById($id);

        return view('modules.blankNo.show', compact('blankNo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $blankNo = $this->blankNoService->findById($id);

        $storeService = new StoreService(Store::class);
        $stores = $storeService->all();

        return view('modules.blankNo.edit', compact('blankNo', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlankNoStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BlankNoStoreUpdateRequest $request, $id)
    {
        $this->blankNoService->update($id, $request->input());

        return redirect()->route('blankNos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->blankNoService->destroy($id);

        return redirect()->route('blankNos.index');
    }
}
