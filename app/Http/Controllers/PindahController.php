<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PindahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Perpindahan';
        $data['table'] = Pindah::with(['penduduk'])->get();
        $data['penduduk'] = Penduduk::all();
        return view('masterdata.pindah',$data);
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
        $keluarga = Keluarga::where('id_penduduk',$request->id_penduduk)->first();
        DB::beginTransaction();
        try {
            Pindah::create([
                'id_penduduk' => $request->id_penduduk,
                'id_kk'       => $keluarga?$keluarga->id_kk:null,
                'tgl_pindah'  => $request->tanggal,
                'keterangan'  => $request->ket,
            ]);
            Penduduk::find($request->id_penduduk)->update(['status'=>4]);
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
        $pindah = Pindah::find($id);
        if(!$pindah){
            return redirect()->back()->with('error','Data Not Found! ');
        }

        DB::beginTransaction();
        try {
            $keluarga = Keluarga::where('id_penduduk',$request->id_penduduk)->first();
            $pindah->update([
                'id_penduduk' => $request->id_penduduk,
                'id_kk'       => $keluarga?$keluarga->id_kk:null,
                'tgl_pindah'  => $request->tanggal,
                'keterangan'  => $request->ket,
            ]);
            Penduduk::find($request->id_penduduk)->update(['status'=>4]);
            DB::commit();
            return redirect()->back()->with('success','Data Berhasil Diupdate');
        } catch (QueryException $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Data Gagal Diupdate : '.$th->getMessage());
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
        $pindah = Pindah::find($id);
        if(!$pindah){
            return redirect()->back()->with('error','Data Not Found! ');
        }

        DB::beginTransaction();
        try {
            Penduduk::find($pindah->id_penduduk)->update(['status'=>1]);
            $pindah->delete();

            DB::commit();
            return redirect()->back()->with('success','Data Berhasil Dihapus');
        } catch (QueryException $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Data Gagal Dihapus : '.$th->getMessage());
        }
    }
}
