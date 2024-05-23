<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    Public function index(){
        $kategoris=Kategori::all();
        $kategori_id_6 = $kategoris->where('id',6)->first();
        $kategori_tanpat_id_6 = $kategoris->whereNotIn('id',[6]);
        $kategori_order = $kategori_tanpat_id_6->concat([$kategori_id_6]);
        $produk_kategori = Produk::whereIn('kategori_id',$kategori_order->pluck('id'))
                           ->orderBy(function ($query) use ($kategori_order) {
                            $orderIds = $kategori_order->pluck('id')->all();
                            $sql = "CASE";
                            foreach ($orderIds as $order => $id) {
                                $sql .= " WHEN kategori_id = $id THEN $order";
                            }
                            $sql .= " END";
                            $query->selectRaw($sql);
                            }) 
                           ->get()->groupBy('kategori_id');
        $produk_all = Produk::latest()->paginate();
        return view('user.market.index',[
            'kategoris'=>Kategori::all(),
            'kategori_order'=>$kategori_order,
            'produk_kategori' => $produk_kategori,
        ],compact('produk_all'));
    }

    public function show(Kategori $kategori){
        $kategoris = Kategori::all();
        $kategori_id_6 = $kategoris->where('id',6)->first();
        $kategori_tanpat_id_6 = $kategoris->whereNotIn('id',[6]);
        $kategori_order = $kategori_tanpat_id_6->concat([$kategori_id_6]);
        $produk_kategori = Produk::latest()->get()->groupBy('kategori_id');
        $produk_all = $kategori->produk()->get();

        return view('user.market.index',compact('kategoris','produk_all','produk_kategori','kategori_order'));
        //   $produk = $kategori->produk->get();
        // return view('user.market.index',[
        //     'kategoris'=>Kategori::find($id)
        // ]);
    }

    public function detail_produk(Request $request, $id){
        return view('user.market.detail_produk',[
            'produks'=>Produk::find($id)
        ]);
    }


}
