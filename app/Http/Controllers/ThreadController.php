<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Thread;
use Illuminate\Http\Request;


class ThreadController extends Controller{

   public function list(){
    $threads = Thread::All();

    return view("back.thread.list")->with(["threads"=>$threads]);
   }

    public function form($id = null){
        $thread = $id ? thread::findOrFail($id) : new thread;
        return view('back.thread.form', compact('thread'));
    }

    public function save(Request $request, $id = null){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $thread = $id ? thread::findOrFail($id) : new thread;

        $thread->fill($validated);

        $thread->save();
        return redirect()->route('back.thread.list')->with('success', 'thread saved.');
    }

    public function destroy($id){
        $thread = thread::findOrFail($id);
        $thread->delete();

        return redirect()->route('back.thread.list')->with('success', 'thread deleted.');
    }
}
