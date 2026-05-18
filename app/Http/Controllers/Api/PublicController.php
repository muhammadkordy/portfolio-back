<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactSubmitted;
use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Service;
use App\Models\Stat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function stats(): JsonResponse
    {
        return response()->json(Stat::where('active', true)->orderBy('order')->get());
    }

    public function services(): JsonResponse
    {
        return response()->json(Service::where('active', true)->orderBy('order')->get());
    }

    public function projects(): JsonResponse
    {
        return response()->json(Project::where('active', true)->orderBy('order')->get());
    }

    public function clients(): JsonResponse
    {
        return response()->json(Client::where('active', true)->orderBy('order')->get());
    }

    public function contact(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'         => 'required|string|max:150',
            'organization' => 'nullable|string|max:200',
            'email'        => 'nullable|email|max:200',
            'service'      => 'nullable|string|max:200',
            'message'      => 'required|string|max:5000',
        ]);

        $message = ContactMessage::create($data);

        try {
            $recipient = env('NOTIFY_EMAIL', 'muhammadkordy98@gmail.com');
            Mail::to($recipient)->send(new ContactSubmitted($message));
        } catch (\Throwable $e) {
            report($e);
        }

        return response()->json([
            'ok' => true,
            'message' => 'Thank you. Your enquiry has been received — Muhammad will respond shortly.',
            'id' => $message->id,
        ], 201);
    }
}
