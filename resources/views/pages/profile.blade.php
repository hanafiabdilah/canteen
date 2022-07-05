@extends('layouts.app')

@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Profile Detail</h4>
          </div>
          <div class="card-body p-3">
            <div class="form-group">
              <label class="form-control-label">Name</label>
              <input name="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 mt-3 mt-lg-0">
        <div class="card">
          <div class="card-header">
            <h4>Saldo</h4>
          </div>
          <div class="card-body p-3">
            <div class="form-group">
              <label class="form-control-label">Total Saldo</label>
              <input class="form-control" value="{{ Auth::user()->saldo }}" disabled>
            </div>
            <hr>
            <h5>Tarik Saldo</h5>
            <form action="{{ route('profile.withdraw') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="jumlah" class="form-control-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" required>
              </div>
              <div class="form-group">
                <button class="btn btn-primary">Tarik</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection