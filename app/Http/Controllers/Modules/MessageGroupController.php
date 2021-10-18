<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\MessageGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MessageGroupStoreUpdateRequest;

class MessageGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $messageGroups = MessageGroup::simplePaginate();

        return view('modules.messageGroup.index', compact('messageGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.messageGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(MessageGroupStoreUpdateRequest $request)
    {
        MessageGroup::create($request->validated());

        return redirect()->route('message-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MessageGroup $messageGroup
     * @return View
     */
    public function edit(MessageGroup $messageGroup)
    {
        return view('modules.messageGroup.edit', compact('messageGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessageGroupStoreUpdateRequest $request
     * @param MessageGroup $messageGroup
     * @return RedirectResponse
     */
    public function update(MessageGroupStoreUpdateRequest $request, MessageGroup $messageGroup)
    {
        try {
            $messageGroup->update($request->validated());

            return redirect()->route('message-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('message-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MessageGroup $messageGroup
     * @return RedirectResponse
     */
    public function destroy(MessageGroup $messageGroup)
    {
        try {
            $messageGroup->delete();

            return redirect()->route('message-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('message-groups.index')->withError(trans('global.delete_failed'));
        }
    }
}
