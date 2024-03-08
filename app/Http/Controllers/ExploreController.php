<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\User;
use App\Models\comment;
use App\Models\Likefoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function getdata(Request $request){
        if($request->cari !== 'null'){

        $explore = foto::with(['likefoto'])->where('judul_foto','like','%'.$request->cari.'%')->orderBy('id','DESC')->withCount(['likefoto','komentars'])->paginate(4);
        } else {
        $explore = foto::with(['likefoto'])->orderBy('id','DESC')->withCount(['likefoto','komentars'])->paginate();
        }
        return response()->json([
            'data'    =>$explore,
            'statuscode' => 200,
            'idUser'   => auth()->user()->id
        ]);
    }
    public function likesfoto(Request $request){
        try {
           $request->validate([
            'idfoto'=> 'required',

           ]);

           $existingLike = Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->first();
           if(!$existingLike){
                $dataSimpan = [
                    'id_foto'=> $request->idfoto,
                    'id_user'=> auth()->user()->id
                ];
                Likefoto::create($dataSimpan);
            } else {
                Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->delete();
            }
              return response()->json('$data berhasil di simpan', 200);
            } catch (\Throwable $th) {
            return response()->json('something went wrong',500);
            }

    }

    public function getdatadetail(Request $request, $id){
    $data = foto::find($id);
    $user = User::where('id',$data->id_user)->first();

    return response()->json([
        'data' => $data,
        'user' => $user,
    ], 200);
 }
  
 public function ambildatakomentar(Request $request, $id){
    // $ambilkomentar = comment::with('users')->where('id_foto', $id)->get();
    $ambilkomentar = comment::where('id_foto', $id)->get();
    // $user = User::where('id', $ambildatakomentar->id_user)->get();
    return response()->json([
        'data' => $ambilkomentar,
        // 'user' => $user
    ], 200);    
 }

 public function kirimkankomentar(Request $request){
    $data_comment = [
        'isi_komentar' => $request->isi_komentar,
        'id_user'      => Auth::user()->id,
        'id_foto'      => $request->idfoto,
    ];

    comment::create($data_comment);

    
 } 
 

 public function saveupload(Request $request){
    $request->validate([
            'filefoto'  => 'required|mimes:png,jpg|max:1024',
            'judul_foto'     => 'required',
            'deskripsi_foto' => 'required',
    ]);
    
      $file_foto         = $request->file('filefoto');
      $extensi_foto      =$file_foto->extension();
      $nama_foto         ='Pinme-'.date('dmythis').'.'.$extensi_foto;
      $file_foto->move(public_path('/asset'), $nama_foto);
      
      $data_store = [
        'judul_foto'       => $request->judul_foto,
        'deskripsi_foto'    => $request->deskripsi_foto,
        'url'               =>  $nama_foto,
        'album_id'          =>  1,
        'id_user'           => auth()->user()->id
      ];


      Foto::create($data_store);
      return redirect()->back()->with('success', 'Data berhasil di simpan');

    }

}
