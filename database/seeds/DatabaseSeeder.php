<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
             //
             DB::table('user')->insert([
                'nik'           => 3325124567891234,
                'nama'          => 'Andreas Bayu',
                'email'         => 'andreasbayu@gmail.com',
                'username'      => 'andbayu',
                'password'      => bcrypt('123456'),
                'jenis_kelamin' => 'laki-laki',
                'telp'          => '081391842113',
                'foto_user'     => 'user-male.jpg',
                'created_at'    => now(),
            ]);
            DB::table('user')->insert([
                'nik'           => 3325124567891235,
                'nama'          => 'Yulianto Bayu',
                'email'         => 'yuliantobayu@gmail.com',
                'username'      => 'yulianto',
                'password'      => bcrypt('123456'),
                'jenis_kelamin' => 'laki-laki',
                'telp'          => '082333456789',
                'foto_user'     => 'user-male.jpg',
                'created_at'    => now(),
            ]);
            DB::table('petugas')->insert([
                'nama'          => 'Yulianto Bayu Prasetyo',
                'username'      => 'admin',
                'password'      => bcrypt('admin'),
                'email'         => 'admin1@gmail.com',
                'telp'          => '085123456789',
                'foto_admin'    => 'admin.jpg',
                'level'         => 'admin',
                'created_at'    => now(),
            ]);
            DB::table('petugas')->insert([
                'nama'          => 'Andreas Yulianto Bayu',
                'username'      => 'petugas',
                'password'      => bcrypt('petugas'),
                'email'         => 'petugas1@gmail.com',
                'telp'          => '085987654321',
                'foto_admin'    => 'admin.jpg',
                'level'         => 'petugas',
                'created_at'    => now(),
            ]);
            DB::table('kategori')->insert(
                ['kategori'      => 'keamanan',]
            );
            DB::table('kategori')->insert(
                ['kategori'      => 'pendidikan',]
            );
            DB::table('kategori')->insert(
                ['kategori'      => 'infrastruktur',]
            );
    }
}
