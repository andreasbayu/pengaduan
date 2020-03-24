<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pengaduan');
            $table->text('tanggapan');
            $table->unsignedBigInteger('id_petugas');
            $table->timestamps();
            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_petugas')->references('id')->on('petugas')
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
        Schema::dropIfExists('tanggapan');
    }
}
