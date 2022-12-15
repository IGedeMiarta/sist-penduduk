<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\KK;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Kartu Keluarga';
        $data['table'] = KK::with(['kepalaKel'])->get();
        // dd($data);
        $data['penduduk'] = Penduduk::all();
        return view('masterdata.kk',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kk'     => 'required',
            'kepala_kel'=> 'required',
            'alamat'    => 'required',
            'rt_rw'     => 'required',
            'kode_pos'  => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi'  => 'required',
        ]);
        
        DB::beginTransaction();
        try {
            $kk = KK::create([
                'no_kk'     => $request->no_kk,
                'alamat'    => strtoupper($request->alamat),
                'rt_rw'     => $request->rt_rw,
                'kode_pos'  => $request->kode_pos,
                'desa_kel'  => strtoupper($request->kelurahan),
                'kecamatan' => strtoupper($request->kecamatan),
                'kabupaten_kota' => strtoupper($request->kabupaten),
                'provinsi'  => strtoupper($request->provinsi),
                'kepala_kel'=> $request->kepala_kel
            ]);
            Keluarga::create([
                'id_kk'         => $kk->id,
                'id_penduduk'   => $request->kepala_kel,
                'status_kawin'  => 1,
                'hubungan'      => strtoupper("Kepala Keluarga")
            ]);
            DB::commit();
            return redirect()->back()->with('success','Data KK Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Data KK Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kk = KK::find($id);
        if(!$kk){
            return redirect()->back()->with('error','Data Tidak Ditemukan');
        }
        try {
            $kk->update($request->all());
            return redirect()->back()->with('success','Data KK Diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Data KK Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = KK::find($id);
        if(!$kk){
            return redirect()->back()->with('error','Data Tidak Ditemukan');
        }
        try {
            $kk->delete();
            return redirect()->back()->with('success','Data KK Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Data KK Gagal Dihapus');
        }
    }
}
