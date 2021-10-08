<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\AccountGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\AccountGroupService;
use App\Http\Requests\AccountGroupStoreUpdateRequest;

class AccountGroupController extends Controller
{
    private $accountGroupService;

    public function __construct()
    {
        $this->accountGroupService = new AccountGroupService(AccountGroup::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $accountGroups = $this->accountGroupService->all();

        return view('modules.accountGroup.index', compact('accountGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.accountGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(AccountGroupStoreUpdateRequest $request)
    {
        $this->accountGroupService->create($request->input());

        return redirect()->route('accountGroups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $account = $this->accountGroupService->findById($id);

        return view('modules.accountGroup.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $accountGroup = $this->accountGroupService->findById($id);

        return view('modules.accountGroup.edit', compact('accountGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountGroupStoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(AccountGroupStoreUpdateRequest $request, $id)
    {
        $this->accountGroupService->update($id, $request->input());

        return redirect()->route('accountGroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->accountGroupService->destroy($id);

        return redirect()->route('accountGroups.index');
    }
}
