<?php

namespace App\Exports;

use App\Models\Kematian;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportKematian implements FromView
{
//    public function __construct(int $month)
//     {
//         $this->month = $month;
//     }
//     public function view(): View
//     {
//         return view('laporan.export.kematian',[
//             'table' => Kematian::with(['penduduk'])->whereMonth('tanggal', '=', $this->month)->get()
//         ]);
//     }
    public function __construct(int $month)
    {
        $this->month = $month;
    }
    public function view(): View
    {
        return view('laporan.export.kematian',[
            'table' => Kematian::with(['penduduk'])->get()
        ]);
    }
}
