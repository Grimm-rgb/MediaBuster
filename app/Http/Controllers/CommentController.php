<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller{

    public function list(){
        $comments = Comment::All();

        return view("back.comment.list", compact("comments"));
    }

    public function form($id = null){
        $comment = $id ? Comment::findOrFail($id) : new Comment;
        $users = User::All();
        $messages = Message::All();
        return view('back.comment.form', compact('comment', "users", "messages"));
    }

    public function save(Request $request, $id = null){

        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'message_id' => 'required|integer|exists:messages,id',
        ]);

        $comment = $id ? Comment::findOrFail($id) : new Comment;

        $data = $validated;
        $comment->fill($data);

        $comment->save();
        return redirect()->route('back.comment.list')->with('success', 'comment saved.');
    }

    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('back.comment.list')->with('success', 'comment deleted.');
    }
}
