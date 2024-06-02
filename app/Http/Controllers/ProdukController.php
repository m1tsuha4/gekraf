<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        if(Auth()->user()->is_admin == 1){
            return view('dashboard.produk.create',[
                'kategoris'=>Kategori::all(),
                'kotas' => DB::table("kotas")->get()
            ]);
        }
        return view('user.produk.user_produk_create',[
            'kategoris'=>Kategori::all(),
            'kotas' => DB::table("kotas")->get()
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
            'nama_produk'=>'required',
            'jenis_produk'=>'required',
            'deskripsi_produk'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga'=>'required',
            'whatsapp'=>'required|max:15',
            'instagram'=>'',
            'email'=>'required',
            'alamat'=>'required',
            'user_id'=>'required',
            'id_kota'=>'required',
            'kategori_id'=>'required',
            'pdf' => 'mimes:pdf|max:2048'
        ]);

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/produk', $fileName);
            $validatedData['image'] = $fileName;
        }
        if($request->file('pdf')){
            $file = $request->file('pdf');
            $fileName = $file->hashName();
            $file->storeAs('public/produk/pdf', $fileName);
            $validatedData['pdf'] = $fileName;
        }

        $validatedData['excerpt']= Str::limit(strip_tags($request->deskripsi_produk), 30, '...');

        Produk::create($validatedData);
        Alert::toast('Tambah produk berhasil','success');
        if(Auth()->user()->is_admin == 1){
            return redirect('/admin-produk');
        }
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
        if(Auth()->user()->is_admin == 1){
            return view('dashboard.produk.edit',[
                'kategoris'=>Kategori::all(),
                'produks'=>Produk::find($id),
                'kotas' => DB::table("kotas")->get()
            ]);
        }
        return view('user.produk.user_produk_edit',[
            'kategoris'=>Kategori::all(),
            'produks'=>Produk::find($id),
            'kotas' => DB::table("kotas")->get()
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
            'nama_produk'=>'required',
            'jenis_produk'=>'required',
            'deskripsi_produk'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga'=>'required',
            'whatsapp'=>'required|max:15',
            'instagram'=>'',
            'email'=>'required',
            'alamat'=>'required',
            'user_id'=>'required',
            'id_kota'=>'required',
            'kategori_id'=>'required',
            'pdf' => 'mimes:pdf|max:2048'
        ]);

        $cek = Produk::find($id);

        if ($request->file('image')) {
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/produk/' . $cek_gambar);
            }
            
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/produk', $fileName);
            $validatedData['image'] = $fileName;
        } elseif($request->file('pdf')) {
            $cek_pdf = $cek->pdf;
            if($cek_pdf){
                Storage::delete('public/produk/pdf' . $cek_pdf);
            }
            $file = $request->file('pdf');
            $fileName = $file->hashName();
            $file->storeAs('public/produk/pdf', $fileName);
            $validatedData['pdf'] = $fileName;
        }
        
        else {
            unset($validatedData['image']);
        }
  
        $validatedData['excerpt']= Str::limit(strip_tags($request->deskripsi_produk), 30, '...');

        Produk::where('id',$id)->update($validatedData);
        Alert::toast('Edit produk berhasil','success');
        if(Auth()->user()->is_admin == 1){
            return redirect('/admin-produk');
        }
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
                $cek_pdf = $cek->pdf;
                if($cek_pdf){
                    Storage::delete('public/produk/pdf' . $cek_pdf);
                }
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
