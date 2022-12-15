<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\KK;
use App\Models\Penduduk;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Keluarga';
        $data['table'] = Keluarga::with('KartuKel','Penduduk','Penduduk.Agama','Penduduk.Pendidikan')->where('id_kk',$id)->get();
        $data['kk'] = KK::with(['kepalaKel'])->find($id);
        $data['penduduk']= Penduduk::all();
        return view('masterdata.keluarga',$data);
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
       $keluarga = Keluarga::find($id);
       try {
           
            Keluarga::create([
                'id_kk' => $keluarga->id_kk,
                'id_penduduk'   => $request->penduduk_id,
                'status_kawin'  => $request->status_kawin,
                'hubungan'      => $request->hubungan
            ]);
            return redirect()->back()->with('success','Data Keluarga Ditambahkan');
        } catch (\Throwable $th) {
           return redirect()->back()->with('error','Data Keluarga Gagal Ditambahkan '.$th->getMessage());
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
        //
    }
}
