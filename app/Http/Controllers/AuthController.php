<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function Register(Request $request){
        return view('page.Register');

    }

    public function registered(Request $request){
        $request->validate([
            'username'  =>'required',
            'password'   =>'required',
            'tanggal_lahir'  =>'required',
            'alamat'     =>'required',
            'email'      =>'required|unique:users,email',
            'nama_lengkap' =>'required',
            'picture'       =>'required',

        ]);


        $file_foto = $request->file('picture');
        $extensi_foto = $file_foto->extension();
        $nama_foto = 'user-'.date('dmyhis').'.'.$extensi_foto;
        $file_foto->move(public_path('/asset'), $nama_foto);


        $dataStore = [
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'alamat' =>$request->alamat,
            'nama_lengkap'=>$request->nama_lengkap,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'email'   =>$request->email,
            'picture' =>$nama_foto,
        
        ];


        User::create($dataStore);
        return redirect('/login')->with('success','Data berhasil di simpan');

    }
    public function auth(Request $request){
        $request->validate([
            'username'  =>'required',
            'password' =>'required'
        ]);

        if(Auth::attempt(['username' => $request->username, 'password' =>$request->password])){
            $request->session()->regenerate();
            return redirect('/explore');

        } else{
            return redirect()->back()->with('eror','username atau password salah');
        }
    }
}


