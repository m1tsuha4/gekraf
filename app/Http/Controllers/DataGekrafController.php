<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\DataGekraf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DataGekrafController extends Controller
{
    public function index()
    {
        $kotas = DB::table("kotas")->get();
        return view('auth.daftarAnggota', compact('kotas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'jabatan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required',
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

    public function show()
    {
        $anggotas = DB::table('data_gekrafs')
            ->join('kotas', 'data_gekrafs.id_kota', '=', 'kotas.id')
            ->select('data_gekrafs.*', 'kotas.nama as nama_kota')
            ->get();
        return view('dashboard.anggota.index', [
            'anggotas' => $anggotas
        ]);
    }

    public function destroy($id) {
        $cek = DataGekraf::find($id);
        if ($cek) {
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/dataGekraf/' . $cek_gambar);
            }
            DataGekraf::destroy($id);
            Alert::toast('Hapus Data Anggota Gekraf berhasil', 'success');
        } else {
            Alert::toast('Data Anggota Gekraf tidak ditemukan', 'error');
        }

        return redirect()->back();
    }
}
