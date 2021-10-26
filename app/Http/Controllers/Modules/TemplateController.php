<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use App\Models\Template;
use Illuminate\View\View;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TemplateStoreUpdateRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $templates = Template::simplePaginate();

        return view('modules.template.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $operations = Template::$operationTypes;

        return view('modules.template.create', compact('stockOperationGroups', 'accounts', 'operations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TemplateStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(TemplateStoreUpdateRequest $request)
    {
        Template::create($request->validated());

        return redirect()->route('templates.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Template $template
     * @return View
     */
    public function edit(Template $template)
    {
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $operations = Template::$operationTypes;

        return view('modules.template.edit', compact('template', 'stockOperationGroups', 'accounts', 'operations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TemplateStoreUpdateRequest $request
     * @param Template $template
     * @return RedirectResponse
     */
    public function update(TemplateStoreUpdateRequest $request, Template $template)
    {
        try {
            $template->update($request->validated());

            return redirect()->route('templates.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('templates.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Template $template
     * @return RedirectResponse
     */
    public function destroy(Template $template)
    {
        try {
            $template->delete();

            return redirect()->route('templates.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('templates.index')->withError(trans('global.delete_failed'));
        }
    }
}
