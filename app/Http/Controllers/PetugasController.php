<?php

namespace App\Http\Controllers;

use App\Petugas;
use App\Pengaduan;
use App\Kategori;
use App\User;
use PDF;
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
        // bulan
            $jan = '2020-01'; $feb  = '2020-02'; $mar = '2020-03'; $apr = '2020-04'; $mei = '2020-05'; $jun = '2020-06';
            $jul = '2020-07'; $agu  = '2020-08'; $sep = '2020-09'; $okt = '2020-10'; $nov = '2020-11'; $des = '2020-12';
        // get tanggal Sekarang
            $bln    = date('Y-m');
            $hari   = date('Y-m-d');
        $bulanIni   = Pengaduan::where('created_at','like',$bln.'%')->count();
        $proses     = Pengaduan::where('status','proses')->count();

        $user       = User::count();
        //percent
        $pengaduanAll   = Pengaduan::where('created_at','like',$hari.'%')->count();
        // select * from pengaduan where (status="selesai" or status ="0") and created_at like'2020-04-10%'
        $ditanggapi     = Pengaduan::where('created_at','like',$hari.'%')->where( function ($query){
                            $query->where('status','0')->orWhere('status','selesai');
                          })->count();
        // chart 2 selesai Hari ini
        $selesaiChart       = Pengaduan::where('status','selesai')->Where('created_at','like',$hari.'%')->count();
        $prosesChart        = Pengaduan::where('status','proses')->Where('created_at','like',$hari.'%')->count();
        $tolakChart         = Pengaduan::where('status','0')->Where('created_at','like',$hari.'%')->count();
        // chart 1
        $jan                = Pengaduan::where('created_at','like',$jan.'%')->count();
        $feb                = Pengaduan::where('created_at','like',$feb.'%')->count();
        $mar                = Pengaduan::where('created_at','like',$mar.'%')->count();
        $apr                = Pengaduan::where('created_at','like',$apr.'%')->count();
        $mei                = Pengaduan::where('created_at','like',$mei.'%')->count();
        $jun                = Pengaduan::where('created_at','like',$jun.'%')->count();
        $jul                = Pengaduan::where('created_at','like',$jul.'%')->count();
        $agu                = Pengaduan::where('created_at','like',$agu.'%')->count();
        $sep                = Pengaduan::where('created_at','like',$sep.'%')->count();
        $okt                = Pengaduan::where('created_at','like',$okt.'%')->count();
        $nov                = Pengaduan::where('created_at','like',$nov.'%')->count();
        $des                = Pengaduan::where('created_at','like',$des.'%')->count();
        $bulan = [$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agu,$sep,$okt,$nov,$des,];
        // pembulatan bilangan bulat terdekat
        if (($pengaduanAll == 0) && ($ditanggapi == 0)) {
            $per        = 0;
        } else if(($pengaduanAll != 0) && ($ditanggapi != 0) ) {
            $per        = round(($ditanggapi / $pengaduanAll) * 100);
        } else  {
            $per        = 0;
        }
        //
        $test[] = [
            'Total Pengaduan Hari Ini    = ' => $pengaduanAll,
            'Pengaduan dtanggapi Hr Ini  = ' => $ditanggapi,
            'Persentase Selesai Hari Ini = ' => $per,
            'Tanggal Ini                 = ' => $hari,
        ];
        $test2[] = [$selesaiChart,$prosesChart,$tolakChart];
        // dd($bulan);
            // array();
        return view('admin.dashboard',['proses'=> $proses,'bulanIni'=>$bulanIni,'jumlahUser'=>$user,
                                       'persen'=>$per,'selesaiChart'=>$selesaiChart,'prosesChart'=>$prosesChart,
                                       'tolakChart'=>$tolakChart,'bulan'=> $bulan]);
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
    public function generatePdf(Request $request)
    {
        if (Session::get('level') == 'admin') {
            $bln = $request->bulan;
            $thn = $request->tahun;
            $tanggal = "$thn-$bln";
            $judul   = ['judul' => 'Laporan Pengaduan'];
            $data = Pengaduan::where('created_at','like',$tanggal.'%')->with('tanggapan')->get();
            // dd($data);
            $pdf  = PDF::loadView('admin.asset.generate_laporan',$judul,['datas'=>$data]);
            return $pdf->stream('laporan-pengaduan.pdf');
        } else {
            return redirect()->back();
        }
    }
    public function pilihTanggal()
    {
        if (Session::get('level') == 'admin') {
            return view('admin.asset.pilih_tanggal');
        } else {
            return redirect()->back();
        }
    }
}
