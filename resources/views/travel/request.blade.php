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
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.travel.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Travelers</a></li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.travel.show', $traveler->id) }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Travel Schedule</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Add Request</li>
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Show Order -->
        <div class="col-lg-8">

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

          <hr class="mb-3">

          <h2>Add Request</h2>
            <p class="font-weight-bold">Please Input Following Details</p>
              
              {!! Form::open(['method' => 'post', 'route' => ['requests.store']]) !!}

              <div class="demo-masked-input">

                {!! Form::hidden('user_id', $user->id) !!}
                {!! Form::hidden('traveler_id', $traveler->user->id) !!}
                {!! Form::hidden('travel_schedule_id', $traveler->id) !!}
                    
                <div class="md-form">
                  {!! Form::text('product_name', null, array('class' =>'form-control', 'id'=>'product_name')) !!}
                  {!! Form::label('product_name', 'Product Name') !!}
                </div>

                @if ($errors->has('product_name'))
                    <p class="red-text">{{ $errors->first('product_name') }}</p>
                @endif

                <div class="row mt-4" data-trigger="spinner">
                  <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">  
                    <div class="md-form">
                      {!! Form::text('product_quantity', 1, array('class' =>'form-control text-center', 'id'=>'expected_price', 'data-ruler'=>'quantity')) !!}
                      {!! Form::label('product_quantity', 'Product Quantity') !!}
                    </div> 
                  </div>
                  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button class="btn btn-primary btn-sm ml-0" type="button" data-spin="up"><i class="fa fa-sort-asc"></i></button>
                    <button class="btn btn-primary btn-sm" type="button" data-spin="down"><i class="fa fa-sort-desc"></i></button>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                 
                    @if ($errors->has('product_quantity'))
                        <p class="red-text">{{ $errors->first('product_quantity') }}</p>
                    @endif
                  </div>

                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('asking_price', null, array('class' =>'form-control', 'id'=>'asking_price')) !!}
                      {!! Form::label('asking_price', 'Asking Price') !!}
                    </div>

                    @if ($errors->has('asking_price'))
                        <p class="red-text">{{ $errors->first('asking_price') }}</p>
                    @endif
                  </div>

                  <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('reference_link', null, array('class' =>'form-control', 'id'=>'reference_link')) !!}
                      {!! Form::label('reference_link', 'Reference Link') !!}
                    </div>

                    @if ($errors->has('reference_link'))
                        <p class="red-text">{{ $errors->first('reference_link') }}</p>
                    @endif
                  </div>
                </div>

                <div class="md-form">
                  {!! Form::text('request_message_subject', null, array('class' =>'form-control', 'id'=>'request_message_subject')) !!}
                  {!! Form::label('request_message_subject', 'Subject For Request Conversation') !!}
                </div>

                @if ($errors->has('request_message_subject'))
                    <p class="red-text">{{ $errors->first('request_message_subject') }}</p>
                @endif

                <p class="font-weight-bold my-3">Add Request Details</p>

                @if ($errors->has('additional_details'))
                    <p class="red-text">{{ $errors->first('additional_details') }}</p>
                @endif

                <!-- Material Editor -->
                <div class="md-form">
                    {!! Form::textarea('additional_details', null, array('class'=>'editor')) !!}
                </div>

                <div class="text-center my-4">
                  {!! Form::submit('Add Request', array('class' =>'btn btn-primary')) !!}
                </div>
              </div>

              {!! Form::close() !!}

        </div>        
        <!-- #END# Show Order -->

        <!-- Left Menu Column -->
        @include('travel.rightmenu', [$countries, $keyword='', $country='', $from='', $to=''])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

