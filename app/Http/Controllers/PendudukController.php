<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pendidikan;
use App\Models\Penduduk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Penduduk';
        $data['table'] = Penduduk::with(['Agama','Pendidikan'])->get();
        $data['agama'] = Agama::all();
        $data['pendidikan'] = Pendidikan::all();
        return view('masterdata.penduduk',$data);
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
        $validate = $request->validate([
            'nik'       => 'required|numeric',
            'nama'      => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin'       => 'required',
            'agama'     => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu'  => 'required',
            'kewarganegaraan'  => 'required'
        ]);
        // dd($request->all());
        try {
            Penduduk::create([
                'nik'           => $request->nik,
                'nama'          => strtoupper($request->nama),
                'tmp_lahir'     => strtoupper($request->tmp_lahir),
                'tgl_lahir'     => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama_id'      => $request->agama,
                'pendidikan_id' => $request->pendidikan,
                'pekerjaan'     => strtoupper($request->pekerjaan),
                'nama_ayah'     => strtoupper($request->nama_ayah),
                'nama_ibu'      => strtoupper($request->nama_ibu),
                'kewarganegaraan'=> $request->kewarganegaraan
            ]);
            return redirect()->back()->with('success','Data Penduduk Ditambahkan');
        } catch (QueryException $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error','Data Gagal Ditambahkan '.$e->getMessage());
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
        $find = Penduduk::find($id);
        if(!$find){
            return redirect()->back()->with('error','Penduduk Not Found');
        }
        try {
            $find->update([
                'nik'           => $request->nik,
                'nama'          => strtoupper($request->nama),
                'tmp_lahir'     => strtoupper($request->tmp_lahir),
                'tgl_lahir'     => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama_id'      => $request->agama,
                'pendidikan_id' => $request->pendidikan,
                'pekerjaan'     => strtoupper($request->pekerjaan),
                'nama_ayah'     => strtoupper($request->nama_ayah),
                'nama_ibu'      => strtoupper($request->nama_ibu),
                'kewarganegaraan'=> $request->kewarganegaraan
            ]);
            return redirect()->back()->with('success','Data Penduduk Diperbaharui');
        } catch (QueryException $e) {

           return redirect()->back()->with('error','Data Gagal Diperbaharui '.$e->getMessage());
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
        $find = Penduduk::find($id);
        if(!$find){
            return redirect()->back()->with('error','Penduduk Not Found');
        }
        try {
            $find->delete();
            return redirect()->back()->with('success','Data Penduduk Dihapus');
        } catch (QueryException $e) {
           return redirect()->back()->with('error','Data Gagal Dihapus '.$e->getMessage());
        }
    }
}
