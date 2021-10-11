<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccountSystem;
use App\Models\Stock;
use App\Services\Modules\BankService;
use Illuminate\View\View;
use App\Services\Modules\StockService;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\BankAccountSystemService;
use App\Http\Requests\BankAccountSystemStoreUpdateRequest;

class BankAccountSystemController extends Controller
{
    private $bankAccountSystemService;

    public function __construct()
    {
        $this->bankAccountSystemService = new BankAccountSystemService(BankAccountSystem::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $bankAccountSystems = $this->bankAccountSystemService->all();

        return view('modules.bankAccountSystem.index', compact('bankAccountSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $bankService = new BankService(Bank::class);
        $banks = $bankService->all();

        return view('modules.bankAccountSystem.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BankAccountSystemStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BankAccountSystemStoreUpdateRequest $request)
    {
        $this->bankAccountSystemService->create($request->input());

        return redirect()->route('bank-account-systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $bankAccountSystem = $this->bankAccountSystemService->findById($id);

        return view('modules.bankAccountSystem.show', compact('bankAccountSystem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $bankAccountSystem = $this->bankAccountSystemService->findById($id);

        $bankService = new BankService(Bank::class);
        $banks = $bankService->all();

        return view('modules.bankAccountSystem.edit', compact('bankAccountSystem', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankAccountSystemStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BankAccountSystemStoreUpdateRequest $request, $id)
    {
        $this->bankAccountSystemService->update($id, $request->input());

        return redirect()->route('bank-account-systems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->bankAccountSystemService->destroy($id);

        return redirect()->route('bank-account-systems.index');
    }
}
