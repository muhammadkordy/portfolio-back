<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Service::orderBy('order')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        return response()->json(Service::create($data), 201);
    }

    public function show(Service $service): JsonResponse
    {
        return response()->json($service);
    }

    public function update(Request $request, Service $service): JsonResponse
    {
        $service->update($this->validateData($request));
        return response()->json($service);
    }

    public function destroy(Service $service): JsonResponse
    {
        $service->delete();
        return response()->json(['ok' => true]);
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'icon'        => 'nullable|string|max:50',
            'title'       => 'required|string|max:200',
            'description' => 'required|string|max:2000',
            'order'       => 'nullable|integer',
            'active'      => 'nullable|boolean',
        ]);
    }
}
