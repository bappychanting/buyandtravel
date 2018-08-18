@extends('layouts.master')

@section('title', $user->name." || View Request || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        User Content
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>User Content</li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('requests.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Requests</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Request</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>View Request</h2>
                <hr class="my-3">
           
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

