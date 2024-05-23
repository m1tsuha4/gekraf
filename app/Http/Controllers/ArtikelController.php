<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.artikel.index',[
            'artikels'=>Artikel::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.artikel.create');
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
            'judul'=>'required|string|max:50',
            'deskripsi'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['excerpt']= Str::limit(strip_tags($request->deskripsi), 50, '...');

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/articles', $fileName);
            $validatedData['image'] = $fileName;
        }

        Artikel::create($validatedData);
        Alert::toast('Tambah Artikel berhasil','success');
        return redirect('/admin-artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.artikel.edit',[
            'artikels'=>Artikel::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul'=>'required|string|max:50',
            'deskripsi'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['excerpt']= Str::limit(strip_tags($request->deskripsi), 50, '...');

        if ($request->file('image')) {
            $cek = Artikel::find($id);
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/articles/' . $cek_gambar);
            }

            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/articles', $fileName);
            $validatedData['image'] = $fileName;
        } else {
            unset($validatedData['image']);
        }

        Artikel::where('id',$id)->update($validatedData);
        Alert::toast('Edit Artikel berhasil','success');
        return redirect('/admin-artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Artikel::find($id);
        if ($cek) {
            $cek_gambar = $cek->image;
            if($cek_gambar){
                Storage::delete('public/articles/' . $cek_gambar);
            }
            Artikel::destroy($id);
            Alert::toast('Hapus artikel berhasil','success');
        } else {
            Alert::toast('Artikel tidak ditemukan', 'error');
        }
        return redirect()->back();
    }

    public function index_user()
    {
        return view('user.artikel.index',[
            'artikels'=>Artikel::latest()->paginate()
        ]);
    }

}
