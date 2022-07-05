@extends('layouts.app')
@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      @foreach($products as $product)
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="d-lg-flex align-items-center">
                <div class="text-center">
                  <img src="{{ asset('assets/img/products') }}/{{ $product->detail->image }}" style="height: 150px; object-fit: contain; border-radius: 5px;">
                </div>
                <div class="numbers mt-2 mt-lg-0 ms-lg-3">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $product->detail->name }}</p>
                  <h5 class="font-weight-bolder mb-0">
                    Rp. {{ number_format($product->detail->price, 0, '.', '.') }}
                  </h5>
                  <small>
                    {{ $product->detail->description }} <br>
                    Dijual oleh {{ $product->detail->seller->name }} <br>
                    Dibeli oleh {{ $product->buyer->name }} <br>
                    Dibeli pada {{ $product->created_at }}
                  </small>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection