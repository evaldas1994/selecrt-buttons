<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use App\Models\Employee;
use Illuminate\View\View;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DepartmentStoreUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $departments = Department::simplePaginate();

        return view('modules.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $employees = Employee::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.department.create', compact('departments', 'employees', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentStoreUpdateRequest $request)
    {
        Department::create($request->validated());

        return redirect()->route('departments.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function edit(Department $department)
    {
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $employees = Employee::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.department.edit', compact('department', 'departments', 'employees', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentStoreUpdateRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentStoreUpdateRequest $request, Department $department)
    {
        try {
            $department->update($request->validated());

            return redirect()->route('departments.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('departments.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();

            return redirect()->route('departments.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('departments.index')->withError(trans('global.delete_failed'));
        }
    }
}
