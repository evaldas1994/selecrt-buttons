<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bank;
use App\Models\Partner;
use Illuminate\View\View;
use App\Models\BankAccount;
use App\Http\Controllers\Controller;
use App\Services\Modules\BankService;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\PartnerService;
use App\Services\Modules\BankAccountService;
use App\Http\Requests\BankAccountStoreUpdateRequest;

class BankAccountController extends Controller
{
    private $bankAccountService;

    public function __construct()
    {
        $this->bankAccountService = new BankAccountService(BankAccount::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $bankAccounts = $this->bankAccountService->all();

        return view('modules.bankAccount.index', compact('bankAccounts'));
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

        $partnerService = new PartnerService(Partner::class);
        $partners = $partnerService->all();

        return view('modules.bankAccount.create', compact('banks', 'partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BankAccountStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BankAccountStoreUpdateRequest $request)
    {
        $this->bankAccountService->create($request->input());

        return redirect()->route('bankAccounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $bankAccount = $this->bankAccountService->findById($id);

        return view('modules.bankAccount.show', compact('bankAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $bankAccount = $this->bankAccountService->findById($id);

        $bankService = new BankService(Bank::class);
        $banks = $bankService->all();

        $partnerService = new PartnerService(Partner::class);
        $partners = $partnerService->all();

        return view('modules.bankAccount.edit', compact('bankAccount','banks', 'partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankAccountStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BankAccountStoreUpdateRequest $request, $id)
    {
        $this->bankAccountService->update($id, $request->input());

        return redirect()->route('bankAccounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->bankAccountService->destroy($id);

        return redirect()->route('bankAccounts.index');
    }
}
