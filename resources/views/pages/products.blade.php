@extends('layouts.app')
@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-4">
        <div class="d-flex align-items-center justify-content-around">
          <p class="mb-0">Sort By</p>
          <select class="form-control w-75" id="sortBy">
            <option value=""  {{ request()->sort == '' ? 'selected' : '' }}>Latest</option>
            <option value="asc" {{ request()->sort == 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request()->sort == 'desc' ? 'selected' : '' }}>Descending</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row mt-4">
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
                <div class="col-4 text-end">
                  <a href="" class="btn bg-gradient-primary">Beli</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
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