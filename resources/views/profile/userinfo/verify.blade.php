@extends('layouts.master')

@section('title', "Verify Account || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Verify Account</li>
          </ol>
      </div>

      <h2 class="animated zoomIn text-center my-5 light-green-text">{{ $status }}</h2>
      <center>
        <a href="{{ route('profile.summery') }}" class="btn btn-primary"><i class="fa fa-send fa-sm pr-2"" aria-hidden="true"></i>Redirect to user homepage</a>
      </center>

    </div>

@endsection

