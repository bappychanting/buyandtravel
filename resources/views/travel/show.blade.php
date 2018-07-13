@extends('layouts.master')

@section('title', "View Travel Schedule || ")

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
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.travel.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Travelers</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Travel Schedule</li>
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Show Order -->
        <div class="col-lg-8" id="printableArea">

          <div class="row my-3">
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
              <div class="z-depth-1-half" id="aniimated-thumbnials">
                <a href="{{file_exists($traveler->user->avatar) ? asset($traveler->user->avatar) : 'http://via.placeholder.com/450?text=Product+Image' }}" data-sub-html="{{ $traveler->user->name }}">  
                  <img src="{{ file_exists($traveler->user->avatar) ? asset($traveler->user->avatar) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ $traveler->user->name }}">
                </a>
              </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-6 col-6">
              <h5 class="mt-0 font-weight-bold dark-grey-text"><a data-toggle="modal" data-target="#userPopup">{{ $traveler->user->name }}</a></h5>
              <h6 class="font-weight-bold mt-3">
                <i class="fa fa-plane fa-sm pr-2"></i>{{ $traveler->city }}, {{ $traveler->country->name }} 
                <i class="fa fa-map-marker fa-sm pr-2"></i><span class="dark-grey-text">{{ $traveler->destination }}</span>
              </h6>
              <p class="mt-3">
                <i class="fa fa-calendar-check-o fa-sm pr-2"></i>
                <span class="blue-text">{{ date('l d F Y', strtotime($traveler->arrival_date)) }}</span> &#8594; 
                <span class="blue-text">{{ date('l d F Y', strtotime($traveler->leave_date)) }}</span>
              </p>
            </div>
          </div>
          <div class="row my-3">
            <div class="col-md-12">
              <a class="btn btn-primary btn-md" href="add_request.php"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Request</a>
            </div>
            <div class="col-md-12">
              <div class="btn-group mt-3" role="group" aria-label="Basic example">
                <a href="travel_history.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Travel History</a>
                <a href="report_traveler.php" class="btn btn-blue btn-sm"><i class="fa fa-exclamation-triangle fa-sm pr-2" aria-hidden="true"></i>Report</a>
              </div>
            </div>
          </div>
          <p class="mb-3 mt-3">
            {!! $traveler->additional_details !!}   
          </p>
          <p><strong>User Contact:</strong> {{ str_replace('-', '', $traveler->user->contact) }}</p>
          <p><strong>User Email:</strong> <a href="{{ $traveler->user->email }}">{{ $traveler->user->email }}</a></p>
          <div class="btn-group mb-4" role="group" aria-label="Basic example">
                <button onclick="printDiv('printableArea')" class="btn btn-blue btn-sm"><i class="fa fa-print fa-sm pr-2" aria-hidden="true"></i>Print</button>
                <a href="{{ route('front.travel.pdf', $traveler->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-file-pdf-o fa-sm pr-2"" aria-hidden="true"></i>Save as PDF</a>
          </div>

        </div>        
        <!-- #END# Show Order -->

        <!-- Left Menu Column -->
        @include('travel.rightmenu', [$countries, $keyword='', $country='', $from='', $to=''])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- View Profile -->
    <div class="modal fade" id="userPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-user fa-sm pr-2"></i>{{ $traveler->user->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <img class="img-fluid rounded" src="{{ file_exists($traveler->user->avatar) ? asset($traveler->user->avatar) : 'http://via.placeholder.com/450?text=No+Profile+Picture+Found' }}" alt="{{ $traveler->user->name }} Avatar">
                    </div>
                    <div class="col-lg-6 mb-3">
                      <p>
                        <i class="fa fa-envelope prefix grey-text fa-sm pr-2"></i>
                        {{ $traveler->user->email }}
                      </p>
                      <p>
                        <i class="fa fa-phone prefix grey-text fa-sm pr-2"></i>
                        {{ str_replace('-', '', $traveler->user->contact) }}
                      </p>
                      <p>
                        <i class="fa fa-address-card prefix grey-text fa-sm pr-2"></i>
                        {{ $traveler->user->address }}
                      </p>
                      <p>
                        <i class="fa fa-star prefix grey-text fa-sm pr-2"></i>
                        5/10
                      </p>
                      <p>
                        <i class="fa fa-calendar-check-o prefix grey-text fa-sm pr-2"></i>
                        {{ $traveler->user->created_at->format('d F Y') }}
                      </p>
                    </div>
                    <div class="btn-group mt-4" role="group" aria-label="Basic example">
                      <a href="view_user.php" class="btn btn-blue btn-sm"><i class="fa fa-user fa-sm pr-2" aria-hidden="true"></i>View Profile</a>
                      <a href="view_order.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Follow User</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- View Profile -->

@endsection

