@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div class="row">
  <!-- Total IGS Staff Card -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Total IGS Staff
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStaff }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Application Card -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Application
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStaffInApps }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-laptop fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Database Card -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              Database
            </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalStaffInDB }}</div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-database fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Infra Card -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Infra
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStaffInInfra }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-server fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pie Chart -->
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Distribution</h6>
      </div>
      <div class="card-body">
        <div class="chart-pie pt-4">
          <canvas id="myPieChartStaff" data-app="{{ $totalStaffInApps }}" data-db="{{ $totalStaffInDB }}" data-infra="{{ $totalStaffInInfra }}"></canvas>
        </div>
        <div class="mt-4 text-center small">
          <span class="mr-2"><i class="fas fa-circle text-primary"></i> Application</span>
          <span class="mr-2"><i class="fas fa-circle text-success"></i> Database</span>
          <span class="mr-2"><i class="fas fa-circle text-info"></i> Infra</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
