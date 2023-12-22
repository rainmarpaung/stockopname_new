{{-- Setting Index --}}

@extends('master.template')

@section('css')
  @include('master.generalcss')
@endsection

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404">404</div>
      <p class="lead text-gray-800 mb-5">Page Not Found</p>
      <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
      <a href="dashboard">&larr; Back to Dashboard</a>
    </div>

  </div>
  <!-- /.container-fluid -->

<!-- End of Main Content -->

        <!-- /.container-fluid -->
@endsection

@section('script')
@include('master.generalcore')
@endsection