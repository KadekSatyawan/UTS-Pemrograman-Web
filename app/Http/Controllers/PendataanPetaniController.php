<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;

class PendataanPetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petanis = Petani::select(
            'kelompokID', 'namaPetani', 'asal', 'alamat', 'NIK', 'foto','kelompokName'
            )->latest()->simplePaginate(3);
        return view ('admin/pendataan/pendataan_petani', compact('petanis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pendataan/edit');
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
            'namaPetani' => 'required',
            'asal' => 'required',
            'alamat' => 'required',
            'NIK' => 'required',
            'foto' => 'required|file|mimes:jpg,jpeg,png',
            'kelompokName' => 'required',
        
        ]);

        $filename = time().$request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('upload/pendataan', $filename);
        $validasi['foto']=$path;
        $response = Petani::create($validasi);

            Petani::create([
                'namaPetani' => $request->namaPetani,
                'asal' => $request->asal,
                'alamat' => $request->alamat,
                'NIK' => $request->NIK,
                'foto' => $request->foto,
                'kelompokName' => $request->kelompokName,
            ]);
    
            $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
            </div>');
            
            return redirect('/pendataan');

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
        $petanis = Petani::select(
            'kelompokID', 'namaPetani', 'asal', 'alamat', 'NIK', 'foto','kelompokName'
            )->whereID($id)->first();
        return view ('admin/pendataan/edit', compact('petanis'));
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
            'namaPetani' => 'required',
            'asal' => 'required',
            'alamat' => 'required',
            'NIK' => 'required',
            'foto' => 'required|file|mimes:jpg,jpeg,png',
            'kelompokName' => 'required',
        
        ]);

        $filename = time().$request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('upload/pendataan', $filename);
        $validasi['foto']=$path;
        $response = Petani::create($validasi);

            Petani::whereID($id)->update([
                'namaPetani' => $request->namaPetani,
                'asal' => $request->asal,
                'alamat' => $request->alamat,
                'NIK' => $request->NIK,
                'foto' => $request->foto,
                'kelompokName' => $request->kelompokName,
            ]);
    
            $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan
            </div>');
            
            return redirect('/pendataan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        Petani::whereId($id)->delete();
        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil dihapus
        </div>');
        
        return redirect('/pendataan');
    }
}
