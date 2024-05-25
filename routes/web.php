<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DataGekrafController;
use App\Http\Controllers\DataUmkmController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriMentorController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  Route::get('/', function () {
//     return view('dashboard.index');
// });
Auth::routes([

]);

// Route::middleware('guest')->group(function () {
//     Route::get('/login', Login::class)->name('login');
//     Route::get('/register', Register::class)->name('register');
//     Route::get('/forgot-password', PasswordReset::class)->name('forgot-password');
//     Route::get('/confirm-reset', PwdResetConfirm::class)->name('confirm-reset');
// });

// user
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daftar-anggota',[DataGekrafController::class,'index']);
Route::post('/daftar-anggota',[DataGekrafController::class,'store'])->name('daftarAnggota');
Route::get('/daftar-akun' , function(){ return view('auth.daftarAkun');});
Route::get('/daftar-akun',[DataUmkmController::class,'index']);
Route::post('/daftar-akun',[DataUmkmController::class,'store'])->name('daftarAkun');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index_user']);

Route::get('/market',[MarketController::class,'index']);
Route::get('/market-kategori/{kategori}',[MarketController::class,'show']);
Route::get('/market/detail-produk/{id}',[MarketController::class,'detail_produk']);
Route::get('/profile-home',function(){return view('user.profile.home');});
Route::get('/contact',function(){return view('user.contact.index');});
Route::get('/artikel',[ArtikelController::class,'index_user']);
Route::get('/event',[EventController::class,'index_user']);
Route::get('/mentor',[MentorController::class,'index_user']);
Route::get('/mentor-kategori/{id}',[MentorController::class,'show_user']);

Route::middleware(['cekadmin'])->group(function(){
    Route::get('/admin-dashboard', [HomeController::class, 'dashboard']);

    // Route::resource('/admin-kategori', KategoriController::class);
    Route::post('/admin-kategori', [KategoriController::class, 'store']);
    Route::get('/admin-kategori', [KategoriController::class, 'index']);
    Route::get('/admin-kategori/{id}/edit',[KategoriController::class,'edit']);
    Route::put('/admin-kategori/{id}',[KategoriController::class,'update']);
    Route::delete('/admin-kategori/{id}',[KategoriController::class,'destroy'])->name('kategoris.destroy');

    //Produk
    Route::get('/admin-produk',[ProdukController::class,'index']);
    Route::delete('/admin-produk/{id}',[ProdukController::class,'destroy']);

    // kategorimentor
    Route::get('/admin-kategoriMentor',[KategoriMentorController::class,'index']);
    Route::post('/admin-kategoriMentor',[KategoriMentorController::class,'store']);
    Route::get('/admin-kategoriMentor{id}/edit',[KategoriMentorController::class,'edit']);
    Route::put('/admin-kategoriMentor/{id}',[KategoriMentorController::class,'update']);
    Route::delete('admin-kategoriMentor/{id}',[KategoriMentorController::class,'destroy']);


    // mentor
    Route::get('/admin-mentor',[MentorController::class,'index']);
    Route::get('/admin-mentor/create',[MentorController::class,'create']);
    Route::post('/admin-mentor/create',[MentorController::class,'store']);
    Route::delete('/admin-mentor/{id}',[MentorController::class,'destroy']);
    Route::get('/admin-Mentor{id}',[MentorController::class,'show']);
    Route::get('/admin-mentor/{id}/edit',[MentorController::class,'edit']);
    Route::put('/admin-mentor/{id}',[MentorController::class,'update']);

    // artikel
    Route::get('/admin-artikel',[ArtikelController::class,'index']);
    Route::get('/admin-artikel/create',[ArtikelController::class,'create']);
    Route::post('/admin-artikel/create',[ArtikelController::class,'store']);
    Route::delete('/admin-artikel/{id}',[ArtikelController::class,'destroy']);
    Route::get('/admin-artikel/{id}/edit',[ArtikelController::class,'edit']);
    Route::put('/admin-artikel/{id}',[ArtikelController::class,'update']);

    // user
    Route::get('/admin-user',[UserController::class,'index']);
    Route::delete('/admin-user/{id}',[UserController::class,'destroy']);

    // Event
    Route::resource('/admin-event',EventController::class);

    // Pariwisata
    Route::resource('/admin-pariwisata',PariwisataController::class);

    // Anggota Gekraf
    Route::get('/admin-dataAnggota',[DataGekrafController::class,'show']);
    Route::delete('/admin-dataAnggota/{id}',[DataGekrafController::class,'destroy']);
});


Route::middleware(['auth'])->group (function(){

    Route::get('/user-produk',[ProdukController::class,'user_produk']);
    Route::get('/user-produk/create',[ProdukController::class,'create']);
    Route::post('/user-produk/create',[ProdukController::class,'store']);
    Route::get('/user-produk/{id}/edit',[ProdukController::class,'edit']);
    Route::put('/user-produk/{id}',[ProdukController::class,'update']);
    Route::delete('/user-produk/{id}',[ProdukController::class,'destroy']);

    // profile
    Route::get('/user-profile',[UserController::class,'index_user']);
    // Route::get('/user-profile/{id}/edit',[UserController::class,'edit_user']);
    Route::put('/user-profile/{user}',[UserController::class,'update_user']);
});

