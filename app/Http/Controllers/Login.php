<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    public function index(){
      return view('Login');
    }

    public function Register(Request $request){
      //
      DB::table('tbl_user')->insert([
        'nama_user' => $request->nama,
        'email' => $request->email,
        'password' => $request->password
      ]);

      return redirect('Login');
    }
    public function Masuk(Request $request){
      $user = DB::table('tbl_user')->where('email', $request->email)->first();
      if ($user->password == $request->password) {
        $request->session()->put('id', $user->id);
        echo "Data berhasil di simpan = ".$request->session()->get;
      }
    }

}
