<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;


class AdminController extends Controller
{
   public function dashboard(){
    return view("back.dashboard");
   }
}
