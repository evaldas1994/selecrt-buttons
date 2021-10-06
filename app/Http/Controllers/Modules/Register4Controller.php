<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register4;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register4Service;
use App\Http\Requests\Register4StoreUpdateRequest;

class Register4Controller extends Controller
{
    private $register4Service;

    public function __construct()
    {
        $this->register4Service = new Register4Service(Register4::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->register4Service->all();

        return view('modules.register4.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register4.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register4StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register4StoreUpdateRequest $request)
    {
        $this->register4Service->create(($request->input()));

        return redirect()->route('registers4.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->register4Service->findById($id);

        return view('modules.register4.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->register4Service->findById($id);

        return view('modules.register4.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register4StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register4StoreUpdateRequest $request, $id)
    {
        $this->register4Service->update($id, $request->input());

        return redirect()->route('registers4.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->register4Service->destroy($id);

        return redirect()->route('registers4.index');
    }
}
