@extends('sb-admin/app')
@section('title', 'Panen')

@section('content')
{!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Panen</h1>
    <button type="button">
        <a href="/panen/create" class="px-1 py-1 text-blue font-light tracking-wider bg-yellow-500 rounded fa fa-plus"> Tambah</a>
    </button>
    <button type="button">
        <a href="/daftar/publish" class="px-1 py-1 text-blue font-light tracking-wider bg-yellow-500 rounded fa fa-pos"> Publish</a>
    </button>
    <button type="button">
        <a href="/daftar/delete" class="px-1 py-1 text-blue font-light tracking-wider bg-yellow-500 rounded fa fa-trash"> Delete</a>
    </button>
    <table class="table mt-4 table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kelompok Tani</th>
      <th scope="col">Perkiraan Panen</th>
      <th scope="col">Prkiraan Jumlah</th>
      <th scope="col">Tanggal Panen</th>
      <th scope="col">Jumlah Panen</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($panens as $item)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->product->productName}}</td>
            <td>{{$item->kelompokName}}</td>
            <td>{{$item->perkiraanPanenDate}}</td>
            <td>{{$item->perkiraanPanenJumlah}}</td>
            <td>{{$item->PanenDate}}</td>
            <td>{{$item->PanenJumlah}}</td>
            <td width="20%">
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/panen/{{$item->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
            <form action="/panen/{{$item->id}}" method="post">
                @method('DELETE')
                @csrf
            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
            </form>
            </div>
            </td>
            </tr>
        @endforeach
  </tbody>
</table>



@endsection