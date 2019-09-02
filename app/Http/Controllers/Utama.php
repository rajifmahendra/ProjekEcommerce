<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Utama extends Controller
{
    public function index(){
      return view('utama');
    }
}
