<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\PartnerGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\PartnerGroupService;
use App\Http\Requests\PartnerGroupStoreUpdateRequest;

class PartnerGroupController extends Controller
{
    private $partnerGroup;

    public function __construct()
    {
        $this->partnerGroupService = new PartnerGroupService(PartnerGroup::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partnerGroups = $this->partnerGroupService->all();

        return view('modules.partnerGroup.index', compact('partnerGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.partnerGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerGroupStoreUpdateRequest $request)
    {
        $this->partnerGroupService->create($request->input());

        return redirect()->route('partnerGroups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function show($id)
    {
        $partnerGroup = $this->partnerGroupService->findById($id);

        return view('modules.partnerGroup.show', compact('partnerGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $partnerGroup = $this->partnerGroupService->findById($id);

        return view('modules.partnerGroup.edit', compact('partnerGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerGroupStoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(PartnerGroupStoreUpdateRequest $request, $id)
    {
        $this->partnerGroupService->update($id, $request->input());

        return redirect()->route('partnerGroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->partnerGroupService->destroy($id);

        return redirect()->route('partnerGroups.index');
    }
}
