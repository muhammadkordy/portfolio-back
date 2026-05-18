<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Project::orderBy('order')->get());
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(Project::create($this->validateData($request)), 201);
    }

    public function show(Project $project): JsonResponse
    {
        return response()->json($project);
    }

    public function update(Request $request, Project $project): JsonResponse
    {
        $project->update($this->validateData($request));
        return response()->json($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();
        return response()->json(['ok' => true]);
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'      => 'required|string|max:200',
            'scope'      => 'required|string|max:3000',
            'key_result' => 'required|string|max:500',
            'order'      => 'nullable|integer',
            'active'     => 'nullable|boolean',
        ]);
    }
}
