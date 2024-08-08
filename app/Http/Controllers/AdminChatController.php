<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function index()
    {
        // Fetch all chats
        $chats = Chat::with(['worker', 'customer'])->get();

        return view('admin.chats.index', compact('chats'));
    }

    public function show($id)
    {
        // Fetch specific chat by ID
        $chat = Chat::with(['worker', 'customer', 'messages'])->findOrFail($id);

        return view('admin.chats.show', compact('chat'));
    }
}

