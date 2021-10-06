<?php

namespace App\Http\Controllers\Modules;

use App\Models\Person;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Modules\PersonService;
use App\Http\Requests\PersonStoreUpdateRequest;

class PersonController extends Controller
{
    private $personService;

    public function __construct()
    {
        $this->personService = new PersonService(Person::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $persons = $this->personService->all();

        return view('modules.person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PersonStoreUpdateRequest $request)
    {
        $this->personService->create(($request->input()));

        return redirect()->route('persons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function show($id)
    {
        $person = $this->personService->findById($id);

        return view('modules.person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $person = $this->personService->findById($id);

        return view('modules.person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PersonStoreUpdateRequest $request, $id)
    {
        $this->personService->update($id, $request->input());

        return redirect()->route('persons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->personService->destroy($id);

        return redirect()->route('persons.index');
    }
}
