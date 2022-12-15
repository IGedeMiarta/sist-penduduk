<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kk');
            $table->unsignedBigInteger('id_penduduk');
            $table->enum('status_kawin',[1,0]); 
            $table->string('hubungan');
            $table->foreign('id_kk')
                    ->references('id')
                    ->on('k_k_s')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_penduduk')
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
        Schema::dropIfExists('keluargas');
    }
}
