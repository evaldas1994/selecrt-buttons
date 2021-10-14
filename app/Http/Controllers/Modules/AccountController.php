<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use Illuminate\View\View;
use App\Models\AccountGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccountStoreUpdateRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $accounts = Account::simplePaginate();

        return view('modules.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accountGroups = AccountGroup::select('f_id', 'f_name')->orderBy('f_name')->get();

        return view('modules.account.create', compact('accountGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(AccountStoreUpdateRequest $request)
    {
        Account::create($request->validated());

        return redirect()->route('accounts.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return View
     */
    public function edit(Account $account)
    {
        $accountGroups = AccountGroup::select('f_id', 'f_name')->orderBy('f_name')->get();

        return view('modules.account.edit', compact('account', 'accountGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountStoreUpdateRequest $request
     * @param Account $account
     * @return RedirectResponse
     */
    public function update(AccountStoreUpdateRequest $request, Account $account)
    {
        $account->update($request->validated());

        return redirect()->route('accounts.index')->withSuccess(trans('global.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @return RedirectResponse
     */
    public function destroy(Account  $account)
    {
        try {
            $account->delete();

            return redirect()->route('accounts.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('accounts.index')->withError(trans('global.delete_failed'));
        }
    }
}
