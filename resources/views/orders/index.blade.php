@extends('layouts.master')

@section('title', "Orders || ")

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
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Order</li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>All Orders</li>
          </ol>
      </div>

      <!-- Content Row -->
      <div class="row">
                <div class="col-lg-8">
            <!--Section: Blog v.3-->
        <section class="py-4">

         @foreach($orders as $order)

            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-5 col-xl-4 mb-4">
                    <!--Featured image-->
                    <div class="z-depth-1-half">
                        <img src="{{ file_exists(array_get($order->images()->first(), 'src')) ? asset(array_get($order->images()->first(), 'src')) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ array_get($order->images()->first(), 'alt') }}">
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                    <h5 class="mb-3 font-weight-bold dark-grey-text">
                        <strong>{{ $order->product_name }}</strong>
                    </h5>
                    <p>Added by
                    <a class="font-weight-bold dark-grey-text" href="view_user.php">{{ $order->user->name }}</a>, {{$order->created_at->format('l d F Y')}}</p>
                    <p><i class="fa fa-truck fa-sm pr-2"></i>{{$order->delivery_location}}</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="view_order.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View Order</a>
                        <a href="add_offer.php" class="btn btn-blue btn-sm"><i class="fa fa-plus fa-sm pr-2" aria-hidden="true"></i>Add Offer</a>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr class="mb-5">
        @endforeach

            
            <!--Pagination-->
            <nav aria-label="pagination example">
                <ul class="pagination pg-blue">
                    {{ $orders->appends(Request::only('search'))->links() }}
                  </ul>
              </nav> 

        </section>
        <!--Section: Blog v.3-->
        </div>

        <!-- Left Menu Column -->
        @include('orders.leftmenu')

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

