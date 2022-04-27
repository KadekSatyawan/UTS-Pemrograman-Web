@extends('sb-admin/app')
@section('title', 'Harga')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Harga Sampah</h1>

<form action="/harga" method="POST" enctype="multipart/form.data">
    @csrf
  <div class="form-group">
    <label for="sampul" class="form-label">Sampul</label>
    <input type="file" class="form-control" id="sampul" name="sampul">
    @error('sampul')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="kode_sampah" class="form-label">Kode Sampah</label>
    <input type="number" class="form-control" id="kode_sampah" name="kode_sampah" value="{{old('kode_sampah')}}">
    @error('jenis_sampah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga" value="{{old('harga')}}">
    @error('harga')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
  <a href="/harga" class="btn btn-secondary btn-sm">Kembali</a>
</form>

@endsection