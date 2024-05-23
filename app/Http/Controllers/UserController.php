<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('dashboard.user.index',[
            'users'=>User::all()
        ]);
    }

    public function destroy($id){
        $cek = User::find($id);
        if($cek){
            $cek_gambar = $cek->image;
            if($cek_gambar){
                Storage::delete('public/user/'.$cek_gambar);
            }
            User::destroy($id);
            Alert::success('Berhasil', 'Berhasil Hapus Data');    
        }
        else {
            Alert::toast('User tidak ditemukan', 'error');
        }
        return redirect()->back();
    }

    public function index_user(){
        return view('user.profile.index',[
            'users'=>Auth::user()
        ]);
    }

    
    public function update_user(Request $request, $id){
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,' . $user->id,
            'whatsapp' =>['required','min:9','max:15'],
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       
  
        if($request->file('image')){
            $cek = User::find($id);
            $cek_gambar = $cek->image;
            if($cek_gambar){
                Storage::delete('public/user/'.$cek_gambar);
            }
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/user', $fileName);
            $validatedData['image'] = $fileName;
            
        } else {
            unset($validatedData['image']);
        }

        User::where('id',$id)->update($validatedData);
        return redirect()->back();
        
    }


    
}
