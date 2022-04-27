<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::select('id', 'kode_sampah', 'jenis_sampah', 'nama_sampah')->latest()->simplePaginate(2);
        return view('admin/jenis/index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jenis/create');
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
            'kode_sampah' => 'required',
            'jenis_sampah' => 'required',
            'nama_sampah' => 'required',

        ]);

        Jenis::create([
            'kode_sampah' => $request->kode_sampah,
            'jenis_sampah' => $request->jenis_sampah,
            'nama_sampah' => $request->nama_sampah,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil ditambahkan
        </div>');
        
        return redirect('/jenis');
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
        $jenis = Jenis::select('id', 'kode_sampah', 'jenis_sampah', 'nama_sampah')->whereId($id)->first();
        return view('admin/jenis/edit', compact('jenis'));
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
        $request->validate([
            'kode_sampah' => 'required',
            'jenis_sampah' => 'required',
            'nama_sampah' => 'required',
        ]);

        Jenis::whereId($id)->update([
        'kode_sampah' => $request->kode_sampah,
        'jenis_sampah' => $request->jenis_sampah,
        'nama_sampah' => $request->nama_sampah,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil diedit
        </div>');
        
        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Jenis::whereId($id)->delete();
        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil dihapus
        </div>');
        
        return redirect('/jenis');
    }
}
