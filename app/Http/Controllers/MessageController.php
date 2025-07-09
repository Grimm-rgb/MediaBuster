<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller{

    public function list(){
        $messages = Message::All();

        return view("back.message.list", compact("messages"));
    }

    public function form($id = null){
        $message = $id ? Message::findOrFail($id) : new Message;
        $users = User::All();
        $threads = Thread::All();
        return view('back.message.form', compact('message', "users", "threads"));
    }

    public function save(Request $request, $id = null){

        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'thread_id' => 'required|integer|exists:threads,id',
        ]);

        $message = $id ? Message::findOrFail($id) : new Message;

        $data = $validated;
        $message->fill($data);

        $message->save();
        return redirect()->route('back.message.list')->with('success', 'Message saved.');
    }


    public function destroy($id){
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('back.message.list')->with('success', 'Message deleted.');
    }
}
