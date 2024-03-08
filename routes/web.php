<?php

use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\ExploreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    return view('page.index');
});

Route::get('/login',function () {
    return view('page.login');
});

//middleware
Route::middleware('auth')->group(function(){
});
Route::get('/Register',function() {
    return view('page.Register');
});
Route::post('/Registered',[AuthController::class, 'registered']);

Route::get('/explore',function() {
    return view('page.explore');
});

Route::get('/exploredetail',function() {
    return view('page.exploredetail');
});

Route::get('/exploredetail/{id}/getdatadetail',[ExploreController::class, 'getdatadetail']);
Route::get('/exploredetail/{id}', function(){
    return view('page.exploredetail'); 
});

Route::post('/ubahpassword',[UserController::class, 'ubahpassword'])->name('ubahpassword')->middleware('auth');
Route::get('/exploredetail/getComment/{id}',[ExploreController::class, 'ambildatakomentar']);
// ROUTE::get('/detail/getComment/{id}',[ExploreController::class, 'ambildatakomentar']);
Route::post('/saveupload', [ExploreController::class, 'saveupload']);


Route::get('/profil',function() {
    return view('page.profilsaya');
});

Route::get('/pin', function(){
    return view('page.pin');
});

Route::get('/upload',function() {
    return view('page.upload');
});

Route::get('/album', [AlbumController::class, 'album']);
Route::post('/buat-album',[AlbumController::class, 'storeAlbum']);
Route::get('/detail-album/{id}', [AlbumController::class, 'detail']);

Route::get('/ubahprofil',function() {
    $user = auth()->user();
    return view('page.ubahprofil', compact('user'));
});

Route::get('/profilsaya', function(){
    $user = auth()->user();
    return view('page.profilsaya', compact('user'));
});
Route::get('/buat',function() {
    return view('page.buat');
});



Route::get('/dataprofile', [profilController::class, 'getdataprofile']);
Route::get('/getdataprofile/', [profilController::class, 'getdata']);

Route::post('/ubahprofil/{id}', [UserController::class, 'ubahprofil']);
Route::post('/detailfoto/kirimkankomentar', [ExploreController::class, 'kirimkankomentar']);

Route::get('/ubahpassword',function() {
    return view('page.ubahpassword');
});
Route::post('/likefotos',[ExploreController::class, 'likesfoto']);

Route::get('/getDataExplore',[ExploreController::class, 'getdata']);


Route::post('/auth',[AuthController::class, 'auth']);





