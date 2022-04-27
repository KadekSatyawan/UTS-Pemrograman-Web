@extends('sb-admin/app')
@section('title', 'Pendataan')

@section('content')
{!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Petani</h1>
    <button type="button">
        <a class="dropdown-item" href="/pendataan/create"><i class="fas fa-plus"></i> Tambah</a>
    </button>    
    <button type="button">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-trash"></i> Hapus</a>
    </button>        
    <table class="table mt-4 table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Petani</th>
      <th scope="col">Asal</th>
      <th scope="col">Alamat</th>
      <th scope="col">NIK</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama Kelompok</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($petanis as $item)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->namaPetani}}</td>
            <td>{{$item->asal}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->NIK}}</td>
            <td>
              <img src="{{ url ('img/'.$item->foto) }}" width="100px" alt="">
            </td>
            <td>{{$item->kelompokName}}</td>
            <td width="20%">
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/pendataan/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
              <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button>
            </a>                
            </div>                    
            </td>
            </tr>
        @endforeach
  </tbody>
</table>

{{$petanis->links()}}

@endsection