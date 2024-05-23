<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriMentor;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kategoriMentor.index',[
            'KategoriMentor' =>KategoriMentor::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kategori_mentor'=>'required|max:15|unique:kategori_mentors',
        ];

        $customMessages = [
            'kategori_mentor.required' => 'Nama kategori tidak boleh kosong',
            'kategori_mentor.max' => 'Tidak boleh lebih dari 15 karakter',
            'kategori_mentor.unique' => 'Nama kategori sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()
                ->withErrors($validatedData);
        }

        // $validatedData2 = $request->validate([
        //     'kategori_mentor'=>'required|max:15|unique:kategorimentors',
            
        // ]);

        $validatedData2=$validatedData->validated();
        KategoriMentor::create($validatedData2);
        Alert::toast('tambah data berhasil','success');
        return redirect('/admin-kategoriMentor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriMentor  $kategoriMentor
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriMentor $kategoriMentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriMentor  $kategoriMentor
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriMentor $kategoriMentor)
    {
        $kategoriMentor_id=$kategoriMentor->id;
        return view('admin-kategoriMentor.index',[
            'KategoriMentor'=>KategoriMentor::find($kategoriMentor_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriMentor  $kategoriMentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriMentor $kategoriMentor)
    {
        $kategoriMentor_id=$request->id;

        $customMessages = [
            'kategori_mentor.required' => 'Nama kategori tidak boleh kosong',
            'kategori_mentor.max' => 'Tidak boleh lebih dari 15 karakter',
            'kategori_mentor.unique' => 'Nama kategori sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = Validator::make($request->all(),[
            'kategori_mentor'=>'required|max:15|unique:kategori_mentors',
        ],$customMessages);

        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back();
        }

        $validatedData2=$validatedData->validated();

        KategoriMentor::where('id',$kategoriMentor_id)->update($validatedData2);
        Alert::toast('update data berhasil','success');
        return redirect('/admin-kategoriMentor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriMentor  $kategoriMentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $kategoriMentor_id=KategoriMentor::find($id);
        KategoriMentor::destroy($id);
        Alert::toast('hapus data berhasil','success');
        return redirect()->back();
    }
}
