<?php

namespace App\Http\Controllers;

use App\Events\ConversationsEvent;
use App\Models\Conversations;
use App\Models\User;
use Illuminate\Http\Request;
use OneSignal;

class ConversationsController extends Controller
{

    /**
     * Get contacts with open conversations
     * 
     * @return \Illuminate\Support\Collection
     */
    private function getContacts()
    {
        return Conversations::where('from_id', auth()->user()->id)
            ->orWhere('to_id', auth()->user()->id)
            ->get()
            ->unique('from_id')
            ->sortByDesc('created_at');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversation = Conversations::where('to_id', null)->get();
        
        return view('conversations.index')->with([
            'contacts' => $this->getContacts(),
            'conversation' => $conversation,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
            'to_username' => 'nullable|string',
        ]);
        if (isset($validatedData['to_username'])) {
            $validatedData['to_id'] = User::where('username', $validatedData['to_username'])->first()->id;
            unset($validatedData['to_username']);
        }
        $validatedData['from_id'] = auth()->user()->id;
        $conversation = Conversations::create($validatedData);

        event(new ConversationsEvent($conversation));


        $fields['include_player_ids'] = [$conversation->toUser->username];
        OneSignal::sendPush($fields, $validatedData['message']);

        return response()->json(['success' => 'Message sent successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        if (!User::where('username', $username)->exists()) {
            return redirect()->route('chat.index')->withErrors('Conversation not found!');
        }
        $contacts = $this->getContacts();

        $id = User::where('username', $username)->first()->id;

        $conversation = Conversations::where('from_id', $id)
            ->where('to_id', auth()->user()->id)
            ->orWhere('from_id', auth()->user()->id)
            ->where('to_id', $id)
            ->get();

        $newConversation = false;
        if (!$contacts->contains('from_id', $id)) {
            $newConversation = true;
        }

        return view('conversations.index')->with([
            'contacts' => $contacts,
            'conversation' => $conversation,
            'to_user' => User::find($id),
            'newConversation' => $newConversation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
