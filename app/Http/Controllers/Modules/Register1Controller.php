<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\Register1;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register1Service;
use App\Http\Requests\Register1StoreUpdateRequest;

class Register1Controller extends Controller
{
    private $register1Service;

    public function __construct()
    {
        $this->register1Service = new Register1Service(Register1::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->register1Service->all();

        return view('modules.register1.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register1StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register1StoreUpdateRequest $request)
    {
        $this->register1Service->create(($request->input()));

        return redirect()->route('registers1.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->register1Service->findById($id);

        return view('modules.register1.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->register1Service->findById($id);

        return view('modules.register1.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register1StoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Register1StoreUpdateRequest $request, $id)
    {
        $this->register1Service->update($id, $request->input());

        return redirect()->route('registers1.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->register1Service->destroy($id);

        return redirect()->route('registers1.index');
    }
}
