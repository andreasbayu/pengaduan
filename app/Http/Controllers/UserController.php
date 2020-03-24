<?php

namespace App\Http\Controllers;

use File;
use App\Pengaduan;
use App\User;
Use App\Kategori;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.home');
    }
    public function login(){
        if(Session::get('login') == TRUE)
        {
            return redirect('user/home');
        }
        return view('user.auth.login');
    }
    public function loginPost(Request $request)
        {
        $username = $request->username;
        $password = $request->password;
        $data   = User::where(['username'=>$username] )->orWhere(['email'=>$username])->first();
        $admin  = Petugas::where(['username' =>$username])->orWhere(['email'=>$username])->first();
        // jika username masyarakat or user ada
        if($data)
        {
             // cek apakan username dan password ada
            if (Hash::check($password,$data->password))
                {
                    Session::put('nik',$data->nik);
                    Session::put('nama',$data->nama);
                    Session::put('username',$data->username);
                    Session::put('email',$data->email);
                    Session::put('foto_user',$data->foto_user);
                    Session::put('login',TRUE);
                    Alert::success('Berhasil !!', 'Anda Berhasil Login. ');
                    return redirect('user/home');
                }
            else
                {
                    return redirect('/user/login')->with('alert-danger','Username atau Password Salah !!');
                }
        }
        //jk tida ada pada masyarakat dan jika data ada pda admin
        else if ($admin) {
            //cek apakah sandi valid ?
            if(Hash::check($password,$admin->password))
                {
                    Session::put('login_admin',TRUE);
                    Session::put('level',$admin->status);
                    Alert::success('Berhasil !!','Anda Berhasil Masuk');
                    return redirect('/admin/dashboard');
                }
            else
                {
                    return redirect('/user/login')->with('alert-danger','Username atau Password Salah !!');
                }
        }
        else
            {
                return redirect('/user/login')->with('alert-danger','Username atau Password Salah !!');
            }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/user/login')->with('alert-danger-success','Anda Berhasil Logout');
    }
    public function register()
    {
        return view('user.auth.register');
    }
    public function registerPost(Request $request)
    {
        $messages = [
            'unique'        => ':attribute sudah ada',
            'digits'        => ':attribute harus :digits digit',
            'same'          => 'password tidak sama',
            'nama.min'      => ':attribute minimal :min karakter',
            'min'           => ':attribute minimal :min karakter'
        ];
        $this->validate($request,[
            'nik'           => 'required|digits:16|unique:user',
            'nama'          => 'required|min:4',
            'email'         => 'required|unique:user',
            'username'      => 'required|min:6|unique:user',
            'password'      => 'required|min:6',
            'telp'          => 'required|max:13|min:10',
            'jenis_kelamin' => 'required',
            'confirmation'  => 'required|same:password',
        ],$messages);
        $jekel = $request->jenis_kelamin;
        if ($jekel == 'laki-laki') {
            $foto_user = 'user-male.jpg';
        } else {
            $foto_user = 'user-female.jpg';
        }
        $data = new User;
        $data->nik              = $request->nik;
        $data->nama             = $request->nama;
        $data->email            = $request->email;
        $data->username         = $request->username;
        $data->jenis_kelamin    = $jekel;
        $data->foto_user        = $foto_user;
        $data->password         = bcrypt($request->password);
        $data->telp             = $request->telp;
        $data->save();
        // dd($data);
        Alert::success('Berhasil !','Anda Berhasil Melakukan Registrasi');
        return redirect('user/login');
    }
    public function laporanUser()
    {
        $kategori   = Kategori::where('status','Aktif')->get();
        return view('user.lapor',['kategori' => $kategori]);
    }
    public function postLaporanUser(Request $request)
    {
        $gbNama= "";
        $messages = [
            'isi_laporan.min'   => 'Isi laporan minimal berisi :min karakter',
            'foto.max'          => 'Ukuran foto maksimal :maxMB',
            'foto.required'     => ':attribute Tidak Boleh Kosong'
        ];
        $rules = [
            'foto'          => 'image|mimes:jpg,jpeg,png',
            'isi_laporan'   => 'required|min:20',
        ];
        $this->validate($request,$rules,$messages);
        if($request->foto != null){
            $request->foto;
            $gbNama             = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('gambar_laporan'),$gbNama);
        }

        $data = new Pengaduan;
        $data->nik          = $request->nik;
        $data->isi_laporan  = $request->isi_laporan;
        $data->foto         = $gbNama;
        $data->id_kategori  = $request->id_kategori;
        $data->save();
        Alert::success('Berhasil !','Laporan Anda Sudah Dikirim');
        return redirect('user/report');
    }
    public function userProfile()
    {
        $nik    = Session::get('nik');
        // cari berdasarkan login nik medapatkan record pertama
        $data   = User::where('nik',$nik)->first();
        return view('user.profile',['data'=>$data]);
    }
    public function updateProfile(Request $request)
    {
        $imgEmpty           = $request->foto_user;
        $nik                = $request->nik;
        $data               = User::find($nik);
        $fotoy              = $data->foto_user;

        // validasi
        $messages   = [
            'foto_user.max'     => 'foto tidak boleh lebih dari 1MB',
            'image'             => 'File Harus berupa gambar',
        ];
        $rules      = [
            'foto_user'     => 'image|max:1024',
        ];

        $this->validate($request,$rules,$messages);

        if(empty($imgEmpty))
        {
            //jika edit data tanpa update foto mengambil dari yg lalu
            $user_foto  = $data->foto_user;
        }
        else if ($fotoy == "user-male.jpg" || $fotoy == "user-female.jpg") {
            // pindah foto
            $user_foto  = time().'.'.$request->foto_user->getClientOriginalExtension();
            $request->foto_user->move(public_path('user_profile'),$user_foto);
        }
        else{
            // pindah foto & hapus foto lama
            $user_foto  = time().'.'.$request->foto_user->getClientOriginalExtension();
            $request->foto_user->move(public_path('user_profile'),$user_foto);
            File::delete('user_profile/'.$data->foto_user);
        }

        $data->nik      = $request->nik;
        $data->nama     = $request->nama;
        $data->email    = $request->email;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->telp     = $request->telp;
        $data->foto_user= $user_foto;
        // $data->foto_user= $request->foto_user;
        // dd($data);
        Session::pull('foto_user');
        Session::put('foto_user',$data->foto_user);
        Session::pull('nama');
        Session::put('nama',$data->nama);
        Session::pull('username');
        Session::put('username',$data->username);
        $data->save();
        Alert::success('Berhasil !','Data Anda Berhasil Diubah');
        return back();
    }

}
