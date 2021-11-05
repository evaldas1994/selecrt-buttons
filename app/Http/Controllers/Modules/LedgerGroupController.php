<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use Illuminate\View\View;
use App\Models\LedgerGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LedgerGroupStoreUpdateRequest;

class LedgerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $ledgerGroups = LedgerGroup::simplePaginate();

        return view('modules.ledgerGroup.index', compact('ledgerGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.ledgerGroup.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LedgerGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(LedgerGroupStoreUpdateRequest $request)
    {
        LedgerGroup::create($request->validated());

        return redirect()->route('ledger-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LedgerGroup $ledgerGroup
     * @return View
     */
    public function edit(LedgerGroup $ledgerGroup)
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.ledgerGroup.edit', compact('ledgerGroup', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LedgerGroupStoreUpdateRequest $request
     * @param LedgerGroup $ledgerGroup
     * @return RedirectResponse
     */
    public function update(LedgerGroupStoreUpdateRequest $request, LedgerGroup $ledgerGroup)
    {
        try {
            $ledgerGroup->update($request->validated());

            return redirect()->route('ledger-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('ledger-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LedgerGroup $ledgerGroup
     * @return RedirectResponse
     */
    public function destroy(LedgerGroup $ledgerGroup)
    {
        try {
            $ledgerGroup->delete();

            return redirect()->route('ledger-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('ledger-groups.index')->withError(trans('global.delete_failed'));
        }
    }
}
