<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Client::orderBy('order')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validateData($request);
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('clients', 'public');
        }
        return response()->json(Client::create($data), 201);
    }

    public function show(Client $client): JsonResponse
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client): JsonResponse
    {
        $data = $this->validateData($request);
        if ($request->hasFile('logo')) {
            if ($client->logo_path) {
                Storage::disk('public')->delete($client->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('clients', 'public');
        }
        $client->update($data);
        return response()->json($client->fresh());
    }

    public function destroy(Client $client): JsonResponse
    {
        if ($client->logo_path) {
            Storage::disk('public')->delete($client->logo_path);
        }
        $client->delete();
        return response()->json(['ok' => true]);
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name'             => 'required|string|max:200',
            'affiliation_note' => 'nullable|string|max:300',
            'order'            => 'nullable|integer',
            'active'           => 'nullable|boolean',
            'logo'             => 'nullable|image|max:2048',
        ]);
    }
}
