<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function index(){
      return view('Login');
    }

    public function Register(Request $request){
      DB::table('tbl_user')->insert([
        'nama_user' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);

      return redirect('Login');
    }
    public function Masuk(Request $request){
      $user = DB::table('tbl_user')->where('email', $request->email)->first();
      //$password=Hash::make($request->password);
      if (Hash::check($request->password,$user->password)) {
        Session::put('id_user', $user->id);
        echo "Data berhasil di simpan = ".$request->session()->get('id');
        return redirect('/');
      }else {
        echo $password;
      }
    }

    public function Keluar(){
      Session::forget('id_user');
      return redirect('/');
    }

}
