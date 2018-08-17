@extends('layouts.master')

@section('title', "Add Request || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        Travelers
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Travelers</li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.travel.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Travelers</a></li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.travel.show', $traveler->id) }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Travel Schedule</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Add Request</li>
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Show Order -->
        <div class="col-lg-8">

        </div>        
        <!-- #END# Show Order -->

        <!-- Left Menu Column -->
        @include('travel.rightmenu', [$countries, $keyword='', $country='', $from='', $to=''])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

