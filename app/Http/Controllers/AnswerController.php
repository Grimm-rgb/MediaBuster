<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller{

    public function list(){
        $answers = Answer::All();

        return view("back.answer.list", compact("answers"));
    }

    public function form($id = null){
        $answer = $id ? Answer::findOrFail($id) : new Answer;
        $users = User::All();
        $comments = Comment::All();
        return view('back.answer.form', compact('answer', "users", "comments"));
    }

    public function save(Request $request, $id = null){

        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'comment_id' => 'required|integer|exists:comments,id',
        ]);

        $answer = $id ? Answer::findOrFail($id) : new Answer;

        $data = $validated;
        $answer->fill($data);

        $answer->save();
        return redirect()->route('back.answer.list')->with('success', 'answer saved.');
    }

    public function destroy($id){
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return redirect()->route('back.answer.list')->with('success', 'answer deleted.');
    }
}
