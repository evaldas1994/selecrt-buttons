<?php

namespace App\Http\Controllers\Modules;

use App\Models\Vat;
use App\Models\Bank;
use App\Models\Store;
use App\Models\Person;
use App\Models\Account;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Template;
use App\Models\Currency;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use Illuminate\View\View;
use App\Models\Register5;
use App\Models\Department;
use App\Models\MessageGroup;
use App\Models\PartnerGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PartnerStoreUpdateRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $partners = Partner::simplePaginate();

        return view('modules.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $messageGroups = MessageGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $priceLevels = Partner::$priceLevelTypes;
        $legalStatuses = Partner::$legalStatusTypes;
        $sexTypes = Partner::$sexTypes;
        $ediExportTypes = Partner::$ediExportTypes;

        return view('modules.partner.create', compact(
            'partnerGroups',
            'currencies',
            'partners',
            'accounts',
            'messageGroups',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'persons',
            'projects',
            'vats',
            'banks',
            'stores',
            'templates',
            'priceLevels',
            'legalStatuses',
            'sexTypes',
            'ediExportTypes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerStoreUpdateRequest $request)
    {
        $partner = Partner::create($request->validated());

        switch ($request->input('action')) {
            case 'bank-account-create':
                return redirect()->route('bank-accounts.create' , $partner);
        }

        return redirect()->route('partners.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return View
     */
    public function edit(Partner $partner)
    {
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $messageGroups = MessageGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $priceLevels = Partner::$priceLevelTypes;
        $legalStatuses = Partner::$legalStatusTypes;
        $sexTypes = Partner::$sexTypes;
        $ediExportTypes = Partner::$ediExportTypes;

        $bankAccounts = $partner->bankAccounts;

        return view(
            'modules.partner.edit',
            compact(
                'partner',
                'partnerGroups',
                'currencies',
                'partners',
                'accounts',
                'messageGroups',
                'registers1',
                'registers2',
                'registers3',
                'registers4',
                'registers5',
                'departments',
                'persons',
                'projects',
                'vats',
                'banks',
                'stores',
                'templates',
                'priceLevels',
                'legalStatuses',
                'sexTypes',
                'ediExportTypes',
                'bankAccounts',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerStoreUpdateRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(PartnerStoreUpdateRequest $request, Partner $partner)
    {
        try {
            $partner->update($request->validated());

            switch ($request->input('action')) {
                case 'bank-account-create':
                    return redirect()->route('bank-accounts.create' , $partner);
            }

            return redirect()->route('partners.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        try {
            $partner->delete();

            return redirect()->route('partners.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.index')->withError(trans('global.delete_failed'));
        }
    }
}
