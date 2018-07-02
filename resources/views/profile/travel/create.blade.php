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
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i><a href="{{ route('travel.index') }}" class="white-text">Travel History</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Add Travel Schedule</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
                    <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>Add Travel History</h2>
            <p class="font-weight-bold">Please Input Following Details</p>

              {!! Form::open(['method' => 'post', 'route' => ['travel.store']]) !!}
              <div class="demo-masked-input">

                <select class="mdb-select colorful-select dropdown-primary" searchable="Search here..">
                  <option value="" disabled selected>Country You are Traveling to</option>
                  @foreach($countries as $id => $country)
                    <option value="{{ $id }}">{{ $country }}</option>
                  @endforeach
                </select>

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::label('city', 'City') !!}
                  {!! Form::text('city', null, array('class' =>'form-control')) !!}
                </div>

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::label('destination', 'Destination') !!}
                  {!! Form::text('destination', null, array('class' =>'form-control')) !!}
                </div>

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::label('arrival_date', 'Travel Start Date') !!}
                  {!! Form::text('arrival_date', null, array('class' =>'form-control datepicker')) !!}
                </div>

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::label('leave_date', 'Travel End Date') !!}
                  {!! Form::text('leave_date', null, array('class' =>'form-control datepicker')) !!}
                </div>

                <!-- Material input text -->
                <p class="font-weight-bold my-3">Add Tags</p>
                  {!! Form::text('tags', null, array('placeholder'=>'Seperate tags with commas', 'data-role' =>'tagsinput')) !!}
                <hr>

                <p class="font-weight-bold my-3">Add Travel Details</p>
                <!-- Material Editor -->
                <div class="md-form">
                    {!! Form::textarea('additional_details', null, array('class'=>'editor')) !!}
                </div>

                <div class="text-center my-4">
                    {!! Form::submit('Add Travel Schedule', array('class' =>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}
              </div>
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection
