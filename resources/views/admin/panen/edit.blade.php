@extends('sb-admin/app')
@section('title', 'Panen')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Daftar Panen</h1>

<form action="/panen/{{$item->id}}" method="POST" enctype="multipart/form.data">
    @csrf
    @method('PATCH')
  <!-- <div class="form-group">
    <label for="sampul" class="form-label">Sampul</label>
    <input type="file" class="form-control" id="sampul" name="sampul">
    @error('sampul')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div> -->
  <div class="mb-3">
    <label for="produk" class="form-label">Produk</label>
    <select class="form-control" id="produk" name="produk" value="{{old('produk')}}" style="width: 100%;">
      <option>Pilih</option>
      <option>Apel</option>
      <option>Jeruk</option>
      <option>Salak Bali</option>
      <option>Nanas</option>
      <option>Jambu</option>
    </select>
    @error('produk')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="kelompok_tani" class="form-label">Kelompok Tani</label>
    <select class="form-control" id="kelompok_tani" name="kelompok_tani" value="{{old('kelompok_tani')}}" style="width: 100%;">
      <option>Pilih</option>
      <option>Suda Mula</option>
      <option>Dharma Sari Mukti</option>
      <option>Linggasari</option>
      <option>Wana Amerta</option>
      <option>Darma Jati</option>
    </select>
    @error('kelompok_tani')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="perkiraanPanen" class="form-label">Perkiraan Panen</label>
    <input type="date" class="form-control" id="perkiraanPanen" name="perkiraanPanen" value="{{old('perkiraanPanen')}}">
    @error('perkiraanPanen')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="perkiraanJumlah" class="form-label">Perkiraan Jumlah</label>
    <input type="number" class="form-control" id="perkiraanJumlah" name="perkiraanJumlah" value="{{old('perkiraanJumlah')}}">
    @error('perkiraanJumlah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="tanggalPanen" class="form-label">Tanggal Panen</label>
    <input type="date" class="form-control" id="tanggalPanen" name="tanggalPanen" value="{{old('tanggalPanen')}}">
    @error('tanggalPanen')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="PanenJumlah" class="form-label"> Jumlah Panen</label>
    <input type="number" class="form-control" id="PanenJumlah" name="PanenJumlah" value="{{old('PanenJumlah')}}">
    @error('PanenJumlah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
  <a href="/panen" class="btn btn-secondary btn-sm">Kembali</a>
</form>



@endsection