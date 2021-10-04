<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;
use App\Services\ProjectService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProjectStoreUpdateRequest;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct()
    {
        $this->projectService = new ProjectService(Project::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $projects = $this->projectService->all();

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectStoreUpdateRequest $request)
    {
        $this->projectService->create(($request->input()));

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $project = $this->projectService->findById($id);

        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $project = $this->projectService->findById($id);

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectStoreUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ProjectStoreUpdateRequest $request, $id)
    {
        $this->projectService->update($id, $request->input());

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->projectService->destroy($id);

        return redirect()->route('projects.index');
    }
}
