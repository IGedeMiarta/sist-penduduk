<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePindahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penduduk');
            $table->unsignedBigInteger('id_kk');
            $table->date('tgl_pindah');
            $table->text('keterangan');
            $table->foreign('id_penduduk')
                    ->references('id')
                    ->on('penduduks')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_kk')
                    ->references('id')
                    ->on('k_k_s')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pindahs');
    }
}
