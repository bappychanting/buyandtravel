@extends('layouts.master')

@section('title', $user->name." || Edit Offer || ")

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
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('offers.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Offers</a></li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('offers.show', $offer->id) }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Offer</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Edit Offer</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
              <h2>Edit Offer</h2>
              <p>Last Updated: <span class="font-weight-bold">{{$offer->updated_at->format('l d F Y, h:i A')}}</span></p>

              <h4 class="mt-4">Order Overview</h4>
                <!--Grid row-->
                <div class="row mb-5">
                    <!--Grid column-->
                    <div class="col-xl-3 col-lg-3 col-md-2 col-sm-4 col-12 my-3">
                        <!--Featured image-->
                        <div class="z-depth-1-half">
                            <img src="{{ file_exists(array_get($offer->order->images()->first(), 'src')) ? asset(array_get($offer->order->images()->first(), 'src')) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ array_get($offer->order->images()->first(), 'alt') }}">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-xl-4 col-lg-9 col-md-10 col-sm-8 col-12 my-3">
                        <h3 class="font-weight-bold">{{ $offer->order->product_name }}</h3>
                        <h5><i class="fa fa-user fa-sm pr-2"></i>{{ $offer->order->user->name }}</h5>
                        <h6 class="dark-grey-text"><i class="fa fa-map-marker fa-sm pr-2"></i>{{$offer->order->delivery_location}}</h6>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 my-3">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Price Expected:</strong> {{ $offer->order->expected_price }}/=</li>
                        <li class="list-group-item"><strong>User Contact:</strong> {{ str_replace('-', '', $offer->order->user->contact) }}</li>
                        <li class="list-group-item"><strong>Handover Location:</strong> {{ $offer->order->delivery_location }}</li>
                      </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

              {!! Form::open(['method' => 'put', 'route' => ['offers.update', $offer->id]]) !!}

              <div class="demo-masked-input">

                <div class="row" data-trigger="spinner">
                  <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">  
                    <div class="md-form">
                      {!! Form::text('product_quantity', $offer->product_quantity, array('class' =>'form-control text-center', 'id'=>'expected_price', 'data-ruler'=>'quantity')) !!}
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

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('asking_price', $offer->asking_price, array('class' =>'form-control', 'id'=>'asking_price')) !!}
                      {!! Form::label('asking_price', 'Asking Price') !!}
                    </div>

                    @if ($errors->has('asking_price'))
                        <p class="red-text">{{ $errors->first('asking_price') }}</p>
                    @endif
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('delivery_date', date('l d F Y', strtotime($offer->delivery_date)), array('class' =>'form-control datepicker', 'id'=>'delivery_date')) !!}
                      {!! Form::label('delivery_date', 'Delivery Date') !!}
                    </div>

                    @if ($errors->has('delivery_date'))
                        <p class="red-text">{{ $errors->first('delivery_date') }}</p>
                    @endif
                  </div>
                </div>

                <p class="font-weight-bold my-3">Add Offer Details</p>

                @if ($errors->has('additional_details'))
                    <p class="red-text">{{ $errors->first('additional_details') }}</p>
                @endif

                <!-- Material Editor -->
                <div class="md-form">
                    {!! Form::textarea('additional_details', $offer->additional_details, array('class'=>'editor')) !!}
                </div>

                <div class="text-center my-4">
                  {!! Form::submit('Update Offer', array('class' =>'btn btn-primary')) !!}
                </div>
              </div>

              {!! Form::close() !!}
            </div> 
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

