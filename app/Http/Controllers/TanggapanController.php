<?php

namespace App\Http\Controllers;

use App\Tanggapan;
use App\Pengaduan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dimana status masih proses
        $data = Pengaduan::where('status' ,'proses')->orderBy('created_at','desc')->get();

        return view('admin.daftar_laporan',['datas'=>$data]);
    }
    public function refresh()
    {
        return back();
    }
    public function tolak(Request $req,$id)
    {
        $pengaduan = Pengaduan::where(['id'=>$id])->first();
        $pengaduan->status = "0";
        $pengaduan->save();

        $tanggapan = new Tanggapan;
        $tanggapan->id_pengaduan    = $req->id_pengaduan;
        $tanggapan->tanggapan       = $req->tanggapan;
        $tanggapan->id_petugas      = $req->id_petugas;
        $tanggapan->save();
        return back();
    }
    public function terima(Request $req, $id)
    {
        $pengaduan = Pengaduan::where(['id'=>$id])->first();
        $pengaduan->status = "selesai";
        $pengaduan->save();

        $tanggapan = new Tanggapan;
        $tanggapan->id_pengaduan    = $req->id_pengaduan;
        $tanggapan->tanggapan       = $req->tanggapan;
        $tanggapan->id_petugas      = $req->id_petugas;
        $tanggapan->save();
        return back();
    }
    public function daftarLaporanDitanggapi()
    {
        $data = Pengaduan::with('tanggapan')->where('status','0')->orWhere('status','selesai')->get();
        return view('admin/daftar_laporan_ditanggapi',['datas'=>$data]);
    }
}
