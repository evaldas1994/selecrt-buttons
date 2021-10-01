<?php

namespace App\Http\Controllers;

use App\Models\R7;
use Illuminate\View\View;
use App\Services\R7Service;
use App\Http\Requests\R7Request;
use Illuminate\Http\RedirectResponse;

class R7Controller extends Controller
{
    private $r7Service;

    public function __construct()
    {
        $this->r7Service = new R7Service(R7::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r7Service->all();

        return view('r7.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r7.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R7Request $request
     * @return RedirectResponse
     */
    public function store(R7Request $request)
    {
        $this->r7Service->create(($request->input()));

        return redirect()->route('r7s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->r7Service->findById($id);

        return view('r7.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->r7Service->findById($id);

        return view('r7.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R7Request $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R7Request $request, $id)
    {
        $this->r7Service->update($id, $request->input());

        return redirect()->route('r7s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->r7Service->destroy($id);

        return redirect()->route('r7s.index');
    }
}
