<?php

namespace App\Http\Controllers;
use File;
use App\Trash;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $nik  = Session::get('nik');
        $data = Pengaduan::where('nik',$nik)->orderBy('created_at','desc')->paginate(10);
        //
        return view('user.laporan_terkirim',['datas' => $data]);
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
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan) // laporan ditanggapi
    {
        // ambil nik dari sesi
        $nik= Session::get('nik');
        // tampilkan semua data penduan berdasarkan nik
        $pengaduan = Pengaduan::where('nik',$nik)->orderBy('created_at','desc')->with('tanggapan')->paginate(10);
        // dd($pengaduan);
        return view('user.laporan_ditanggapi',['datas'=>$pengaduan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan,Request $request)
    {
        // ambil data sesuai id
        $id     =   $request->id;
        $data   =   Pengaduan::find($id);
        $moveTrash = [
            'nik'           => $data->nik,
            'id_kategori'   => $data->id_kategori,
            'isi_laporan'   => $data->isi_laporan,
            'status'        => $data->status,
            'foto'          => $data->foto,
        ];

        //move to trash
        $move               = new Trash;
        $move->nik          = $moveTrash['nik'];
        $move->id_kategori  = $moveTrash['id_kategori'];
        $move->isi_laporan  = $moveTrash['isi_laporan'];
        $move->foto         = $moveTrash['foto'];
        $move->save();
        $data->delete();
        if ($move->save()) {
            Alert::success('Berhasil !','Data berhasil dihapus');
            return back();
        }else{
            //masukan jika terjadi kesalahan
        }

    }
    public function trash()
    {
        $nik    = Session::get('nik');
        $data   = Trash::where('nik',$nik)->paginate(10);
        return view('user.trash',['datas' => $data]);
    }
    public function trashRestore(Request $request)
    {
        $id     = $request->id;
        $data   =   Trash::find($id);
        $moveTrash = [
            'nik'           => $data->nik,
            'id_kategori'   => $data->id_kategori,
            'isi_laporan'   => $data->isi_laporan,
            'status'        => $data->status,
            'foto'          => $data->foto,
        ];

        //move to trash
        $move               = new Pengaduan;
        $move->nik          = $moveTrash['nik'];
        $move->id_kategori  = $moveTrash['id_kategori'];
        $move->isi_laporan  = $moveTrash['isi_laporan'];
        $move->status       = $moveTrash['status'];
        $move->foto         = $moveTrash['foto'];
        $move->save();
        $data->delete();
        if ($move->save()) {
            Alert::success('Berhasil !','Laporan Berhasil Direstore');
           return redirect('user/laporan_dihapus/');
        }else{
            //masukan jika terjadi kesalahan
        }
    }
    public function deletePermanent(Request $request)
    {
        $id         = $request->id;
        $data       = Trash::find($id);
        File::delete('gambar_laporan/'.$data->foto);
        $data->delete();
        Alert::success('Berhasil !','Laporan berhasil dihapus permanen');
        return back();
    }
    public function findReport(Request $request)
    {
        $find       = $request->cari;
        Pengaduan::where();
    }

}
