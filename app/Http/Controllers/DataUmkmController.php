<?php

namespace App\Http\Controllers;

use App\Models\DataGekraf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataUmkmController extends Controller
{
    public function index(){
        return view('auth.daftarAkun');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'nik' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required',
            'nama_usaha' => 'required',
            'sub_sektor' => 'required|array',
            'id_kota' => 'required'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/dataGekraf', $fileName);
            $validatedData['image'] = $fileName;
        }

        $validatedData['sub_sektor'] = json_encode($request->sub_sektor);

        DataGekraf::create($validatedData);
        Alert::toast('Selamat Anda Berhasil Terdaftar', 'success');
        return redirect()->route('home');
    }
}
