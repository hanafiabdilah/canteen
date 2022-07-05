@extends('layouts.app')

@section('content')
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-3 mt-3 mt-lg-0">
        <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Saldo</p>
                    <h5 class="font-weight-bolder mb-0">
                       Rp. {{ number_format($total_saldo, 0, '.', '.') }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-3 mt-3 mt-lg-0">
        <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo Saat Ini</p>
                    <h5 class="font-weight-bolder mb-0">
                       Rp. {{ number_format($saldo, 0, '.', '.') }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-3 mt-3 mt-lg-0">
        <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Saldo Ditarik</p>
                    <h5 class="font-weight-bolder mb-0">
                       Rp. {{ number_format($saldo_ditarik, 0, '.', '.') }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body p-3">
            <h5>Student</h5>
            <hr>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Saldo</th>
                </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $student->name }}</h6>
                          <p class="text-xs text-secondary mb-0">{{ $student->email }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      Rp. {{ number_format($student->saldo, 0, '.', '.') }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-3 mt-lg-0">
        <div class="card">
          <div class="card-body p-3">
            <h5>Withdraw History</h5>
            <hr>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($withdraw_history as $item)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $item->student->name }}</h6>
                          <p class="text-xs text-secondary mb-0">{{ $item->student->email }}</p>
                        </div>
                      </div>
                    </td>
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