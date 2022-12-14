<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->unique();
            $table->unsignedBigInteger('kepala_kel');
            $table->string('alamat');
            $table->string('rt_rw');
            $table->string('kode_pos');
            $table->string('desa_kel');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->foreign('kepala_kel')
                    ->references('id')
                    ->on('penduduks')
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
        Schema::dropIfExists('k_k_s');
    }
}
