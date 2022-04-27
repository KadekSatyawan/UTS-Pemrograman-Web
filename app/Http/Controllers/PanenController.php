<?php

namespace App\Http\Controllers;

use App\Models\Panen;
use Illuminate\Http\Request;

class PanenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Halaman Panen";
        // eloquen
        $panens=new Panen;
        $panens=$panens->all();

        // query builder
        // $panens=Panen::getPanen()->get();
        return view ('admin/panen/daftarpanen', compact('title', 'panens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/panen/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $messages = [
        //     'required'=> 'kolom : attribute harus lengkap',
        //     'numeric'=> 'kolom : attribute harus angka'
        // ];
        
        // $validasi=$request->validate([
        //     'productName' => 'required',
        //     'kelompokName' => 'required',
        //     'perkiraanPanenData' => 'required',
        //     'perkiraanPanenJumlah' => 'required',
        //     'PanenData' => 'required',
        //     'PanenData' => 'required',
        //     'satuan' => 'required'
        // ], $messages);

        // try {
        //     $response = Panen::create($validasi);
        //     return redirect('panen');
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        // }

        $request->validate([
            'productName' => 'required',
            'kelompokName' => 'required',
            'perkiraanPanenDate' => 'required',
            'perkiraanPanenJumlah' => 'required',
            'PanenDate' => 'required',
            'PanenJumlah' => 'required',
            
        ]);

        Panen::create([
            'productName' => $request->product->productName,
            'kelompokName' => $request->kelompokName,
            'perkiraanPanenDate' => $request->perkiraanPanenDate,
            'perkiraanPanenJumlah' => $request->perkiraanPanenJumlah,
            'PanenDate' => $request->PanenDate,
            'PanenJumlah' => $request->PanenJumlah,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil ditambahkan
        </div>');
        
        return redirect('/panen');
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
        $title="Input Panen";
        $panens=Panen::all();
        

        // query builder
        $panens=Panen::getPanen()->get();
        return view ('admin/panen/edit', compact('title', 'panens'));


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
            'productName' => 'required',
            'kelompokName' => 'required',
            'perkiraanPanenDate' => 'required',
            'perkiraanPanenJumlah' => 'required',
            'PanenDate' => 'required',
            'PanenJumlah' => 'required',
            
        ]);

        Panen::whereId($id)->update([
            'productName' => $request->product->productName,
            'kelompokName' => $request->kelompokName,
            'perkiraanPanenDate' => $request->perkiraanPanenDate,
            'perkiraanPanenJumlah' => $request->perkiraanPanenJumlah,
            'PanenDate' => $request->PanenDate,
            'PanenJumlah' => $request->PanenJumlah,
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil ditambahkan
        </div>');
        
        return redirect('/panen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Panen::where('id',$id)->delete();
        // return redirect('panens')->with('success','Data Berhasil Dihapus');

        Panen::whereId($id)->delete();
        $request->session()->flash('sukses', '
        <div class="alert alert-success" role="alert">
        Data berhasil dihapus
        </div>');
        
        return redirect('/panen');
    }
}
