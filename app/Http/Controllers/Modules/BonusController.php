<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bonus;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\BonusService;
use App\Http\Requests\BonusStoreUpdateRequest;

class BonusController extends Controller
{
    private $bonusService;

    public function __construct()
    {
        $this->bonusService = new BonusService(Bonus::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $bonuses = $this->bonusService->all();

        return view('modules.bonus.index', compact('bonuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.bonus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BonusStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BonusStoreUpdateRequest $request)
    {
        $this->bonusService->create($request->input());

        return redirect()->route('bonuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $bonus = $this->bonusService->findById($id);

        return view('modules.bonus.show', compact('bonus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $bonus = $this->bonusService->findById($id);

        return view('modules.bonus.edit', compact('bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BonusStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BonusStoreUpdateRequest $request, $id)
    {
        $this->bonusService->update($id, $request->input());

        return redirect()->route('bonuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->bonusService->destroy($id);

        return redirect()->route('bonuses.index');
    }
}
