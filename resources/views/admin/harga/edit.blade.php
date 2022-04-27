@extends('sb-admin/app')
@section('title', 'Harga')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Harga Sampah</h1>

<form action="/jenis/{{$jenis->id}}" method="POST">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="kode_sampah" class="form-label">Kode Sampah</label>
    <input type="number" class="form-control" id="kode_sampah" name="kode_sampah" value="{{$jenis->kode_sampah}}">
    @error('kode_sampah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
    <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" value="{{$jenis->jenis_sampah}}">
    @error('jenis_sampah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="nama_sampah" class="form-label">Nama Sampah</label>
    <input type="text" class="form-control" id="nama_sampah" name="nama_sampah" value="{{$jenis->nama_sampah}}">
    @error('nama_sampah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary btn-sm">Edit</button>
  <a href="/jenis" class="btn btn-secondary btn-sm">Kembali</a>
</form>

@endsection