<?php

namespace App\Http\Controllers\Modules;

use App\Models\Cur;
use App\Models\Person;
use App\Models\Account;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use Illuminate\View\View;
use App\Models\Register5;
use App\Services\CurService;
use App\Services\PersonService;
use App\Services\AccountService;
use App\Services\ProjectService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\PartnerService;
use App\Services\Modules\Register1Service;
use App\Services\Modules\Register2Service;
use App\Services\Modules\Register3Service;
use App\Services\Modules\Register4Service;
use App\Services\Modules\Register5Service;
use App\Http\Requests\PartnerStoreUpdateRequest;

class PartnerController extends Controller
{
    private $partnerService;

    public function __construct()
    {
        $this->partnerService = new PartnerService(Partner::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $partners = $this->partnerService->all();

        return view('modules.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $curService = new CurService(Cur::class);
        $curs = $curService->all();

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

        return view('modules.partner.create', compact('curs', 'registers1', 'registers2', 'registers3', 'registers4', 'registers5', 'accounts', 'persons', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerStoreUpdateRequest $request)
    {
        $this->partnerService->create($request->input());

        return redirect()->route('partners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $partner = $this->partnerService->findById($id);

        return view('modules.partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $partnerService = new partnerService(Partner::class);
        $partner = $partnerService->findById($id);

        $curService = new CurService(Cur::class);
        $curs = $curService->all();

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

        return view('modules.partner.edit', compact('partner', 'curs', 'registers1', 'registers2', 'registers3', 'registers4', 'registers5', 'accounts', 'persons', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PartnerStoreUpdateRequest $request, $id)
    {
        $this->partnerService->update($id, $request->input());

        return redirect()->route('partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->partnerService->destroy($id);

        return redirect()->route('partners.index');
    }
}
