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
          <div class="col-lg-10">
            <h2>{{ empty($search) ? 'All' : 'Search' }} Travel History</h2>
            <p>Here is your {{ empty($search) ? '' : 'searched' }} travel schdule and history</p>

            @if(empty($search))
            <a class="btn btn-md btn-primary" href="{{ route('travel.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Travel Schedule</a>
            @else
            <a class="btn btn-sm btn-primary" href="{{ route('travel.index') }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh List</a>
            @endif

            {!! Form::open(['url' => '/profile/travel', 'method'=>'get']) !!}
              <div class="row mb-5">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <!-- Material input email -->
                  <div class="md-form">
                      {!! Form::text('search', $search, ['class'=>'form-control', 'id'=>'search']) !!}
                      {!! Form::label('search', 'Search Travel History') !!}
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="text-center mt-4">
                    {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                  </div>
                </div>
              </div>
            {!! Form::close() !!}
            
          @foreach($travelHistory as $travel)
            <!--Grid row-->
            <div class="row">
              <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                <h5 class="font-weight-bold"><i class="fa fa-plane fa-sm pr-2"></i>{{ $travel->city }}, {{ $travel->country->name }}</h5>
                <h6><i class="fa fa-map-marker fa-sm pr-2"></i><span class="dark-grey-text font-weight-bold">{{ $travel->destination }}</span></h6>
                <p>
                  <i class="fa fa-calendar-check-o fa-sm pr-2"></i><span class="blue-text">{{ date('l d F Y', strtotime($travel->arrival_date)) }}</span> &#8594; <span class="blue-text">{{ date('l d F Y', strtotime($travel->leave_date)) }}</span>
                </p>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                {!! Form::open(['route' => ['travel.destroy', $travel->id], 'method'=>'delete']) !!}
                  <a href="{{ route('travel.show', $travel->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View More</a>
                  {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete</a>', array('class' => 'btn btn-warning btn-sm form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Your travel schedule will disapper from history!', 'confirmButtonText'=>'Yes, delete travel schedule!', 'type'=>'submit')) !!}
                {!! Form::close() !!}
              </div>
            </div>
            <!--Grid row-->
            <hr class="mb-4">
          @endforeach      

            <!--Pagination-->
            <nav aria-label="pagination example">
              <ul class="pagination pg-blue">
                {{ $travelHistory->appends(Request::only('search'))->links() }}
              </ul>
            </nav> 
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

