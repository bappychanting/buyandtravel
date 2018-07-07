@extends('layouts.master')

@section('title', $user->name." || Travel History || ")

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
            <h2>{{ empty($search) ? 'All' : 'Search' }} Travel History</h2>
            <p>Here is your {{ empty($search) ? '' : 'searched' }} travel schdule and history</p>

            @if(empty($search))
            <a class="btn btn-md btn-primary mb-4" href="{{ route('travel.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Travel Schedule</a>
            @else
            <a class="btn btn-sm btn-primary mb-4" href="{{ route('travel.index') }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh List</a>
            @endif

            {!! Form::open(['url' => '/profile/travel', 'method'=>'get']) !!}
                <!-- Material input email -->
                <div class="md-form">
                    {!! Form::text('search', null, ['class'=>'form-control', 'id'=>'search']) !!}
                    {!! Form::label('search', 'Search Travel History') !!}
                </div>
                <div class="text-center mt-4">
                  {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                </div>
            {!! Form::close() !!}
            
          @foreach($travelHistory as $travel)
            <!--Grid row-->
            <h5 class="font-weight-bold"><i class="fa fa-plane"></i> {{ $travel->city }}, {{ $travel->country->name }}</h5>
            <p>
              <i class="fa fa-calendar-check-o"></i> <span class="deep-orange-text">{{ date('l d F Y', strtotime($travel->arrival_date)) }}</span> &#8594; <span class="deep-orange-text">{{ date('l d F Y', strtotime($travel->leave_date)) }}</span>
            </p>
            <h6><i class="fa fa-map-marker"></i> <span class="green-text font-weight-bold">{{ $travel->destination }}</span></h6>
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

