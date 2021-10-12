<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use App\Models\Template;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\AccountService;
use App\Services\Modules\TemplateService;
use App\Http\Requests\TemplateStoreUpdateRequest;

class TemplateController extends Controller
{
    private $templateServive;

    public function __construct()
    {
        $this->templateServive = new TemplateService(Template::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $templates = $this->templateServive->all();

        return view('modules.template.index', compact('templates'));
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

        return view('modules.template.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TemplateStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(TemplateStoreUpdateRequest $request)
    {
        $this->templateServive->create($request->input());

        return redirect()->route('templates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $template = $this->templateServive->findById($id);

        return view('modules.template.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $template = $this->templateServive->findById($id);

        $accountService = new AccountService(Account::class);
        $accounts = $accountService->all();

        return view('modules.template.edit', compact('template', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TemplateStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(TemplateStoreUpdateRequest $request, $id)
    {
        $this->templateServive->update($id, $request->input());

        return redirect()->route('templates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->templateServive->destroy($id);

        return redirect()->route('templates.index');
    }
}
