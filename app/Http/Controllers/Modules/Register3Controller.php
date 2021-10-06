<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register3;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register3Service;
use App\Http\Requests\Register3StoreUpdateRequest;

class Register3Controller extends Controller
{
    private $register3Service;

    public function __construct()
    {
        $this->register3Service = new Register3Service(Register3::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->register3Service->all();

        return view('modules.register3.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register3StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register3StoreUpdateRequest $request)
    {
        $this->register3Service->create(($request->input()));

        return redirect()->route('registers3.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $register = $this->register3Service->findById($id);

        return view('modules.register3.show', compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $register = $this->register3Service->findById($id);

        return view('modules.register3.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register3StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register3StoreUpdateRequest $request, $id)
    {
        $this->register3Service->update($id, $request->input());

        return redirect()->route('registers3.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->register3Service->destroy($id);

        return redirect()->route('registers3.index');
    }
}
