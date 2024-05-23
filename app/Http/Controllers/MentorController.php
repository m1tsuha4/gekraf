<?php

namespace App\Http\Controllers;

use App\Models\KategoriMentor;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('dashboard.mentor.index',[
        'mentors'=>Mentor::latest()->paginate(5)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mentor.create',[
            'kategoriMentor'=>KategoriMentor::all()
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
            'nama'=>'string|required|max:30',
            'kategori_mentor_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=>'required',
            'whatsapp'=>'required|max:15',
            'instagram'=>'',
            'email'=>'required',
            'pekerjaan'=>'required',
            'alamat'=>'required'
        ]);

        if($request->file('image')){
            $validatedData['image']= $request->file('image')->store('mentor');
        }

        Mentor::create($validatedData);
        Alert::success('Success','Tambah mentor berhasil');
        return redirect('/admin-mentor');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mentor.index',[
            'mentors'=>Mentor::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.mentor.edit',[
            'mentors'=>Mentor::find($id),
            'kategoriMentor'=>KategoriMentor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama'=>'string|required|max:30',
            'kategori_mentor_id'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=>'required',
            'whatsapp'=>'required|max:15',
            'instagram'=>'',
            'email'=>'required',
            'pekerjaan'=>'required',
            'alamat'=>'required'
        ]);

        if($request->file('image')){
            $validatedData['image']= $request->file('image')->store('mentor');
        }


        Mentor::where('id',$id)->update($validatedData);
        Alert::toast('Update mentor berhasil','success');
        return redirect('/admin-mentor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Mentor::find($id);
        $cek_gambar = $cek->image;
        if($cek_gambar != null || $cek_gambar != ''){
            Storage::delete($cek_gambar);
        }

        Mentor::destroy($id);
        alert('hapus data berhasil','success');
        return redirect()->back();
    }

    public function index_user(){
        $mentor_all = Mentor::latest()->paginate();
        return view('user.mentor.index',[
            'kategori_mentor'=>KategoriMentor::all(),
        ],compact('mentor_all'));
    }

    public function show_user( $id){
        $kategoriMentor = KategoriMentor::find($id);

        if($kategoriMentor){
            $mentor_all = $kategoriMentor->Mentor()->get();
            $kategori_mentor = KategoriMentor::all();
            return view('user.mentor.index',compact('mentor_all','kategori_mentor'));
        }
        else {
            return abort(404);
        }
    }

}
