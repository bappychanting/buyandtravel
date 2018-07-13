@extends('layouts.master')

@section('title', "Add Offer || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        Orders
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('buyandtravel') }}">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.orders.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Orders</a></li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.orders.show', $order->id) }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Order</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Add Offer</li>
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Show Order -->
        <div class="col-lg-8">
          <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 my-3">
                    <!--Featured image-->
                    <div class="z-depth-1-half">
                        <img src="{{ file_exists(array_get($order->images()->first(), 'src')) ? asset(array_get($order->images()->first(), 'src')) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ array_get($order->images()->first(), 'alt') }}">
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8 col-12 my-3">
                    <h3 class="font-weight-bold">{{ $order->product_name }}</h3>
                    <h5><i class="fa fa-user fa-sm pr-2"></i>{{ $order->user->name }}</h5>
                    <h6 class="dark-grey-text"><i class="fa fa-map-marker fa-sm pr-2"></i>{{$order->delivery_location}}</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 my-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Price Expected:</strong> {{ $order->expected_price }}/=</li>
                    <li class="list-group-item"><strong>User Contact:</strong> {{ str_replace('-', '', $order->user->contact) }}</li>
                    <li class="list-group-item"><strong>Handover Location:</strong> {{ $order->delivery_location }}</li>
                  </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->

            <hr class="mb-5">

        </div>        
        <!-- #END# Show Order -->

        <!-- Left Menu Column -->
        @include('orders.rightmenu', [$categories, $keyword='', $product_type='', $from='', $to=''])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

