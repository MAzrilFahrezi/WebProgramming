@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Menu Pembayaran</title>
</head>
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session()->get('info') }}
        </div>
    @endif
    <form action="{{ url('detailpembelian/store/'.$transaksi->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <table class="table">
                <thead>
                    <h3>Menu Pembayaran</h3>
                </thead>
                <tbody>
                    <div class="col-md-6">
                        <form class="mt-4">
                            <div class="mb-3 form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" required autofocus>
                                @error('nama')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="noTelp">Nomor Telepon</label>
                                <input type="text" id="noTelp" class="form-control" name="noTelp" required autofocus>
                                @error('noTelp')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" class="form-control" name="alamat" required autofocus>
                                @error('alamat')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="payment">Jenis Pembayaran</label>
                                <select id="payment" name="payment" class="form-control" required>
                                    <option>COD</option>
                                    <option>Kartu Kredit</option>
                                    <option>Virtual Account</option>
                                    <option>GoPay</option>
                                    <option>DANA</option>
                                    <option>OVO</option>
                                </select>
                                @error('payment')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </tbody>
                <tfoot>
                    <td colspan="8" class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-cart-shopping"></i> Bayar
                        </button>
                    </td>
                </tfoot>
            </table>
        </div>  
@endsection