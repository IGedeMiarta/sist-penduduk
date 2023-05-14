<?php

namespace App\Exports;

use App\Models\Pindah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportPindah implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function __construct(int $month)
    {
        $this->month = $month;
    }
    public function view(): View
    {
        return view('laporan.export.pindah',[
            'table' => Pindah::with(['penduduk'])->whereMonth('tgl_pindah', '=', $this->month)->get()
        ]);
    }
}
