<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pariwisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PariwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->is_admin == 1){
            return view('dashboard.pariwisata.index',[
                'pariwisatas'=>Pariwisata::latest()->paginate()
            ]);
        }
        return view('user.pariwisata.user',[
            'pariwisatas'=>Pariwisata::latest()->paginate()
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
            return view ('dashboard.pariwisata.create');
        }
        return view ('user.pariwisata.create');
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
            'nama_objek' => 'required|string|max:50',
            'keterangan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi' => 'required',
            'instagram' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
    
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/pariwisatas', $fileName);
            $validatedData['image'] = $fileName;
        }
    
        Pariwisata::create($validatedData);
        Alert::toast('Tambah Pariwisata berhasil', 'success');
        if(Auth()->user()->is_admin == 1){
            return redirect()->route('admin-pariwisata.index');
        }
        return view ('user.pariwisata.user',[
            'pariwisatas'=>Pariwisata::latest()->paginate()
        ]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function show(Pariwisata $pariwisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth()->user()->is_admin == 1){
            return view('dashboard.pariwisata.edit',[
                'pariwisatas'=>Pariwisata::find($id)
            ]);
        }
        return view ('user.pariwisata.edit',[
            'pariwisatas'=>Pariwisata::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_objek' => 'required|string|max:50',
            'keterangan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi' => 'required',
            'instagram' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
    
        if ($request->file('image')) {
            $pariwisata = Pariwisata::findOrFail($id);
            $existingImage = $pariwisata->image;
            if ($existingImage) {
                Storage::delete('public/pariwisatas/' . $existingImage);
            }
    
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/pariwisatas', $fileName);
            $validatedData['image'] = $fileName;
        } else {
            unset($validatedData['image']);
        }
    
        Pariwisata::where('id', $id)->update($validatedData);
        Alert::toast('Update Pariwisata berhasil', 'success');
        if(Auth()->user()->is_admin == 1){
            return redirect()->route('admin-pariwisata.index');
        }
        return view ('user.pariwisata.user',[
            'pariwisatas'=>Pariwisata::latest()->paginate()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Pariwisata::find($id);
        if ($cek) {
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/pariwisatas/' . $cek_gambar);
            }
            Pariwisata::destroy($id);
            Alert::toast('Hapus Pariwisata berhasil', 'success');
        } else {
            Alert::toast('Pariwisata tidak ditemukan', 'error');
        }

        return redirect()->back();
    }
    public function index_user()
    {
        return view('user.pariwisata.index',[
            'pariwisatas'=>Pariwisata::latest()->paginate()
        ]);
    }
}
