<?php

namespace App\Http\Controllers;

use App\Tanggapan;
use App\Pengaduan;
use Datatables;
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
        // dimana status masih pending
        $data = Pengaduan::where('status' ,'proses')->orderBy('created_at','desc')->get();

        return view('admin.daftar_laporan',['datas'=>$data]);
    }
    public function dataLaporan()
    {
        return Datatables::of(Pengaduan::query())->make(true);
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
        $pengaduan->status = "proses";
        $pengaduan->save();

        $tanggapan = new Tanggapan;
        $tanggapan->id_pengaduan    = $req->id_pengaduan;
        $tanggapan->tanggapan       = $req->tanggapan;
        $tanggapan->id_petugas      = $req->id_petugas;
        $tanggapan->save();
        return back();
    }
}
