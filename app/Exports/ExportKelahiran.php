<?php

namespace App\Exports;

use App\Models\Kelahiran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class ExportKelahiran implements FromView
{
    
    public function __construct(int $month)
    {
        $this->month = $month;
    }
    public function view(): View
    {
        return view('laporan.export.kelahiran',[
            'table' => Kelahiran::with('penduduk','penduduk.Agama','penduduk.Pendidikan')->whereMonth('tgl_lahir', '=', $this->month)->get()
        ]);
    }


    // public function query()
    // {
    //     return Kelahiran::with('penduduk','penduduk.Agama','penduduk.Pendidikan')->whereMonth('tgl_lahir', '=', $this->month);
    // }
}
