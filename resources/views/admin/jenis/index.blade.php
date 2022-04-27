@extends('sb-admin/app')
@section('title', 'Jenis')

@section('content')
{!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Jenis Sampah</h1>

    <button type="button">
        <a href="/jenis/create" class="px-1 py-1 text-blue font-light tracking-wider bg-yellow-500 rounded fa fa-plus"> Tambah</a>
    </button>

    {{-- table --}}
    <table class="table mt-4 table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Sampah</th>
            <th scope="col">Jenis Sampah</th>
            <th scope="col">Nama Sampah</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $row)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$row->kode_sampah}}</td>
            <td>{{$row->jenis_sampah}}</td>
            <td>{{$row->nama_sampah}}</td>
            <td width="20%">
            <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/jenis/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
            <form action="/jenis/{{$row->id}}" method="post">
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

    {{$jenis->links()}}
@endsection