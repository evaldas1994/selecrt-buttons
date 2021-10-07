<?php

namespace App\Http\Controllers\Modules;

use App\Http\Requests\DepartmentStoreUpdateRequest;
use App\Models\Account;
use App\Models\Department;
use App\Services\Modules\AccountService;
use App\Services\Modules\DepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    private $departmentService;

    public function __construct()
    {
        $this->departmentService = new DepartmentService(Department::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $departments = $this->departmentService->all();

        return view('modules.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accountService = new AccountService(Account::class);
        $accounts = $accountService->all();

        return view('modules.department.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentStoreUpdateRequest $request)
    {
        $this->departmentService->create(($request->input()));

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function show($id)
    {
        $department = $this->departmentService->findById($id);

        return view('modules.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $department = $this->departmentService->findById($id);

        $accountService = new AccountService(Account::class);
        $accounts = $accountService->all();

        return view('modules.department.edit', compact('department', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentStoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(DepartmentStoreUpdateRequest $request, $id)
    {
        $this->departmentService->update($id, $request->input());

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->departmentService->destroy($id);

        return redirect()->route('departments.index');
    }
}
