<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register6;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register6Service;
use App\Http\Requests\Register6StoreUpdateRequest;

class Register6Controller extends Controller
{
    private $r6Service;

    public function __construct()
    {
        $this->r6Service = new Register6Service(Register6::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r6Service->all();

        return view('modules.register6.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register6.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register6StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register6StoreUpdateRequest $request)
    {
        $this->r6Service->create(($request->input()));

        return redirect()->route('registers6.index');
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

        return view('modules.register6.show', compact('register'));
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

        return view('modules.register6.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register6StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register6StoreUpdateRequest $request, $id)
    {
        $this->r6Service->update($id, $request->input());

        return redirect()->route('registers6.index');
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

        return redirect()->route('registers6.index');
    }
}
