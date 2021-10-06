<?php

namespace App\Http\Controllers\Modules;

use App\Models\Currency;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\CurrencyService;
use App\Http\Requests\CurrencyStoreUpdateRequest;

class CurrencyController extends Controller
{
    private $currencyService;

    public function __construct()
    {
        $this->currencyService = new CurrencyService(Currency::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $currencies = $this->currencyService->all();

        return view('modules.currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(CurrencyStoreUpdateRequest $request)
    {
        $this->currencyService->create(($request->input()));

        return redirect()->route('currencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $currency = $this->currencyService->findById($id);

        return view('modules.currency.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $currency = $this->currencyService->findById($id);

        return view('modules.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CurrencyStoreUpdateRequest $request, $id)
    {
        $this->currencyService->update($id, $request->input());

        return redirect()->route('currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->currencyService->destroy($id);

        return redirect()->route('currencies.index');
    }
}
