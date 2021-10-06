<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register5;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register5Service;
use App\Http\Requests\Register5StoreUpdateRequest;

class Register5Controller extends Controller
{
    private $register5Service;

    public function __construct()
    {
        $this->register5Service = new Register5Service(Register5::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->register5Service->all();

        return view('modules.register5.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register5.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register5StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register5StoreUpdateRequest $request)
    {
        $this->register5Service->create(($request->input()));

        return redirect()->route('registers5.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->register5Service->findById($id);

        return view('modules.register5.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->register5Service->findById($id);

        return view('modules.register5.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register5StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register5StoreUpdateRequest $request, $id)
    {
        $this->register5Service->update($id, $request->input());

        return redirect()->route('registers5.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->register5Service->destroy($id);

        return redirect()->route('registers5.index');
    }
}
