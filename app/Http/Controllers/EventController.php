<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.event.index',[
            'events'=>Event::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.event.create');
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
            'judul' => 'required|string|max:150',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 60, '...');

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/events', $fileName);
            $validatedData['image'] = $fileName;
        }

        Event::create($validatedData);
        Alert::toast('Tambah Event berhasil', 'success');
        return redirect()->route('admin-event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.event.edit',[
            'events'=>Event::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:50',
            'deskripsi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 60, '...');

        if ($request->file('image')) {
            $cek = Event::find($id);
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/events/' . $cek_gambar);
            }

            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/events', $fileName);
            $validatedData['image'] = $fileName;
        } else {
            unset($validatedData['image']);
        }

        Event::where('id', $id)->update($validatedData);
        Alert::toast('Update Event berhasil', 'success');
        return redirect()->route('admin-event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Event::find($id);
        if ($cek) {
            $cek_gambar = $cek->image;
            if ($cek_gambar) {
                Storage::delete('public/events/' . $cek_gambar);
            }
            Event::destroy($id);
            Alert::toast('Hapus event berhasil', 'success');
        } else {
            Alert::toast('Event tidak ditemukan', 'error');
        }

        return redirect()->back();
    }

    public function index_user()
    {
        return view('user.event.index',[
            'events'=>Event::latest()->paginate()
        ]);
    }
}
