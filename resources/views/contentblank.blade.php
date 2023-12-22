{{-- Setting Index --}}

@extends('master.template')

@section('css')
  @include('master.dashboardcss')
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"></h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Content Column -->
      <div class="col-lg-12 mb-8">

        <!-- Project Card Example -->
        <div class="card shadow mb-12">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Setting</h6>
          </div>
          
          {{-- Write Here --}}

          

        </div>
      </div>
    </div>
  </div>

        <!-- /.container-fluid -->
@endsection

@section('script')
  @include('master.dashboardcore')
@endsection