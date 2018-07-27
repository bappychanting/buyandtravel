@extends('layouts.master')

@section('title', "View Order || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Order</li>
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Show Order -->
        <div class="col-lg-8" id="printableArea">

          <h3 class="mb-3 font-weight-bold dark-grey-text">
              <strong>{{ $order->product_name }}</strong>
          </h3>
          <h5 class="mb-3"><a data-toggle="modal" data-target="#userPopup"><i class="fa fa-user fa-sm pr-2"></i>{{ $order->user->name }}</a></h5>
          <h6><i class="fa fa-tags fa-sm pr-2"></i><span class="dark-grey-text">{{ $order->product_type->product_type }}</span></h6>
          <hr class="mb-4">
          <p class="mt-4">
            <i class="fa fa-clock-o fa-sm pr-2"></i><span class="font-weight-bold light-blue-text">{{$order->created_at->format('l d F Y, h:i A')}}</span>
          </p>
            <div class="row">
              <div class="col-lg-6 mb-3 mt-3">
                <div class="item" id="aniimated-thumbnials">         
                  <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                    @foreach($order->images as $image)
                      <li data-thumb="{{ asset($image->src) }}"> 
                          <a href="{{ asset($image->src) }}" data-sub-html="{{ $order->product_name.' '.$loop->iteration }}">  
                            <img src="{{ asset($image->src) }}" alt="{{ $image->alt.' '.$loop->iteration }}"/>
                          </a>
                      </li>
                     @endforeach 
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 mb-3 mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Price Expected:</strong> {{ $order->expected_price }}/=</li>
                  <li class="list-group-item"><strong>User Contact:</strong> {{ str_replace('-', '', $order->user->contact) }}</li>
                  <li class="list-group-item"><strong>Handover Location:</strong> {{ $order->delivery_location }}</li>
                </ul>
                <a class="btn btn-md btn-cyan btn-block mb-4" href="{{ route('front.orders.addOffer', $order->id) }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Offer</a>
                <div class="btn-group my-3" role="group" aria-label="Basic example">
                  <a href="{{ $order->reference_link }}" target="_blank" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View Reference</a>
                  <a href="report_order.php" class="btn btn-warning btn-sm"><i class="fa fa-exclamation-triangle fa-sm pr-2" aria-hidden="true"></i>Report</a>
                </div>
              </div>
          </div>
          <p class="mb-3 mt-3">{!! $order->additional_details !!}</p>
          <div class="btn-group mb-4" role="group" aria-label="Basic example">
                <a href="{{ route('front.orders.pdf', $order->id) }}" class="btn btn-light-green btn-sm"><i class="fa fa-file-pdf-o fa-sm pr-2"" aria-hidden="true"></i>Save as PDF</a>
                <button onclick="printDiv('printableArea')" class="btn btn-dark-green btn-sm"><i class="fa fa-print fa-sm pr-2" aria-hidden="true"></i>Print</button>
          </div>

        </div>        
        <!-- #END# Show Order -->

        <!-- Left Menu Column -->
        @include('orders.rightmenu', [$categories, $keyword='', $product_type='', $from='', $to=''])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- View Profile -->
    <div class="modal fade" id="userPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-user fa-sm pr-2"></i>{{ $order->user->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                  <div class="row">
                    <div class="col-lg-6 mb-3">
                      <img class="img-fluid rounded" src="{{ file_exists($order->user->avatar) ? asset($order->user->avatar) : 'http://via.placeholder.com/450?text=No+Profile+Picture+Found' }}" alt="{{ $order->user->name }} Avatar">
                    </div>
                    <div class="col-lg-6 mb-3">
                      <p>
                        <i class="fa fa-envelope prefix grey-text fa-sm pr-2"></i>
                        {{ $order->user->email }}
                      </p>
                      <p>
                        <i class="fa fa-phone prefix grey-text fa-sm pr-2"></i>
                        {{ str_replace('-', '', $order->user->contact) }}
                      </p>
                      <p>
                        <i class="fa fa-address-card prefix grey-text fa-sm pr-2"></i>
                        {{ $order->user->address }}
                      </p>
                      <p>
                        <i class="fa fa-star prefix grey-text fa-sm pr-2"></i>
                        5/10
                      </p>
                      <p>
                        <i class="fa fa-calendar-check-o prefix grey-text fa-sm pr-2"></i>
                        {{ $order->user->created_at->format('d F Y') }}
                      </p>
                    </div>
                    <div class="btn-group mt-4" role="group" aria-label="Basic example">
                      <a href="view_user.php" class="btn btn-blue btn-sm"><i class="fa fa-user fa-sm pr-2" aria-hidden="true"></i>View Profile</a>
                      <a href="view_order.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Follow User</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- View Profile -->

@endsection

