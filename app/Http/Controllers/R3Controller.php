<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\R3Request;
use App\Models\R3;
use App\Services\R3Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class R3Controller extends Controller
{
    private $R3Service;

    public function __construct()
    {
        $this->R3Service = new R3Service(R3::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->R3Service->all();

        return view('r3.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R3Request $request
     * @return RedirectResponse
     */
    public function store(R3Request $request)
    {
        $this->R3Service->create(($request->input()));

        return redirect()->route('r3s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->R3Service->findById($id);

        return view('r3.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->R3Service->findById($id);

        return view('r3.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R3Request $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R3Request $request, $id)
    {
        $this->R3Service->update($id, $request->input());

        return redirect()->route('r3s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->R3Service->destroy($id);

        return redirect()->route('r3s.index');
    }
}
