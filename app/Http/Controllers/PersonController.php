<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreUpdateRequest;
use App\Models\Person;
use App\Models\Store;
use App\Services\PersonService;
use App\Services\StoreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        return view('person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('person.create');
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

        return view('person.show', compact('person'));
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

        return view('person.edit', compact('person'));
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
