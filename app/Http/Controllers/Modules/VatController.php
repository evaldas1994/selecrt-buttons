<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\VatStoreRequest;
use App\Models\Vat;
use App\Services\Modules\VatService;
use Illuminate\Http\Request;

class VatController extends Controller
{
    private $vatService;

    public function __construct()
    {
        $this->vatService = new VatService(Vat::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->vatService->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.vat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VatStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VatStoreRequest $request)
    {
        $this->vatService->create($request->input());

        return redirect()->route('vats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirm($id)
    {
    }
}
