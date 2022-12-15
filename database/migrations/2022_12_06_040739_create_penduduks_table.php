<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique()->nullable();
            $table->string('nama');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->string('pekerjaan');
            $table->string('nama_ayah'); 
            $table->string('nama_ibu'); 
            $table->string('kewarganegaraan')->default('WNI');
            $table->integer('status')->default(1);
            $table->foreign('agama_id')
                    ->references('id')
                    ->on('agamas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('pendidikan_id')
                    ->references('id')
                    ->on('pendidikans')
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
        Schema::dropIfExists('penduduks');
    }
}
