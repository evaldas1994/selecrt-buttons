<?php

namespace App\Http\Controllers\Modules;

use App\Models\Vat;
use App\Models\Unit;
use App\Models\Stock;
use App\Models\Person;
use App\Models\Partner;
use App\Models\Account;
use App\Models\Project;
use App\Models\Currency;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Http\Controllers\Controller;
use App\Services\Modules\VatService;
use App\Services\Modules\UnitService;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\StockService;
use App\Services\Modules\PersonService;
use App\Services\Modules\PartnerService;
use App\Services\Modules\AccountService;
use App\Services\Modules\ProjectService;
use App\Services\Modules\CurrencyService;
use App\Services\Modules\Register1Service;
use App\Services\Modules\Register2Service;
use App\Services\Modules\Register3Service;
use App\Services\Modules\Register4Service;
use App\Services\Modules\Register5Service;
use App\Http\Requests\StockStoreUpdateRequest;

class StockController extends Controller
{
    private $stockService;

    public function __construct()
    {
        $this->stockService = new StockService(Stock::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stocks = $this->stockService->all();

        return view('modules.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $unitService = new UnitService(Unit::class);
        $units = $unitService->all();

        $vatService = new VatService(Vat::class);
        $vats = $vatService->all();

        $currencyService = new CurrencyService(Currency::class);
        $currencies = $currencyService->all();

        $register1Service = new Register1Service(Register1::class);
        $registers1 = $register1Service->all();

        $register2Service = new Register2Service(Register2::class);
        $registers2 = $register2Service->all();

        $register3Service = new Register3Service(Register3::class);
        $registers3 = $register3Service->all();

        $register4Service = new Register4Service(Register4::class);
        $registers4 = $register4Service->all();

        $register5Service = new Register5Service(Register5::class);
        $registers5 = $register5Service->all();

        $accountService = new AccountService(Account::class);
        $accounts = $accountService->all();

        $partnerService = new PartnerService(Partner::class);
        $partners = $partnerService->all();

        $personService = new PersonService(Person::class);
        $persons = $personService->all();

        $projectService = new ProjectService(Project::class);
        $projects = $projectService->all();

        return view('modules.stock.create', compact('units', 'vats', 'currencies', 'registers1', 'registers2', 'registers3', 'registers4', 'registers5', 'accounts', 'partners', 'persons', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StockStoreUpdateRequest $request)
    {
        $this->stockService->create($request->input());

        return redirect()->route('stocks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $stock = $this->stockService->findById($id);

        return view('modules.stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $stock = $this->stockService->findById($id);

        $unitService = new UnitService(Unit::class);
        $units = $unitService->all();

        $vatService = new VatService(Vat::class);
        $vats = $vatService->all();

        $currencyService = new CurrencyService(Currency::class);
        $currencies = $currencyService->all();

        $register1Service = new Register1Service(Register1::class);
        $registers1 = $register1Service->all();

        $register2Service = new Register2Service(Register2::class);
        $registers2 = $register2Service->all();

        $register3Service = new Register3Service(Register3::class);
        $registers3 = $register3Service->all();

        $register4Service = new Register4Service(Register4::class);
        $registers4 = $register4Service->all();

        $register5Service = new Register5Service(Register5::class);
        $registers5 = $register5Service->all();

        $accountService = new AccountService(Account::class);
        $accounts = $accountService->all();

        $partnerService = new PartnerService(Partner::class);
        $partners = $partnerService->all();

        $personService = new PersonService(Person::class);
        $persons = $personService->all();

        $projectService = new ProjectService(Project::class);
        $projects = $projectService->all();

        return view('modules.stock.edit', compact('stock', 'units', 'vats', 'currencies', 'registers1', 'registers2', 'registers3', 'registers4', 'registers5', 'accounts', 'partners', 'persons', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(StockStoreUpdateRequest $request, $id)
    {
        $this->stockService->update($id, $request->input());

        return redirect()->route('stocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->stockService->destroy($id);

        return redirect()->route('stocks.index');
    }
}
