<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class profilController extends Controller
{
    public function getdataprofile(Request $request)
    {
        $data = auth()->user();
        return response()->json([
            'data'      => $data
        ], 200);
    }

    public function getdata(Request $request){
        $explore = foto::with(['likefoto'])->withCount(['likefoto','komentars'])->where('id_user', auth()->id())->paginate(4);
        return response()->json([
            'datapost' =>$explore,
            'statuscode' => 200,
            'id' => auth()->user()->id
        ]);
    }

    public function album(Request $request){
        $tampilalbum = Album::with('foto')->where('id_user', auth()->user()->id)->get();
        return view('page.album', compact('tampilalbum'));
     }

     public function show($id){
        $user = auth()->user();
        $fotos = foto::where('id_album', $id)->orderBy('id', 'DESC')->where('id_user', Auth::user()->id)->get();
        $album = Album::with('foto')->findOrFail($id);
        return view('page.detailalbum',compact('album', 'fotos', 'user'));
     }
}
