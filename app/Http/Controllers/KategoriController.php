<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\ToSweetAlert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";

        return view('dashboard.kategori.index',[
            'kategoris'=>Kategori::latest()->paginate(5),confirmDelete($title, $text)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nama_kategori'=>'required|string|max:15|unique:kategoris'
        
        ];

        $customMessages = [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            'nama_kategori.max' => 'Tidak boleh lebih dari 15 karakter',
            'nama_kategori.unique' => 'Nama kategori sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()
                ->withErrors($validatedData);
        }

        $validatedData2 = $validatedData->validated();
        Kategori::create($validatedData2);
        toast('Tambah Kategori Berhasil', 'success');
        return redirect('/admin-kategori')->with('success','Tambah Kategori Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $kategori_id = $kategori->id;
        return view('dashboard.kategori.index',[
            'kategoris'=>Kategori::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        $rules = [
        'nama_kategori'=>'required|string|max:15|unique:kategoris'
    
    ];

    $customMessages = [
        'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
        'nama_kategori.max' => 'Tidak boleh lebih dari 15 karakter',
        'nama_kategori.unique' => 'Nama kategori sudah tersedia',
        // Tambahkan pesan kustom lainnya sesuai kebutuhan
    ];
    $validatedData= Validator::make($request->all(),$rules,$customMessages);
    
        // Memeriksa apakah validasi gagal
        if ($validatedData->fails()) {
            // Jika validasi gagal, redirect kembali dengan pesan error
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()
                ->withErrors($validatedData);
        }
    
        // Ambil data yang telah divalidasi
        $validatedData2 = $validatedData->validated();
    
        // Proses update data
        Kategori::where('id', $id)->update($validatedData2);
    
        // Tampilkan Sweet Alert jika berhasil update data
        toast('Berhasil update data', 'success');
    
        // Redirect dengan pesan success jika berhasil
        return redirect('/admin-kategori')->with('success', 'Post Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::destroy($id);
        toast('Data berhasil dihapus','success');
        return redirect()->back();
    }
}
