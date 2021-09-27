<?php

namespace App\Http\Controllers;

use App\Http\Requests\VatStoreRequest;
use App\Repositories\Interfaces\VatRepositoryInterface;
use Illuminate\Http\Request;

class Vat extends Controller
{
    private $vatRepository;

    public function __construct(VatRepositoryInterface $vatRepository)
    {
        $this->vatRepository = $vatRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->vatRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vat.testas.create');
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
        $this->vatRepository->create($request->input());

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
