<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<40; $i++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891234,
                'isi_laporan'   => "hahasajhs asaskajskaj asjaksjaksjjask$i",
                'status'        => 'selesai',
                'id_kategori'   => 2,
                'created_at'    => now(),
            ]);
        }

        for ($z=0 ; $z<40 ; $z++)
        {
            DB::table('tanggapan')->insert([
                'id_pengaduan'  => $z+1,
                'tanggapan'     => "Ngomong opo to mas / mbak aku ra mudeng blas blase$z",
                'id_petugas'    => 1,
                'created_at'    => now(),
            ]);
        }
        for ($a = 0; $a<30; $a++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891234,
                'isi_laporan'   => "pulu pulu pulu hahah haha haha haha wkwkwkwkwk$a",
                'status'        => 'proses',
                'id_kategori'   => 3,
                'created_at'    => now(),
            ]);
        }
        for ($a = 0; $a<15; $a++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891235,
                'isi_laporan'   => "pulu pulu pulu hahah haha haha haha user yulianto$a",
                'status'        => 'proses',
                'id_kategori'   => 1,
                'created_at'    => now(),
            ]);
        }
        for ($a = 0; $a<15; $a++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891235,
                'isi_laporan'   => "pulu pulu pulu hahah haha haha haha user yulianto$a",
                'status'        => '0',
                'id_kategori'   => 1,
                'created_at'    => now(),
            ]);
        }
        // data tanggapan 15
        for ($z=86 ; $z<=100; $z++)
        {
            DB::table('tanggapan')->insert([
                'id_pengaduan'  => $z,
                'tanggapan'     => "Ngomong opo to mas / mbak aku ra mudeng blas blase$z",
                'id_petugas'    => 1,
                'created_at'    => now(),
            ]);
        }


        for ($a = 0; $a<20; $a++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891235,
                'isi_laporan'   => "pulu pulu pulu hahah haha haha haha user yulianto$a",
                'status'        => 'proses',
                'id_kategori'   => 1,
                'created_at'    => '2020-04-05 13:23:20',
            ]);
        }
        for ($a = 0; $a<20; $a++)
        {
            DB::table('pengaduan')->insert([
                'nik'           => 3325124567891235,
                'isi_laporan'   => "pulu pulu pulu hahah haha haha haha user yulianto$a",
                'status'        => 'selesai',
                'id_kategori'   => 1,
                'created_at'    => '2020-04-05 13:23:20',
            ]);
        }
    }
}
