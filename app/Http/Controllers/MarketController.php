<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index() {
        // Retrieve all categories
        $kategoris = Kategori::all();
        $kategori_order = $kategoris;
    
        // Group products by category
        $produk_kategori = Produk::whereIn('kategori_id', $kategori_order->pluck('id'))
            ->get()
            ->groupBy('kategori_id');
    
        // Retrieve all products with pagination
        $produk_all = Produk::latest()->paginate(10);
    
        // Retrieve all cities
        $kotas = DB::table("kotas")->get();
    
        // Pass all data to the view
        return view('user.market.index', [
            'kategoris' => $kategoris,
            'kategori_order' => $kategori_order,
            'produk_kategori' => $produk_kategori,
            'kotas' => $kotas,
            'produk_all' => $produk_all
        ]);
    }
    
    public function filterByCity($id) {
        // Retrieve all categories
        $kategoris = Kategori::all();
        $kategori_order = $kategoris;
    
        // Retrieve all cities
        $kotas = DB::table("kotas")->get();
    
        // Retrieve products filtered by city and use pagination
        $produk_all = Produk::where('id_kota', $id)->paginate(10);
        $produk_kategori = $produk_all->groupBy('kategori_id');
    
        // Pass all data to the view
        return view('user.market.index', [
            'kategoris' => $kategoris,
            'kategori_order' => $kategori_order,
            'produk_kategori' => $produk_kategori,
            'kotas' => $kotas,
            'produk_all' => $produk_all
        ]);
    }
    
    public function show(Kategori $kategori) {
        // Retrieve all categories
        $kategoris = Kategori::all();
        $kategori_order = $kategoris;
    
        // Group products by category
        $produk_kategori = Produk::latest()->get()->groupBy('kategori_id');
    
        // Retrieve all products for the selected category
        $produk_all = $kategori->produk()->paginate(10);
    
        // Retrieve all cities
        $kotas = DB::table("kotas")->get();
    
        // Pass all data to the view
        return view('user.market.index', [
            'kategoris' => $kategoris,
            'kategori_order' => $kategori_order,
            'produk_kategori' => $produk_kategori,
            'kotas' => $kotas,
            'produk_all' => $produk_all
        ]);
    }
    

    public function detail_produk(Request $request, $id){
        $produks_kota = DB::table('produks')
            ->join('kotas', 'produks.id_kota', '=', 'kotas.id')
            ->where('produks.id',$id)
            ->select( 'kotas.nama as nama_kota')
            ->first();

        return view('user.market.detail_produk', [
            'produks' => Produk::find($id),
            'nama_kota' => $produks_kota
        ]);
    }
}
