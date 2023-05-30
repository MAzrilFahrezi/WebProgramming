@extends('layouts.main')

@section('container')
<head>
    <title>PopCoffee - Variant</title>
</head>
@if (session()->has('info'))
    <div class="alert alert-success">
        {{ session()->get('info') }}
    </div>
@endif
<div class="position-relative">
    <div class="position-absolute top-0 end-0">
        <a class="btn btn-dark position-relative" type="submit" href="{{ url('/cart') }}">
            <i class="bi-cart-fill me-1"></i>
            Cart 
            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"></span>
            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
        </a>
    </div>
</div>

<!-- Header-->
<header class="py-5">
    <div>
        <img class="card-img-top" src="img/BannerPop-RecoveredV2.jpg" height="260" />
    </div>
</header>

<!-- Section-->
<section class="py-3">
    <div class="container px-3 px-lg-3 mt-3">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($coffee as $item)
            <div class="col mb-3">
                <div class="card" style="width: 18rem;">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset('storage/'. $item->foto)}}" width="180" height="180"/>
                    <!-- Product details-->
                    <div class="card-body">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $item->nama }}</h5>
                            <!-- Product price-->
                            <p class="card-text">
                                Rp. {{ $item->harga }}
                            </p>
                            <!-- Product stok-->
                            Stok : {{ $item->stok }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto btn-sm" href="{{ route('add.to.cart', $item->kdCoffee) }}">
                                <i class="fa-solid fa-cart-shopping"></i> Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="js/scripts.js"></script>
@endsection