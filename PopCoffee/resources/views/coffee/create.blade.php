@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Tambah Coffee</title>
</head>
<h4>Form Tambah Coffee</h4>
@if (session()->has('info'))
    <div class="alert alert-success">
        {{ session()->get('info') }}
    </div>
@endif
<form action="{{ url('coffee/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-2">
        <label for="kode">Kode Coffee</label>
        <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Coffee" class="form-control" value="{{ old('kdCoffee')}}">
        @error('kode')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="nama">Nama Coffee</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Coffee" class="form-control" value="{{ old('nama')}}">
        @error('nama')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="harga">Harga Coffee</label>
        <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Coffee" class="form-control" value="{{ old('harga')}}">
        @error('harga')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="stok">Stok Coffee</label>
        <input type="text" name="stok" id="stok" placeholder="Masukkan Stok Coffee" class="form-control" value="{{ old('stok')}}">
        @error('harga')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="foto">Foto/Logo</label>
        <input type="file" name="foto" id="foto" class="form-control">
        @error('foto')
            <div class="text-danger"> {{ $message }}</div>
        @enderror    
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection