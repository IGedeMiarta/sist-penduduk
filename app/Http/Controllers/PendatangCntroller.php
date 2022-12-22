<?php

namespace App\Http\Controllers;

use App\Models\Pendatang;
use App\Models\Pindah;
use Illuminate\Http\Request;

class PendatangCntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Pendatang';
        $data['table'] = Pendatang::all();
        return view('masterdata.pendatang',$data);
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
            'nik'   => 'required|numeric',
            'nama'  => 'required',
            'tgl_datang'    => 'required|date',
            'keterangan'    => 'required|min:40'
        ]);
        try {
            Pendatang::create($request->all());
            return redirect()->back()->with('success','Data Pendatang Ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal Ditambahkan: '.$th->getMessage());
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
        $data = Pendatang::find($id);
        if(!$data){
            return redirect()->back()->with('error','Data Pendatang Tidak Ditemukan');

        }
        try {
            $data->update($request->all());
            return redirect()->back()->with('success','Data Pendatang Diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal Diubah: '.$th->getMessage());
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
        $data = Pendatang::find($id);
        if(!$data){
            return redirect()->back()->with('error','Data Pendatang Tidak Ditemukan');

        }
        try {
            $data->delete();
            return redirect()->back()->with('success','Data Pendatang Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal Dihapus: '.$th->getMessage());
        }
    }
}
