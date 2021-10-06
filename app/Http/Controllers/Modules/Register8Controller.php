<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register8;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Registeregister8Service;
use App\Http\Requests\Register8StoreUpdateRequest;

class Register8Controller extends Controller
{
    private $register8Service;

    public function __construct()
    {
        $this->register8Service = new Registeregister8Service(Register8::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->register8Service->all();

        return view('modules.register8.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register8.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register8StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register8StoreUpdateRequest $request)
    {
        $this->register8Service->create(($request->input()));

        return redirect()->route('registers8.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->register8Service->findById($id);

        return view('modules.register8.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->register8Service->findById($id);

        return view('modules.register8.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register8StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register8StoreUpdateRequest $request, $id)
    {
        $this->register8Service->update($id, $request->input());

        return redirect()->route('registers8.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->register8Service->destroy($id);

        return redirect()->route('registers8.index');
    }
}
