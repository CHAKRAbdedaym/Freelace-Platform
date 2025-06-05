<?php

namespace App\Http\Controllers;



use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    // Show user's conversations
    public function index()
    {
        $userId = Auth::id();

        $conversations = Conversation::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver', 'messages' => fn($q) => $q->latest()])
            ->latest()
            ->get();

        return view('messages.index', compact('conversations'));
    }

    // Show one conversation
    public function show($id)
    {
        $conversation = Conversation::with('messages.user')->findOrFail($id);

        // Mark all as read
        foreach ($conversation->messages as $msg) {
            if ($msg->user_id != Auth::id()) {
                $msg->update(['is_read' => true]);
            }
        }

        return view('messages.show', compact('conversation'));
    }

    // Send message (store)
    public function store(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'body' => 'required|string',
        ]);

        $message = Message::create([
            'conversation_id' => $request->conversation_id,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        return redirect()->route('messages.show', $request->conversation_id);
    }

    // Start a new conversation (optional)
    public function startConversation($user_id)
{
    $authUser = Auth::user();

    // Check if a conversation already exists
    $conversation = Conversation::where(function ($query) use ($authUser, $user_id) {
        $query->where('sender_id', $authUser->id)
              ->where('receiver_id', $user_id);
    })->orWhere(function ($query) use ($authUser, $user_id) {
        $query->where('sender_id', $user_id)
              ->where('receiver_id', $authUser->id);
    })->first();

    if (!$conversation) {
        $conversation = Conversation::create([
            'sender_id' => $authUser->id,
            'receiver_id' => $user_id,
        ]);
    }

    return redirect()->route('messages.show', $conversation->id);
}

}