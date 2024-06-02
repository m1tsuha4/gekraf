<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DataUmkm;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'whatsapp' =>['required','min:9','max:15'],
            'nik' => ['required', 'string', 'unique:data_umkms'],
            'nib' => ['required', 'string', 'unique:data_umkms'],
            'id_kota' => ['required'],
            'nama_usaha' => ['required', 'string'],
            'alamat_usaha' => ['required', 'string'],
            'alamat_pemilik' => ['required', 'string'],
            'produk_usaha' => ['required', 'string'],
            'sub_sektor' => ['required', 'array'],
            'deskripsi' => ['required'],
            'alamat_pemilik' => ['required', 'string'],
            'klasifikasi' => ['required', 'string'],
            'instagram' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'role'  => ['required']
            // 'image'=>['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

        // 'password' => ['required', 'string', 'min:8', 'confirmed'],
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        Alert::success('Berhasil Daftar', 'Selamat datang !');

        // Simpan hasil dari User::create ke dalam variabel
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'whatsapp' => $data['whatsapp'],
            'role' => $data['role']
            // 'image' => $data['image'],
        ]);
    
        // Gunakan user_id dari hasil create User
        DataUmkm::create([
            'user_id' => $user->id,
            'nama_usaha' => $data['nama_usaha'],
            'nik' => $data['nik'],
            'alamat_usaha' => $data['alamat_usaha'],
            'alamat_pemilik' => $data['alamat_pemilik'],
            'produk_usaha' => $data['produk_usaha'],
            'sub_sektor' => json_encode($data['sub_sektor']),
            'klasifikasi' => $data['klasifikasi'],
            'nib' => $data['nib'],
            'deskripsi' => $data['deskripsi'],
            'id_kota' => $data['id_kota'],
            'instagram' => $data['instagram'],
            'facebook' => $data['facebook'],
        ]);
    
        return $user;
    }
}
