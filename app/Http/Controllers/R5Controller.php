<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\R5Request;
use App\Models\R5;
use App\Services\R5Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class R5Controller extends Controller
{
    private $R5Service;

    public function __construct()
    {
        $this->R5Service = new R5Service(R5::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->R5Service->all();

        return view('r5.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r5.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R5Request $request
     * @return RedirectResponse
     */
    public function store(R5Request $request)
    {
        $this->R5Service->create(($request->input()));

        return redirect()->route('r5s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->R5Service->findById($id);

        return view('r5.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->R5Service->findById($id);

        return view('r5.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R5Request $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R5Request $request, $id)
    {
        $this->R5Service->update($id, $request->input());

        return redirect()->route('r5s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->R5Service->destroy($id);

        return redirect()->route('r5s.index');
    }
}
