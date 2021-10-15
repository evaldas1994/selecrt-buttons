<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register5;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register5StoreUpdateRequest;

class Register5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register5::simplePaginate();

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
        Register5::create($request->validated());

        return redirect()->route('registers5.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register5 $registers5
     * @return View
     */
    public function edit(Register5 $registers5)
    {
        return view('modules.register5.edit', compact('registers5'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register5StoreUpdateRequest $request
     * @param Register5 $registers5
     * @return RedirectResponse
     */
    public function update(Register5StoreUpdateRequest $request, Register5 $registers5)
    {
        try {
            $registers5->update($request->validated());

            return redirect()->route('registers5.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers5.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register5 $registers5
     * @return RedirectResponse
     */
    public function destroy(Register5 $registers5)
    {
        try {
            $registers5->delete();

            return redirect()->route('registers5.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers5.index')->withError(trans('global.delete_failed'));
        }
    }
}
