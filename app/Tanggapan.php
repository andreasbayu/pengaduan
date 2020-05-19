<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    //
    protected $table = 'tanggapan';

    // tabel tanggapan terhubung dengan table pengaduan
    public function pengaduan()
    {
        $this->belongsTo('App\Pengaduan');
    }
}
