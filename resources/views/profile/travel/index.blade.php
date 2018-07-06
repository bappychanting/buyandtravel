@extends('layouts.master')

@section('title', $user->name." || Travel History || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        Travel History
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>User Content</li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Travel History</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
                    <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>All Travel History</h2>
            <p>Here is your travel schdule and history</p>
          <a class="btn btn-md btn-primary mb-4" href="{{ route('travel.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Travel Schedule</a>

                <!-- Material input email -->
                <div class="md-form">
                    <input type="email" class="form-control">
                    <label for="materialFormRegisterEmailEx">Search Travel History</label>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </div>

            
          @foreach($travelHistory as $travel)
            <!--Grid row-->
            <h5 class="font-weight-bold"><i class="fa fa-plane"></i> {{ $travel->city }}, {{ $travel->country->name }}</h5>
            <p>
              <i class="fa fa-time"></i>From <span class="deep-orange-text">{{ date('l d F Y', strtotime($travel->arrival_date)) }}</span>, To <span class="deep-orange-text">{{ date('l d F Y', strtotime($travel->leave_date)) }}</span>
            </p>
            <h6 class="font-weight-bold">Visiting Zone: {{ $travel->destination }}</h6>
            <p class="mt-2">
              {!! str_limit($travel->additional_details, 150) !!}
            </p>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="user_travel_schedule_details.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View More</a>
                <a href="#" class="btn btn-blue btn-sm delete_sweet_alert"><i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete</a>
            </div>
            <!--Grid row-->
            <hr class="mb-4">
          @endforeach      

            <!--Pagination-->
            <nav aria-label="pagination example">
              <ul class="pagination pg-blue">
                {!! $travelHistory->links() !!}
              </ul>
            </nav> 
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

