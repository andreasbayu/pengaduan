<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // jan
        for ($a = 1; $a<=200; $a++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891234,
                'isi_laporan'   => "Test LAporan Bulan Januari oi$a",
                'status'        => 'selesai',
                'id_kategori'   => 1,
                'created_at'    => '2020-01-01 12:00:00',
            ]);
        }
        for ($b=1 ; $b<=200 ; $b++)
        {
            DB::table('tanggapan')->insert([
                'id_pengaduan'  => $b,
                'tanggapan'     => "Tanggapi Bulan Januari oi $b",
                'id_petugas'    => 1,
                'created_at'    => '2020-01-01 13:00:00',
            ]);
        }

        // feb
        for ($c = 201; $c<=570; $c++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891234,
                'isi_laporan'   => "Test Laporan Bulan Februari oi$c",
                'status'        => 'selesai',
                'id_kategori'   => 2,
                'created_at'    => '2020-02-01 12:00:00',
            ]);
        }
        for ($d=201 ; $d<=570 ; $d++)
        {
            DB::table('tanggapan')->insert([
                'id_pengaduan'  => $d,
                'tanggapan'     => "Tanggapi Bulan Februari oi$d",
                'id_petugas'    => 1,
                'created_at'    => '2020-02-01 13:00:00',
            ]);
        }

        // mar
        for ($e=571 ; $e<=900 ; $e++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891235,
                'isi_laporan'   => "Test Laporan Bulan Maret oi $e",
                'status'        => 'selesai',
                'id_kategori'   => 3,
                'created_at'    => '2020-03-01 12:00:00',
            ]);
        }
        for ($f=571 ; $f<=900 ; $f++)
        {
            DB::table('tanggapan')->insert([
                'id_pengaduan'  => $f,
                'tanggapan'     => "Tanggapi Bulan Maret oi$f",
                'id_petugas'    => 1,
                'created_at'    => '2020-01-01 13:00:00',
            ]);
        }
    }
}
