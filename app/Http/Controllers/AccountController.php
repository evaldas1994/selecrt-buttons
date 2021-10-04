<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\View\View;
use App\Services\AccountService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccountRequest;

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

        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountRequest $request
     * @return RedirectResponse
     */
    public function store(AccountRequest $request)
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

        return view('account.show', compact('account'));
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

        return view('account.edit', compact('account'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(AccountRequest $request, $id)
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
