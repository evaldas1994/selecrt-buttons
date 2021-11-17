<?php

namespace App\Http\Controllers\Modules;

use App\Models\Budget;
use App\Models\Account;
use App\Models\Project;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BudgetStoreUpdateRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $budgets = Budget::simplePaginate();

        return view('modules.budget.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $years = Budget::$year;
        $months = Budget::$month;

        return view('modules.budget.create', compact(
            'accounts',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'projects',
            'years',
            'months',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BudgetStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BudgetStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Budget::create($request->validated());

        return redirect()->route('budgets.index')->withError(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Budget $budget
     * @return View
     */
    public function edit(Budget $budget)
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $years = Budget::$year;
        $months = Budget::$month;

        return view('modules.budget.edit', compact(
            'accounts',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'projects',
            'years',
            'months',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BudgetStoreUpdateRequest $request
     * @param Budget $budget
     * @return RedirectResponse
     */
    public function update(BudgetStoreUpdateRequest $request, Budget $budget)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $budget);
        }

        try {
            $budget->update($request->validated());
            return redirect()->route('budgets.index')->withError(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('budgets.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Budget $budget
     * @return RedirectResponse
     */
    public function destroy(Budget $budget)
    {
        try {
            $budget->delete();

            return redirect()->route('budgets.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('budgets.index')->withError(trans('global.delete_failed'));
        }
    }
}
