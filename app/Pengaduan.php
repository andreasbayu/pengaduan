<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    // menggunakan table pengaduan bukan pengaduans
    protected $table = 'pengaduan';

    // tabel pengaduan hanya punya satu tanggapan
    public function tanggapan()
    {
        return $this->hasOne('App\Tanggapan','id_pengaduan');
    }
}
