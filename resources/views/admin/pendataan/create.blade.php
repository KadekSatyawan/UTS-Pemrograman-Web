@extends('sb-admin/app')
@section('title', 'Pendataan')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Data Petani</h1>

<form action="/pendataan" method="POST" enctype="multipart/form.data">
    @csrf
 
  <div class="mb-3">
    <label for="namaPetani" class="form-label">Nama Petani</label>
    <input type="text" class="form-control" id="namaPetani" name="namaPetani" value="{{old('namaPetani')}}">
    @error('namaPetani')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="asal" class="form-label">Asal</label>
    <input type="text" class="form-control" id="asal" name="asal" value="{{old('asal')}}">
    @error('asal')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}">
    @error('alamat')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="NIK" class="form-label">NIK</label>
    <input type="number" class="form-control" id="NIK" name="NIK" value="{{old('NIK')}}">
    @error('NIK')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto">
    @error('foto')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="kelompokName" class="form-label">Kelompok Tani</label>
    <select class="form-control" id="kelompokName" name="kelompokName" value="{{old('kelompokName')}}" style="width: 100%;">
      <option>Pilih</option>
      <option>Suda Mula</option>
      <option>Dharma Sari Mukti</option>
      <option>Linggasari</option>
      <option>Wana Amerta</option>
      <option>Darma Jati</option>
      <option>Dharma Bhuana</option>
    </select>
    @error('kelompokName')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
  <a href="/pendataan" class="btn btn-secondary btn-sm">Kembali</a>
</form>



@endsection