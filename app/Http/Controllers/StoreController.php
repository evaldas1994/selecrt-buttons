<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Person;
use App\Models\Project;
use App\Models\Account;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Services\PersonService;
use App\Services\AccountService;
use App\Services\ProjectService;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\StoreService;
use App\Services\Modules\Register1Service;
use App\Services\Modules\Register2Service;
use App\Services\Modules\Register3Service;
use App\Services\Modules\Register4Service;
use App\Services\Modules\Register5Service;
use App\Http\Requests\StoreStoreUpdateRequest;

class StoreController extends Controller
{
    private $storeService;

    public function __construct()
    {
        $this->storeService = new StoreService(Store::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stores = $this->storeService->all();

        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
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

        $personService = new PersonService(Person::class);
        $persons = $personService->all();

        $projectService = new ProjectService(Project::class);
        $projects = $projectService->all();

        return view('store.create', compact('registers1', 'registers2', 'registers3', 'registers4', 'registers5', 'accounts', 'persons', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStoreUpdateRequest $request)
    {
        $this->storeService->create(($request->input()));

        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $store = $this->storeService->findById($id);

        return view('store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $store = $this->storeService->findById($id);

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

        $personService = new PersonService(Person::class);
        $persons = $personService->all();

        $projectService = new ProjectService(Project::class);
        $projects = $projectService->all();

        return view('store.edit', compact('store', 'registers1', 'registers2', 'registers3', 'registers4', 'registers5', 'accounts', 'persons', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(StoreStoreUpdateRequest $request, $id)
    {
        $this->storeService->update($id, $request->input());

        return redirect()->route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->storeService->destroy($id);

        return redirect()->route('stores.index');
    }
}
