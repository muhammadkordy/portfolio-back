<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Stat::orderBy('order')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        $stat = Stat::create($data);
        return response()->json($stat, 201);
    }

    public function show(Stat $stat): JsonResponse
    {
        return response()->json($stat);
    }

    public function update(Request $request, Stat $stat): JsonResponse
    {
        $data = $this->validateData($request, $stat->id);
        $stat->update($data);
        return response()->json($stat);
    }

    public function destroy(Stat $stat): JsonResponse
    {
        $stat->delete();
        return response()->json(['ok' => true]);
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'label'  => 'required|string|max:200',
            'value'  => 'required|string|max:50',
            'suffix' => 'nullable|string|max:20',
            'order'  => 'nullable|integer',
            'active' => 'nullable|boolean',
        ]);
    }
}
