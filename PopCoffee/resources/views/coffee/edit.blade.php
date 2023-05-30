@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Edit Coffee</title>
</head>
<h4>Form Edit Coffee</h4>
@if (session()->has('info'))
    <div class="alert alert-success">
        {{ session()->get('info') }}
    </div>
@endif
<form action="{{ url('coffee/update/'. $coffee->kdCoffee) }}" method="post"  enctype="multipart/form-data">
    @csrf
    @method("PATCH") 
    <div class="form-group mb-2">
        <label for="kode">Kode Coffee</label>
        <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Coffee" class="form-control" value="{{ old('kode') ?? $coffee->kdCoffee }}">
        @error('kode')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="nama">Nama Coffee</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Coffee" class="form-control" value="{{ old('nama') ?? $coffee->nama}}">
        @error('nama')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="nama">Harga Coffee</label>
        <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Coffee" class="form-control" value="{{ old('harga') ?? $coffee->harga}}">
        @error('harga')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div> 
    <div class="form-group mb-2">
        <label for="nama">Stok Coffee</label>
        <input type="text" name="stok" id="stok" placeholder="Masukkan stok Coffee" class="form-control" value="{{ old('stok') ?? $coffee->stok}}">
        @error('stok')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label>Foto Lama</label>
        <div>
            <img src="{{asset('storage/'. $coffee->foto)}}" alt="" width="100">
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
        @error('foto')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection