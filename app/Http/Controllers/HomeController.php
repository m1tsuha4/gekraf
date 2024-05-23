<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Event;
use App\Models\Produk;
use App\Models\Mentor;
use App\Models\KategoriMentor;
use App\Models\Pariwisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori_id1 = 1;
        $kategori_id2 = 2;
        return view('user.home',[
            'events'=>Event::latest()->paginate(6),
            'pariwisatas'=>Pariwisata::latest()->paginate()
        ]);
    }

    // public function index_user(){
    //     $mentor_all = Mentor::latest()->paginate();
    //     return view('user.mentor.index',[
    //         'kategori_mentor'=>KategoriMentor::all(),
    //     ],compact('mentor_all'));
    // }


}
