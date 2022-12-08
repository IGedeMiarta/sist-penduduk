<?php

namespace App\Http\Controllers;

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
        $data['table'] = Penduduk::all();
        return view('penduduk.index',$data);
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
        // dd($request->all());
        $validate = $request->validate([
            'nik'       => 'required|numeric',
            'nama'      => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'sex'       => 'required'
        ]);
        try {
            Penduduk::create([
                'nik'       => $request->nik,
                'nama'      => $request->nama,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'sex'       => $request->sex,
                'status'    => 1
            ]);
            return redirect()->back()->with('success','Data Penduduk Ditambahkan');
        } catch (QueryException $e) {
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
                'nik'       => $request->nik,
                'nama'      => $request->nama,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'sex'       => $request->sex,
                'status'    => 1
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
