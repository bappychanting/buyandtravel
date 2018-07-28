@extends('layouts.master')

@section('title', "Travelers || ")

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
            @if(!empty($keyword) || !empty($country) || !empty($from) || !empty($to))
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.travel.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Travelers</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Search Travelers</li>
            @else
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Travelers</li>
            @endif
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">

        <div class="col-lg-8">
          <!-- Orders -->
          <section class="py-4">

          @foreach($travelers as $travel)
            <!--Grid row-->
              <div class="row mb-3">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                  <div class="z-depth-1-half">
                        <img src="{{ file_exists($travel->user->avatar) ? asset($travel->user->avatar) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ $travel->user->name }}">
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-6 col-6">
                  <h5 class="mt-0 font-weight-bold"><a class="font-weight-bold dark-grey-text" href="view_user.php">{{ $travel->user->name }}</a></h5>
                  <h6 class="font-weight-bold mt-3">
                    <i class="fa fa-plane fa-sm pr-2"></i>{{ $travel->city }}, {{ $travel->country->name }} 
                    <i class="fa fa-map-marker fa-sm pr-2"></i><span class="dark-grey-text">{{ $travel->destination }}</span>
                  </h6>
                  <p class="mt-3">
                    <i class="fa fa-calendar-check-o fa-sm pr-2"></i>
                    <span class="blue-text">{{ date('l d F Y', strtotime($travel->arrival_date)) }}</span> &#8594; 
                    <span class="blue-text">{{ date('l d F Y', strtotime($travel->leave_date)) }}</span>
                  </p>
                </div>
              </div>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ route('front.travel.show', $travel->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View More</a>
                  <a href="add_request.php" class="btn blue-gradient btn-sm"><i class="fa fa-plus fa-sm pr-2" aria-hidden="true"></i>Add Request</a>
              </div>
              <!--Grid row-->

              <hr class="mb-4">
          @endforeach

          <!--Pagination-->
          <nav aria-label="pagination example">
            <ul class="pagination pg-blue">                
              {{ $travelers->appends(request()->input())->links() }}
            </ul>
          </nav> 

          </section>
          <!-- #ENDS# Orders -->
        </div>

        <!-- Left Menu Column -->
        @include('travel.rightmenu', [$countries, $keyword, $country, $from, $to])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

