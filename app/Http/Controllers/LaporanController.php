<?php

namespace App\Http\Controllers;

use App\Exports\ExportKelahiran;
use App\Exports\ExportKematian;
use App\Exports\ExportPendatang;
use App\Exports\ExportPindah;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pendatang;
use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function lapKelahiran(){
        $data['title'] = 'Laporan Kelahiran';
        // $bulan =  date('m');
        $data['table'] = Kelahiran::with('penduduk','penduduk.Agama','penduduk.Pendidikan')->get();
        return view('laporan.kelahiran',$data);
    }
    public function exportKelahiran(){
        $m = date('M');
        $y = date('Y');
        return Excel::download(new ExportKelahiran(date('m')),'Report_Kelahiran_'.$m.'_'.$y.'.xlsx');
    }
    public function lapKematian(){
        $data['title'] = 'Kematian';
        $bulan =  date('m');
        $data['table'] = Kematian::with(['penduduk'])->get();
        $data['penduduk'] = Penduduk::all();
        return view('laporan.kematian',$data);
    }
    public function exportKematian(){
        $m = date('M');
        $y = date('Y');
        return Excel::download(new ExportKematian(date('m')),'Report_Kematian_'.$m.'_'.$y.'.xlsx');
    }
    public function lapPendatang(){
        $data['title'] = 'Pendatang';
        $bulan =  date('m');
        $data['table'] = Pendatang::all();
        return view('laporan.pendatang',$data);
    }
    public function exportPendatang(){
        $m = date('M');
        $y = date('Y');
        return Excel::download(new ExportPendatang,'Report_Pendatang_'.$m.'_'.$y.'.xlsx');
    }
     public function lapPindah(){
        $data['title'] = 'Pindah';
        $bulan =  date('m');
        $data['table'] = Pindah::with(['penduduk'])->get();
        return view('laporan.pindah',$data);
    }
    public function exportPindah(){
        $m = date('M');
        $y = date('Y');
        return Excel::download(new ExportPindah(date('m')),'Report_Pindah_'.$m.'_'.$y.'.xlsx');
    }

    public function surat(){
        $data['title'] = 'Penduduk';
        $data['penduduk'] = Penduduk::all();
   
        return view('surat.penduduk',$data);
    }
     public function suratKet($id){
        $data['title'] = 'Surat';
        $user = Penduduk::with(['Agama'])->find($id);
        $data += [
            'nama'  => $user->nama,
            'ttl'   => $user->tmp_lahir .', '.date('d-m-Y',strtotime($user->tgl_lahir)),
            'agama' => $user->Agama->nama,
            'jenkel'   => $user->jenis_kelamin=='P'?'PEREMPUAN':'LAKI-LAKI',
            'pekerjaan'=> $user->pekerjaan,
            // 'alamat'    =>
        ];
        return view('surat.index',$data);
    }
    public function suratKos(){
        $data['title'] = 'Surat';
        $data['keperluan'] = [
            'Kartu Keluarga',
            'Kartu Tanda Penduduk (KTP)',
            'Surat Keterangan Kelurahan',
            'Surat Keterangan Nikah',
            'Surat Keterangan Usaha/Domisili Usaha',
            'Surat Keterangan Domisili Biasa',
            'Surat Keterangan Pindah',
            'Surat Keterangan Tidak Mampu',
            'Surat Keterangan Kematian',
            'Surat Keterangan Kepemilikan Tanah/Pelepasan Tanah',
            '....................................................................................................',
            '....................................................................................................', 
        ];
         $data['lain'] = false;
         $data['nomor'] = '....../....../...... /';
        return view('surat.index',$data);
    }
    public function buatSurat(Request $request){
        // dd($request->all());
        $data['title'] = 'Surat';
        $user = Penduduk::with(['Agama'])->find($request->id_penduduk);
        if($user){
            $data += [
                'nama'  => $user->nama,
                'ttl'   => $user->tmp_lahir .', '.date('d-m-Y',strtotime($user->tgl_lahir)),
                'agama' => $user->Agama->nama,
                'jenkel'   => $user->jenis_kelamin=='P'?'PEREMPUAN':'LAKI-LAKI',
                'pekerjaan'=> $user->pekerjaan,
            ];
        }
        // dd($request->all());
        $data['nomor'] = $request->nomor;
        
        $data['keperluan'] = $request->keperluan??[
            'Kartu Keluarga',
            'Kartu Tanda Penduduk (KTP)',
            'Surat Keterangan Kelurahan',
            'Surat Keterangan Nikah',
            'Surat Keterangan Usaha/Domisili Usaha',
            'Surat Keterangan Domisili Biasa',
            'Surat Keterangan Pindah',
            'Surat Keterangan Tidak Mampu',
            'Surat Keterangan Kematian',
            'Surat Keterangan Kepemilikan Tanah/Pelepasan Tanah',
            '....................................................................................................',
            '....................................................................................................', 
        ];
        $data['lain']      = ucwords($request->lain);
        // dd($data);
       return view('surat.index',$data);
    }
}
