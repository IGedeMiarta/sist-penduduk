<?php

namespace Database\Seeders;

use App\Models\Agama;
use App\Models\Pendidikan;
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
        // \App\Models\User::factory(10)->create();
        Agama::create([
            'nama'=>'ISLAM'
        ]);
        Agama::create([
            'nama'=>'KRISTEN PROTESTAN'
        ]);
        Agama::create([
            'nama'=>'KRISTEN KATOLIK'
        ]);
        Agama::create([
            'nama'=>'HINDU'
        ]);
        Agama::create([
            'nama'=>'BUDDHA'
        ]);
        Agama::create([
            'nama'=>'KONGHUCU'
        ]);
        Agama::create([
            'nama'=>'LAINNYA'
        ]);

        Pendidikan::create([
            'nama'=>'TIDAK / BELUM SEKOLAH'
        ]);
         Pendidikan::create([
            'nama'=>'TAMAT SD / SEDERAJAT'
        ]);
         Pendidikan::create([
            'nama'=>'BELUM TAMAT SD/SEDERAJAT'
        ]);
         Pendidikan::create([
            'nama'=>'SLTP/SEDERAJAT'
        ]);
         Pendidikan::create([
            'nama'=>'SLTA / SEDERAJAT'
        ]);
         Pendidikan::create([
            'nama'=>'DIPLOMA I / II'
        ]);
         Pendidikan::create([
            'nama'=>'AKADEMI/ DIPLOMA III/S. MUDA'
        ]);
         Pendidikan::create([
            'nama'=>'DIPLOMA IV/ STRATA I'
        ]);
         Pendidikan::create([
            'nama'=>'STRATA II'
        ]);
        Pendidikan::create([
            'nama'=>'STRATA III'
        ]);
    }
}
