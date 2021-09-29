<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\View\View;
use App\Services\UnitService;
use App\Http\Requests\UnitRequest;
use Illuminate\Http\RedirectResponse;

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
    public function index(): View
    {
        $units = $this->unitService->all();

        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitRequest $request
     * @return RedirectResponse
     */
    public function store(UnitRequest $request): RedirectResponse
    {
        $this->unitService->create($request->input());

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $f_id
     * @return View
     */
    public function show($f_id): View
    {
        $unit = $this->unitService->findById($f_id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $f_id
     * @return View
     */
    public function edit($f_id): View
    {
        $unit = $this->unitService->findById($f_id);

        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitRequest $request
     * @param $f_id
     * @return RedirectResponse
     */
    public function update(UnitRequest $request, $f_id): RedirectResponse
    {
        $this->unitService->update($f_id, $request->input());

        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $f_id
     * @return RedirectResponse
     */
    public function destroy($f_id): RedirectResponse
    {
        $this->unitService->destroy($f_id);

        return redirect()->route('units.index');
    }
}
