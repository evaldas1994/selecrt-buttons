<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register2;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\Register2Service;
use App\Http\Requests\Register2StoreUpdateRequest;

class Register2Controller extends Controller
{
    private $r2Service;

    public function __construct()
    {
        $this->r2Service = new Register2Service(Register2::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = $this->r2Service->all();

        return view('modules.register2.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register2StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register2StoreUpdateRequest $request)
    {
        $this->r2Service->create(($request->input()));

        return redirect()->route('registers2.index');
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

        return view('modules.register2.show', compact('register'));
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

        return view('modules.register2.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register2StoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(Register2StoreUpdateRequest $request, $id)
    {
        $this->r2Service->update($id, $request->input());

        return redirect()->route('registers2.index');
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

        return redirect()->route('registers2.index');
    }
}
