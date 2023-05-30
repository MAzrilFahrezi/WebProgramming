@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Home</title>
</head>
@if (session()->has('info'))
    <div class="alert alert-success">
        {{ session()->get('info') }}
    </div>
@endif
<div class="home">
    <!--Desktop -->
    <div class="d-none d-md-block">
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="d-flex h-100">
            <div class="justify-content-center align-self-center">
              <h2>
                <strong>Delicious POP Coffee Menu,</strong> <br />
                In Your Gadget
              </h2>
              <p>Pesan Kopi dan Minuman Favorit anda</p>
              <a class="btn btn-success mt-auto" href="/variant">Pesan</a>
                <b-icon-arrow-right></b-icon-arrow-right>
              </router-link>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <img src="img/coffee1.png" width="70%" />
        </div>
      </div>
    </div>
@endsection
