<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nik');
            $table->text('isi_laporan');
            $table->enum('status',['pending','0','proses','selesai']);
            $table->string('foto')->nullable();
            $table->bigInteger('id_kategori');
            $table->timestamps();
            $table->foreign('nik')
                  ->references('nik')
                  ->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_kategori')->references('id')->on('kategori')
                  ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
