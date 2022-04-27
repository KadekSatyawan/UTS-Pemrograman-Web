<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harga = Harga::select('id', 'sampul', 'kode_sampah', 'harga')->latest()->paginate(5);
        return view('admin/harga/index', compact('harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/harga/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'sampul' => 'required|file|mimes:jpg,jpeg,png',
            'kode_sampah' => 'required',
            'harga' => 'required',

        ]);
        $filename = time().$request->file('sampul')->getClientOriginalName();
        $path = $request->file('sampul')->storeAs('upload/harga', $filename);
        $validasi['sampul']=$path;
        $response = Harga::create($validasi);
 
        Harga::create([
            'sampul' => $request->sampul,
            'kode_sampah' => $request->kode_sampah,
            'harga' => $request->harga,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil ditambahkan
        </div>');
        
        return redirect('/harga');

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
