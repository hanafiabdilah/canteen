@extends('layouts.app')
@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      @if($products->count() > 0)
        @foreach($products as $product)
          <div class="col-xl-3 col-sm-6 mb-4">
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
                  <div class="col-4 text-end">
                    @if($product->sold)
                      <span class="btn bg-gradient-danger">Sold</span>
                    @else
                      <span class="btn bg-gradient-success">Aktif</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-12">
          <div class="card">
            <div class="card-body text-center p-3">
              <h4>Anda belum memiliki product</h4>
              <a href="{{ route('product.create') }}" class="btn bg-gradient-primary">Add Product</a>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  <script>
    const sortBy = document.getElementById('sortBy')
    sortBy.addEventListener('change', function() {
      const sort = 'sort=' + this.value + ''
      let url = "{{ route('product.index', ':sort') }}"
      url = url.replace(':sort', sort)
      window.location.href = url
    })
  </script>
@endsection