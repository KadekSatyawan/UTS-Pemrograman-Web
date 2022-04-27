@extends('sb-admin/app')
@section('title', 'Panen')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Daftar Panen</h1>

<form action="/harga" method="POST" enctype="multipart/form.data">
    @csrf
  <!-- <div class="form-group">
    <label for="sampul" class="form-label">Sampul</label>
    <input type="file" class="form-control" id="sampul" name="sampul">
    @error('sampul')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div> -->
  <div class="mb-3">
    <label for="productName" class="form-label">Produk</label>
    <select class="form-control" id="productName" name="productName" value="{{old('productName')}}" style="width: 100%;">
      <option>Pilih</option>
      <option>Apel</option>
      <option>Jeruk</option>
      <option>Salak Bali</option>
      <option>Nanas</option>
      <option>Jambu</option>
    </select>
    @error('productName')
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
    <label for="perkiraanPanenDate" class="form-label">Perkiraan Panen</label>
    <input type="date" class="form-control" id="perkiraanPanenDate" name="perkiraanPanenDate" value="{{old('perkiraanPanenDate')}}">
    @error('perkiraanPanenDate')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="perkiraanPanenJumlah" class="form-label">Perkiraan Jumlah</label>
    <input type="number" class="form-control" id="perkiraanPanenJumlah" name="perkiraanPanenJumlah" value="{{old('perkiraanPanenJumlah')}}">
    @error('perkiraanPanenJumlah')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="PanenDate" class="form-label">Tanggal Panen</label>
    <input type="date" class="form-control" id="PanenDate" name="PanenDate" value="{{old('PanenDate')}}">
    @error('PanenDate')
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