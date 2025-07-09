<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller{

   public function list(){
    $users = User::All();
    return view("back.user.list")->with(["users"=>$users]);
   }

   public function form($id = null){
      $user = $id ? User::findOrFail($id) : new User;
      return view('back.user.form', compact('user'));
   }

   public function save(Request $request, $id = null){

       $validated = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|max:255|unique:users,email,' . $id,
         'role' => 'required|in:user,admin',
         'password' => $id ? 'nullable|string|min:6' : 'required|string|min:6',
      ]);

      $user = $id ? User::findOrFail($id) : new User;

      $data = $validated;
      unset($data['password']);

      $user->fill($data);

      if (!empty($validated['password'])) {
         $user->password = bcrypt($validated['password']);
      }

      $user->save();
      return redirect()->route('back.user.list')->with('success', 'User saved.');
   }

   public function destroy($id){
      $user = User::findOrFail($id);
      $user->delete();

      return redirect()->route('back.user.list')->with('success', 'User deleted.');
   }
}
