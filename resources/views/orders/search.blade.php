@extends('layouts.master')

@section('title', "Search Orders || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Search Orders</li>
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
                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-2 col-6 mb-4">
                    <!--Featured image-->
                    <div class="z-depth-1-half">
                        <img src="{{ file_exists(array_get($order->images()->first(), 'src')) ? asset(array_get($order->images()->first(), 'src')) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ array_get($order->images()->first(), 'alt') }}">
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-4 col-lg-8 col-md-4 col-sm-6 col-6 mb-4">
                    <h5 class="mb-3 font-weight-bold dark-grey-text">
                        <strong>{{ $order->product_name }}</strong>
                    </h5>
                    <p>Added by <a class="font-weight-bold dark-grey-text" href="view_user.php">{{ $order->user->name }}</a></p>
                    <p class="font-weight-bold light-blue-text"><i class="fa fa-clock-o  fa-sm pr-2"></i>{{$order->created_at->format('l d F Y')}}</p>
                    <p><i class="fa fa-map-marker fa-sm pr-2"></i>{{$order->delivery_location}}</p>
                </div>
                <!--Grid column-->

                 <!--Grid column-->
                <div class="col-xl-5 col-lg-12 col-md-5 col-sm-4 col-12 mb-4">
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
                  {{ $orders->appends(request()->input())->links() }}
                </ul>
            </nav> 

          </section>
        <!--Section: Blog v.3-->
        </div>

        <!-- Left Menu Column -->
        @include('rightmenu.leftmenu', [$keyword, $categories, $from, $to, $category])

      </div>
      <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

