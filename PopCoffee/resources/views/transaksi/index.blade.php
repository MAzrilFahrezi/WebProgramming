@extends('layouts.main')

@section('container')
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session()->get('info') }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h4><strong>Keranjang Saya</strong></h4>
            <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Kopi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Hapus</th>
                </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td>
                                    <img class="img-responsive" src="{{ asset('storage/'. $details['image']) }}" width="150" height="110"/>
                                </td>
                                <td>{{ $details['name'] }}</td>
                                <td data-th="Price">Rp. {{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                </td>
                                <td>Rp. {{ $details['price'] * $details['quantity'] }}</td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa-regular fa-trash-can"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="text-right"><h4>Total : Rp. {{ $total }}</h4></td>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-right">
                            <a href="{{ url('/variant') }}" class="btn btn-warning btn-sm"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            <a class="btn btn-success btn-sm" href="{{ url('/tes') }}">
                                <i class="fa-solid fa-cart-shopping"></i> Checkout
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div> 
@endsection

@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection