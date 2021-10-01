<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\R2Request;
use App\Models\R1;
use App\Models\R2;
use App\Services\R1Service;
use App\Services\R2Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class R2Controller extends Controller
{
    private $r2Service;

    public function __construct()
    {
        $this->r2Service = new R2Service(R2::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r2Service->all();

        return view('r2.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R2Request $request
     * @return RedirectResponse
     */
    public function store(R2Request $request)
    {
        $this->r2Service->create(($request->input()));

        return redirect()->route('r2s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->r2Service->findById($id);

        return view('r2.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->r2Service->findById($id);

        return view('r2.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R2Request $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R2Request $request, $id)
    {
        $this->r2Service->update($id, $request->input());

        return redirect()->route('r2s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->r2Service->destroy($id);

        return redirect()->route('r2s.index');
    }
}
