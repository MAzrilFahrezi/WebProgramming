@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Coffee</title>
</head>
<h4>Daftar Menu Coffee</h4>

@if (session()->has('info'))
<div class="alert alert-success">
    {{ session()->get('info') }}
</div>
@endif

<div class="d-md-flex justify-content-md-end">
    <a href="{{ route('coffee.create') }}" class="btn btn-primary mb-3">Tambah</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Coffee</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coffee as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->kdCoffee }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                <img src="{{asset('storage/'. $item->foto)}}" alt="" width="100">
            </td>
            
            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                <td class="text-align-center">
                    @can('delete_coffee', \App\Models\coffee::class)
                    <form action="{{ url('/coffee/delete/'.$item->kdCoffee) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn fa-solid fa-trash-can"></button>
                    </form>
                    @endcan
                    @can('update_coffee', \App\Models\coffee::class)
                    <a href="{{ url('/coffee/edit/'.$item->kdCoffee) }}" class="btn fa-solid fa-pen"></a>
                    @endcan
                </td>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection