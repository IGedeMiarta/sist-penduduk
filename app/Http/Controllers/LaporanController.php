<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lapKelahiran(){
        $data['title'] = 'Laporan Kelahiran';
        $bulan =  date('m');
        $data['table'] = Kelahiran::with('penduduk','penduduk.Agama','penduduk.Pendidikan')->whereMonth('tgl_lahir', '=', $bulan)->get();
        return view('laporan.kelahiran',$data);
    }
}
