<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Kelahiran;
use App\Models\Keluarga;
use App\Models\KK;
use App\Models\Pendidikan;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Kelahiran';
        $data['table'] = Kelahiran::all();
        $data['agama'] = Agama::all();
        $data['pendidikan'] = Pendidikan::all();
        $data['kk']    = KK::with(['kepalaKel'])->get();
        return view('masterdata.kelahiran',$data);
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
            'kk'    => 'required',
            'nama_ayah' => 'required',
            'nama_ibu'  => 'required',
            'nik'       => 'numeric',
            'nama'      => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama'     => 'required',
            'kewarganegaraan'=> 'required'
        ]);
        $pendidikan = 1;
        $pekerjaan = "-";
        DB::beginTransaction();
        try {
            Kelahiran::create([
                'nama'      => strtoupper($request->nama),
                'tgl_lahir' => $request->tgl_lahir,
                'id_kk'     => $request->kk
            ]);
            $penduduk = Penduduk::create([
                'nik'           => $request->nik,
                'nama'          => strtoupper($request->nama),
                'tmp_lahir'     => strtoupper($request->tmp_lahir),
                'tgl_lahir'     => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama_id'      => $request->agama,
                'pendidikan_id' => $pendidikan,
                'pekerjaan'     => strtoupper($pekerjaan),
                'nama_ayah'     => strtoupper($request->nama_ayah),
                'nama_ibu'      => strtoupper($request->nama_ibu),
                'kewarganegaraan'=> $request->kewarganegaraan
            ]);
            Keluarga::create([
                'id_kk' => $request->kk,
                'id_penduduk'   => $penduduk->id,
                'status_kawin'  => "0",
                'hubungan'      => "ANAK"
            ]);
            DB::commit();
            return redirect()->back()->with('success','Kelahiran Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Kelahiran Gagal Ditambahkan '.$th->getMessage());
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
        $kk = Keluarga::with(['Penduduk'])->where(['id_kk'=>$id,'hubungan'=>"KEPALA KELUARGA"])->first();
        $ayah = $kk->penduduk->nama;
        $kk = Keluarga::with(['Penduduk'])->where(['id_kk'=>$id,'hubungan'=>"ISTRI"])->first();
        $ibu = $kk->penduduk->nama;
       
        $data = [
            'ayah'  => $ayah,
            'ibu'   => $ibu
        ];
        if($kk){
            return response()->json(['status'=>200,'data'=>$data]);
        }else{
            return response()->json(['status'=>404,'data'=>$data]);        
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
