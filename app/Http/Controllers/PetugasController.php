<?php

namespace App\Http\Controllers;

use App\Petugas;
use App\Pengaduan;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        //
    }
    public function pengaduan_pending()
    {
        $data = Pengaduan::where('status','pending')->count();
        echo json_encode($data);
    }
    public function adminLogout()
    {
        Session::flush();
        return redirect('user/login');
    }
    public function kategoriPelaporan()
    {
        $data = \App\Kategori::get();
        return view('admin/kategori_pelaporan',['datas'=>$data]);
    }
    public function deleteKategori($id)
    {
        Kategori::destroy($id);
        return redirect()->back();
    }
    public function updateKategori(Request $request,$id)
    {
        $rules = [
            'kategori' => 'required|unique:kategori',
        ];
        $pesan = [
            'unique'        => 'Kategori sudah ada',
            'kategori.required' => 'Kategori Tidak Boleh Kosong'
        ];
        $this->validate($request,$rules,$pesan);
        $data = Kategori::where('id',$id)->first();
        $data->kategori = $request->kategori;
        $this->validate($request,$rules,$pesan);
        $data->save();
        return redirect()->back();
    }
    public function updateStatusPelaporan(Request $request,$id)
    {
        $data = Kategori::where('id',$id)->first();
        $status = $data->status;

        if ($status == 'Tidak') {
            $data->status = 'Aktif';
        } else {
            $data->status = 'Tidak';
        }
        $data->save();
        return redirect()->back();
    }
    public function tambahKategori(Request $request)
    {
        $rules = [
            'kategori'  => 'required|unique:kategori'
        ];

        $pesan = [
            'unique'        => 'Kategori sudah ada',
            'kategori.required' => 'Kategori Tidak Boleh Kosong'
        ];
        $this->validate($request,$rules,$pesan);
        $data = new Kategori;
        $data->kategori = $request->kategori;
        $data->status   = $request->status;
        $data->save();
        return redirect()->back();
    }
    public function daftarMasyarakat()
    {
        $data = User::get();
        return view('admin.daftar_masyarakat',['datas'=>$data]);
    }
    public function tambahUser(Request $request){
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
        return redirect()->back();
    }
    public function deleteUser(Request $request,$nik)
    {
        User::destroy($nik);
        return redirect()->back();
    }
    public function updateUser(Request $request,$nik)
    {
        $messages = [
            'digits'        => ':attribute harus :digits digit',
            'nama.min'      => ':attribute minimal :min karakter',
            'min'           => ':attribute minimal :min karakter',
        ];
        $this->validate($request,[
            'nik'           => 'required|digits:16',
            'nama'          => 'required|min:4',
            'email'         => 'required',
            'username'      => 'required|min:6',
            'password'      => 'required|min:6',
            'telp'          => 'required|max:13|min:10',
            'jenis_kelamin' => 'required',
        ],$messages);
        $jekel = $request->jenis_kelamin;
        if ($jekel == 'laki-laki') {
            $foto_user = 'user-male.jpg';
        } else {
            $foto_user = 'user-female.jpg';
        }
        $data = User::where('nik',$nik)->first();
        $data->nik              = $request->nik;
        $data->nama             = $request->nama;
        $data->email            = $request->email;
        $data->username         = $request->username;
        $data->jenis_kelamin    = $jekel;
        $data->foto_user        = $foto_user;
        $data->password         = bcrypt($request->password);
        $data->telp             = $request->telp;
        $data->save();
        return redirect()->back();
    }
}
