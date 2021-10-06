<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register7;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register7Service;
use App\Http\Requests\Register7StoreUpdateRequest;

class Register7Controller extends Controller
{
    private $r7Service;

    public function __construct()
    {
        $this->r7Service = new Register7Service(Register7::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r7Service->all();

        return view('modules.register7.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register7.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register7StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register7StoreUpdateRequest $request)
    {
        $this->r7Service->create(($request->input()));

        return redirect()->route('registers7.index');
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

        return view('modules.register7.show', compact('register'));
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

        return view('modules.register7.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register7StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register7StoreUpdateRequest $request, $id)
    {
        $this->r7Service->update($id, $request->input());

        return redirect()->route('registers7.index');
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

        return redirect()->route('registers7.index');
    }
}
