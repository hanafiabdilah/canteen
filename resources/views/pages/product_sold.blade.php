@extends('layouts.app')
@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      @foreach($products as $product)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header text-center">
              <img src="{{ asset('assets/img/products') }}/{{ $product->image }}" style="height: 150px; width: 100%; object-fit: contain;">
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $product->name }}</p>
                    <h5 class="font-weight-bolder mb-0">
                      Rp. {{ number_format($product->price, 0, '.', '.') }}
                    </h5>
                    <small>{{ $product->description }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection