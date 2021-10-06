<?php

namespace App\Http\Controllers\Modules;

use App\Models\Message;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\MessageService;
use App\Http\Requests\MessageStoreUpdateRequest;

class MessageController extends Controller
{
    private $messageService;

    public function __construct()
    {
        $this->messageService = new MessageService(Message::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $messages = $this->messageService->all();

        return view('modules.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(MessageStoreUpdateRequest $request)
    {
        $this->messageService->create($request->input());

        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function show($id)
    {
        $message = $this->messageService->findById($id);

        return view('modules.message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $message = $this->messageService->findById($id);

        return view('modules.message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessageStoreUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(MessageStoreUpdateRequest $request, $id)
    {
        $this->messageService->update($id, $request->input());

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->messageService->destroy($id);

        return redirect()->route('messages.index');
    }
}
