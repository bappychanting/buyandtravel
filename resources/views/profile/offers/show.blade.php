@extends('layouts.master')

@section('title', $user->name." || View Offer || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Offer</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>View Offer</h2>
                <hr class="my-3">
                <p><i class="fa fa-clock-o fa-sm pr-2"></i><span class="font-weight-bold light-blue-text">{{$offer->created_at->format('l d F Y, h:i A')}}</p>
                {!! Form::open(['route' => ['offers.destroy', $offer->id], 'method'=>'delete']) !!}
                    <a href="{{ route('front.orders.show', $offer->order->id) }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Open Order</a>
                    <a href="{{ route('messages.offer.show', $offer->id) }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-comments fa-sm pr-2"" aria-hidden="true"></i>Offer Conversation</a>
                    <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-indigo btn-sm"><i class="fa fa-edit fa-sm pr-2" aria-hidden="true"></i>Update Offer</a>
                    {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete', array('class' => 'btn btn-warning btn-sm form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Your offer will disappear!', 'confirmButtonText'=>'Yes, delete offer!', 'type'=>'submit')) !!}
                {!! Form::close() !!}
                
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
                    <div class="col-xl-9 col-lg-9 col-md-10 col-sm-8 col-12 my-3">
                      <h5 class="font-weight-bold">{{ $offer->order->product_name }}</h5>
                      <h6 class="my-3 font-weight-bold"><i class="fa fa-user fa-sm pr-2"></i>{{ $offer->order->user->name }}</h6>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Price Expected:</strong> {{ $offer->order->expected_price }}/=</li>
                        <li class="list-group-item"><strong>User Contact:</strong> {{ str_replace('-', '', $offer->order->user->contact) }}</li>
                        <li class="list-group-item"><strong>Handover Location:</strong> {{ $offer->order->delivery_location }}</li>
                      </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

                <h4 class="my-4">Offer Details</h4>

                <ul class="list-group list-group-flush mb-4">
                  <li class="list-group-item"><strong>Product Quantity:</strong> {{ $offer->product_quantity }}/=</li>
                  <li class="list-group-item"><strong>Asking price: </strong> {{ $offer->asking_price }}</li>
                  <li class="list-group-item"><strong>Delivery Date: </strong> {{ date('l d F Y', strtotime($offer->delivery_date)) }}</li>
                </ul>

                <button class="btn btn-primary btn-md mb-4" id="showDetailsButton" type="button" data-toggle="collapse" data-target="#showDetails" aria-expanded="false" aria-controls="showDetails">
                  <i class="fa fa-folder-open fa-sm pr-2"></i>Click Here to Show Details
                </button>
                <div class="collapse" id="showDetails">
                  {!! $offer->additional_details !!}
                </div>
            </div> 
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

