<?php

namespace App\Http\Controllers;

use App\Models\R6;
use Illuminate\View\View;
use App\Services\R6Service;
use App\Http\Requests\R6StoreUpdateRequest;
use Illuminate\Http\RedirectResponse;

class R6Controller extends Controller
{
    private $r6Service;

    public function __construct()
    {
        $this->r6Service = new R6Service(R6::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r6Service->all();

        return view('r6.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r6.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R6StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(R6StoreUpdateRequest $request)
    {
        $this->r6Service->create(($request->input()));

        return redirect()->route('r6s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->r6Service->findById($id);

        return view('r6.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->r6Service->findById($id);

        return view('r6.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R6StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R6StoreUpdateRequest $request, $id)
    {
        $this->r6Service->update($id, $request->input());

        return redirect()->route('r6s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->r6Service->destroy($id);

        return redirect()->route('r6s.index');
    }
}
