<?php

namespace App\Http\Controllers;

use App\Models\R8;
use Illuminate\View\View;
use App\Services\R8Service;
use App\Http\Requests\R8StoreUpdateRequest;
use Illuminate\Http\RedirectResponse;

class R8Controller extends Controller
{
    private $r8Service;

    public function __construct()
    {
        $this->r8Service = new R8Service(R8::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r8Service->all();

        return view('r8.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('r8.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param R8StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(R8StoreUpdateRequest $request)
    {
        $this->r8Service->create(($request->input()));

        return redirect()->route('r8s.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->r8Service->findById($id);

        return view('r8.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->r8Service->findById($id);

        return view('r8.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param R8StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(R8StoreUpdateRequest $request, $id)
    {
        $this->r8Service->update($id, $request->input());

        return redirect()->route('r8s.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->r8Service->destroy($id);

        return redirect()->route('r8s.index');
    }
}
