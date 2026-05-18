<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            ContactMessage::orderByDesc('created_at')->get()
        );
    }

    public function show(ContactMessage $message): JsonResponse
    {
        return response()->json($message);
    }

    public function update(Request $request, ContactMessage $message): JsonResponse
    {
        $data = $request->validate([
            'is_read' => 'required|boolean',
        ]);
        $message->update($data);
        return response()->json($message);
    }

    public function destroy(ContactMessage $message): JsonResponse
    {
        $message->delete();
        return response()->json(['ok' => true]);
    }

    public function summary(): JsonResponse
    {
        return response()->json([
            'total'  => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
        ]);
    }
}
