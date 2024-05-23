<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produk.index',[
            'produks'=>Produk::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.produk.user_produk_create',[
            'kategoris'=>Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'nama_produk'=>'required|max:50',
            'deskripsi_produk'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp'=>'required|max:15',
            'instagram'=>'',
            'email'=>'required',
            'alamat'=>'required',
            'user_id'=>'required',
            'kategori_id'=>'required'
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/produk', $fileName);
            $validatedData['image'] = $fileName;
        }

        $validatedData['excerpt']= Str::limit(strip_tags($request->deskripsi_produk), 30, '...');

        Produk::create($validatedData);
        Alert::toast('Tambah produk berhasil','success');
        return redirect('/user-produk');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.produk.user_produk_edit',[
            'kategoris'=>Kategori::all(),
            'produks'=>Produk::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_produk'=>'required|max:50',
            'deskripsi_produk'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp'=>'required|max:15',
            'instagram'=>'',
            'email'=>'required',
            'alamat'=>'required',
            'user_id'=>'required',
            'kategori_id'=>'required'
        ]);

        
        if ($request->file('image')) {
            $cek = Produk::find($id);
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/produk/' . $cek_gambar);
            }

            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/produk', $fileName);
            $validatedData['image'] = $fileName;
        } else {
            unset($validatedData['image']);
        }
  
        $validatedData['excerpt']= Str::limit(strip_tags($request->deskripsi_produk), 30, '...');

        Produk::where('id',$id)->update($validatedData);
        Alert::toast('Edit produk berhasil','success');
        return redirect('/user-produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Produk::find($id);
        if($cek){
            $cek_gambar = $cek->image;
            if($cek_gambar){
                Storage::delete('public/produk/' . $cek_gambar);
            }
            Produk::destroy($id);
            Alert::toast('Berhasil Hapus Data', 'success');
        } else {
            Alert::toast('Produk tidak ditemukan', 'error');
        }

        return redirect()->back();
    }

    public function user_produk(){
        $user= Auth::user();
        return view('user.produk.user_produk',[
            'produks'=>Produk::all()->where('user',$user),
        ]);
    }


    public function create_api(request $request){
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->excerpt = $request->excerpt;
        $produk->image = $request->image;
        $produk->whatsapp = $request->whatsapp;
        $produk->instagram = $request->instagram;
        $produk->email = $request->email;
        $produk->alamat = $request->alamat;
        $produk->user_id = $request->user_id;
        $produk->kategori_id = $request->kategori_id;
        $produk->save();
        return "data berhasil masuk";
    }

    public function get_api(){
        return Produk::all();
    }

}
