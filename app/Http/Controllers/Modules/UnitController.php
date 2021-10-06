<?php

namespace App\Http\Controllers\Modules;

use App\Models\Unit;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Services\Modules\UnitService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UnitStoreUpdateRequest;

class UnitController extends Controller
{
    private $unitService;

    public function __construct()
    {
        $this->unitService = new UnitService(Unit::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $units = $this->unitService->all();

        return view('modules.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(UnitStoreUpdateRequest $request)
    {
        $this->unitService->create($request->input());

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $unit = $this->unitService->findById($id);

        return view('modules.unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $unit = $this->unitService->findById($id);

        return view('modules.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UnitStoreUpdateRequest $request, $id)
    {
        $this->unitService->update($id, $request->input());

        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->unitService->destroy($id);

        return redirect()->route('units.index');
    }
}
