<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\R4StoreUpdateRequest;
use App\Models\R4;
use App\Services\R4Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class R4Controller extends Controller
{
    private $R4Service;

    public function __construct()
    {
        $this->R4Service = new R4Service(R4::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->R4Service->all();

        return view('r4.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r4.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R4StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(R4StoreUpdateRequest $request)
    {
        $this->R4Service->create(($request->input()));

        return redirect()->route('r4s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->R4Service->findById($id);

        return view('r4.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->R4Service->findById($id);

        return view('r4.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R4StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R4StoreUpdateRequest $request, $id)
    {
        $this->R4Service->update($id, $request->input());

        return redirect()->route('r4s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->R4Service->destroy($id);

        return redirect()->route('r4s.index');
    }
}
