<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $dataprofil = user::where('id',Auth::user()->id)->first();
        return view('page.profilsaya', compact('dataprofil'));
    }

public function ubahpassword(Request $request){
  //cek password lama
  if(!Hash::check($request->password_lama, auth()->user()->password)){
    return back();
  }
  if($request->password_baru != $request->confirm_password){
    return back();
  }

  auth()->user()->update([
    'password' => Hash::make($request->password_baru)
  ]);

  return back();
}


public function ubahprofil(Request $request, $id){
    $data_user = [
      'nama_lengkap' => $request->nama_lengkap,
      'email'        => $request->email,
      'alamat'       => $request->alamat 
    ];

    if($request->hasFile('picture')){
      $picture  = $request->file('picture');
      $extensi  = $picture->getClientOriginalExtension();
      $filename = 'users'. now()->timestamp.'.'.$extensi;
      $picture->move(public_path('asset'),$filename);
      $data_user['picture'] = $filename;
    } 
    
    $user = User::find($id);
    $user->update($data_user);
    
    return redirect()->back()->with('success','Data perubahan tersimpan');
}

}





