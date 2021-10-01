<?php

namespace App\Http\Controllers;

use App\Models\R1;
use Illuminate\View\View;
use App\Services\R1Service;
use App\Http\Requests\R1StoreUpdateRequest;
use Illuminate\Http\RedirectResponse;

class R1Controller extends Controller
{
    private $r1Service;

    public function __construct()
    {
        $this->r1Service = new R1Service(R1::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r1Service->all();

        return view('r1.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R1StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(R1StoreUpdateRequest $request)
    {
        $this->r1Service->create(($request->input()));

        return redirect()->route('r1s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->r1Service->findById($id);

        return view('r1.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->r1Service->findById($id);

        return view('r1.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R1StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R1StoreUpdateRequest $request, $id)
    {
        $this->r1Service->update($id, $request->input());

        return redirect()->route('r1s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->r1Service->destroy($id);

        return redirect()->route('r1s.index');
    }
}
