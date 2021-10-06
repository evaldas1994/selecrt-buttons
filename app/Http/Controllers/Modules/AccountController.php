<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\AccountService;
use App\Http\Requests\AccountStoreUpdateRequest;

class AccountController extends Controller
{
    private $accountService;

    public function __construct()
    {
        $this->accountService = new AccountService(Account::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $accounts = $this->accountService->all();

        return view('modules.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(AccountStoreUpdateRequest $request)
    {
        $this->accountService->create($request->input());

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $account = $this->accountService->findById($id);

        return view('modules.account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $account = $this->accountService->findById($id);

        return view('modules.account.edit', compact('account'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(AccountStoreUpdateRequest $request, $id)
    {
        $this->accountService->update($id, $request->input());

        return redirect()->route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->accountService->destroy($id);

        return redirect()->route('accounts.index');
    }
}