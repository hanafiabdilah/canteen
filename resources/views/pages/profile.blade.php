@extends('layouts.app')

@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-body p-3">
            <h5>Profile Detail</h5>
            <hr>
            <div class="form-group">
              <label class="form-control-label">User ID</label>
              <input name="user_id" class="form-control" value="{{ Auth::user()->user_id }}" disabled>
            </div>
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
          <div class="card-body p-3">
            <h5>Saldo</h5>
            <hr>
            <div class="form-group">
              <label class="form-control-label">Total Saldo</label>
              <input class="form-control" value="{{ Auth::user()->saldo }}" disabled>
            </div>
            <hr>
            <h6>Tarik Saldo</h6>
            <form action="{{ route('profile.withdraw') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="jumlah" class="form-control-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" id="jumlah" required>
                <small>*Minimal Rp. 1000</small>
              </div>
              <div class="form-group">
                <button class="btn btn-primary">Tarik</button>
              </div>
            </form>
            <hr>
            <h6>Withdraw History</h6>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach(Auth::user()->withdraw_history as $item)
                  <tr>
                    <td>
                      Rp. {{ number_format($item->amount, 0, '.', '.') }}
                    </td>
                    <td>
                      {{ $item->created_at }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection