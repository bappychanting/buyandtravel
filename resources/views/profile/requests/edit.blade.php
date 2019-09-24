@extends('layouts.master')

@section('title', $user->name." || Edit Request || ")

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
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('requests.show', $request->id) }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Request</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Edit Request</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
              <h2>Edit Request</h2>
              <p>Last Updated: <span class="font-weight-bold">{{$request->updated_at->format('l d F Y, h:i A')}}</span></p>

              <h5 class="my-4">Travel Schedule Overview</h5>
              <h5 class="mt-0 font-weight-bold dark-grey-text"><a data-toggle="modal" data-target="#userPopup">{{ $request->travel_schedule->user->name }}</a></h5>
              <h6 class="font-weight-bold mt-3">
                <i class="fa fa-plane fa-sm pr-2"></i>{{ $request->travel_schedule->city }}, {{ $request->travel_schedule->country->name }} 
                <i class="fa fa-map-marker fa-sm pr-2"></i><span class="dark-grey-text">{{ $request->travel_schedule->destination }}</span>
              </h6>
              <p class="mb-5">
                <i class="fa fa-calendar-check-o fa-sm pr-2"></i>
                <span class="blue-text">{{ date('l d F Y', strtotime($request->travel_schedule->arrival_date)) }}</span> &#8594; 
                <span class="blue-text">{{ date('l d F Y', strtotime($request->travel_schedule->leave_date)) }}</span>
              </p>


              
              {!! Form::open(['method' => 'put', 'route' => ['requests.update', $request->id]]) !!}

              <div class="demo-masked-input">
                    
                <div class="md-form">
                  {!! Form::text('product_name', $request->product_name, array('class' =>'form-control', 'id'=>'product_name')) !!}
                  {!! Form::label('product_name', 'Product Name') !!}
                </div>

                @if ($errors->has('product_name'))
                    <p class="red-text">{{ $errors->first('product_name') }}</p>
                @endif

                <div class="row mt-4" data-trigger="spinner">
                  <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">  
                    <div class="md-form">
                      {!! Form::text('quantity', $request->quantity, array('class' =>'form-control text-center', 'id'=>'quantity', 'data-ruler'=>'quantity')) !!}
                      {!! Form::label('quantity', 'Product Quantity') !!}
                    </div> 
                  </div>
                  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button class="btn btn-primary btn-sm ml-0" type="button" data-spin="up"><i class="fa fa-sort-asc"></i></button>
                    <button class="btn btn-primary btn-sm" type="button" data-spin="down"><i class="fa fa-sort-desc"></i></button>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                 
                    @if ($errors->has('quantity'))
                        <p class="red-text">{{ $errors->first('quantity') }}</p>
                    @endif
                  </div>

                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('expected_price', $request->expected_price, array('class' =>'form-control', 'id'=>'expected_price')) !!}
                      {!! Form::label('expected_price', 'Expected Price') !!}
                    </div>

                    @if ($errors->has('expected_price'))
                        <p class="red-text">{{ $errors->first('expected_price') }}</p>
                    @endif
                  </div>

                  <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('reference_link', $request->reference_link, array('class' =>'form-control', 'id'=>'reference_link')) !!}
                      {!! Form::label('reference_link', 'Reference Link') !!}
                    </div>

                    @if ($errors->has('reference_link'))
                        <p class="red-text">{{ $errors->first('reference_link') }}</p>
                    @endif
                  </div>
                </div>

                <p class="font-weight-bold my-3">Add Request Details</p>

                @if ($errors->has('additional_details'))
                    <p class="red-text">{{ $errors->first('additional_details') }}</p>
                @endif

                <!-- Material Editor -->
                <div class="md-form">
                    {!! Form::textarea('additional_details', $request->additional_details, array('class'=>'editor')) !!}
                </div>

                <div class="text-center my-4">
                  {!! Form::submit('Add Request', array('class' =>'btn btn-primary')) !!}
                </div>
              </div>

              {!! Form::close() !!}
           
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

