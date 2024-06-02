<?php

namespace App\Http\Controllers;

use App\Models\DataUmkm;
use App\Models\DataGekraf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function show()
    {
        $anggotas = DB::table('data_umkms')
            ->join('kotas', 'data_umkms.id_kota', '=', 'kotas.id')
            ->join('users','data_umkms.user_id', '=', 'users.id')
            ->select('data_umkms.*','data_umkms.id as id_umkm','users.*', 'kotas.nama as nama_kota')
            ->get();
            // dd($anggotas);
        return view('dashboard.umkm.index', [
            'anggotas' => $anggotas
        ]);
    }

    public function destroy($id) {
        $cek = DataUmkm::find($id);
        if ($cek) {
            DataUmkm::destroy($id);
            Alert::toast('Hapus Data Anggota Gekraf berhasil', 'success');
        } else {
            Alert::toast('Data Anggota Gekraf tidak ditemukan', 'error');
        }

        return redirect()->back();
    }
}
