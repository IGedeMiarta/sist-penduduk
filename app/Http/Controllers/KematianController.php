<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Kematian';
        $data['table'] = Kematian::with(['penduduk'])->get();
        $data['penduduk'] = Penduduk::all();
        return view('masterdata.kematian',$data);
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
            'id_penduduk' => 'required',
            'tanggal'     => 'required|date',
            'ket'         => 'required'  
        ]);
        // dd($request->all());
        $penduduk = Penduduk::find($request->id_penduduk);
        if(!$penduduk){
            return redirect()->back()->with('error','Penduduk tidak ditemukan');
        }
        DB::beginTransaction();
        try {
            Kematian::create([
                'id_penduduk' => $request->id_penduduk,
                'tanggal'     => $request->tanggal,
                'ket'         => $request->ket
            ]); 
            $penduduk->update(['status' => 3 ]);
            DB::commit();
            return redirect()->back()->with('success','Data Berhasil Ditambahkan');

        } catch (QueryException $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Data Gagal Ditambahkan : '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kematian $kematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kematian = Kematian::find($id);
        if(!$kematian){
            return redirect()->back()->with('error','Data tidak ditemukan');
        }
        DB::beginTransaction();
        try {
           Penduduk::find($kematian->id_penduduk)->update(['status'=>1]);
           $kematian->update($request->all());
           Penduduk::find($request->id_penduduk)->update(['status'=>3]);
           DB::commit();
           return redirect()->back()->with('success','Data Berhasil Diubah');
        } catch (\Throwable $th) {
            DB::rollBack();
           return redirect()->back()->with('error','Data Gagal Diubah:'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kematian = Kematian::find($id);
        if(!$kematian){
            return redirect()->back()->with('error','Data tidak ditemukan');
        }
        DB::beginTransaction();
        try {
           $kematian->delete();
           Penduduk::find($kematian->id_penduduk)->update(['status'=>1]);
           DB::commit();
           return redirect()->back()->with('success','Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
           return redirect()->back()->with('error','Data Gagal Dihapus:'.$th->getMessage());
        }
    }
}
