@extends('layouts.master')

@section('title', $user->name." || Orders || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Offers</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>{{ empty($search) ? 'List of ' : 'Search' }} Offers</h2>
                <p>Following are the list of offers {{ empty($search) ? 'you have added' : 'based on your search' }}.</p>
                @if(empty($search))
                    <a class="btn btn-md btn-primary mb-4" href="{{ route('front.orders.index') }}"><i class="fa fa-eye fa-sm pr-2"" aria-hidden="true"></i> View Orders</a>
                @else
                    <a class="btn btn-sm btn-primary" href="{{ route('orders.index') }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh List</a>
                @endif
          
            {!! Form::open(['url' => '/profile/offers', 'method'=>'get']) !!}
              <div class="row mb-5">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <!-- Material input email -->
                  <div class="md-form">
                      {!! Form::text('search', $search, ['class'=>'form-control', 'id'=>'search']) !!}
                      {!! Form::label('search', 'Search Offers') !!}
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="text-center mt-4">
                    {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                  </div>
                </div>
              </div>
            {!! Form::close() !!}
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Asking Price</th>
                          <th>Delivery Location</th>
                          <th>Delivery Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
          @foreach($offers as $offer)
                      <tr>
                          <td>{{ $offer->order->product_name }}</td>
                          <td>{{ $offer->product_quantity }}</td>
                          <td>{{ $offer->asking_price }}/=</td>
                          <th>{{ $offer->order->delivery_location }}</th>
                          <td>{{ date('l d F Y', strtotime($offer->delivery_date)) }}</td>
                          <td>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                      <a class="dropdown-item" href="{{ route('orders.create') }}"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Open Offer</a>
                                      <a class="dropdown-item" href="{{ route('front.orders.show', $offer->order->id) }}"><i class="fa fa-eye fa-sm pr-2"" aria-hidden="true"></i>View Order</a>
                                      <a class="dropdown-item" href="#"><i class="fa fa-edit fa-sm pr-2"" aria-hidden="true"></i>Edit</a>
                                      <a class="dropdown-item" href="#"><i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete</a>
                                  </div>
                              </div>
                          </td>
                      </tr>
          @endforeach   
                  </tbody>
                </table>
            </div>  

            <!--Pagination-->
            <nav aria-label="pagination example">
                <ul class="pagination pg-blue">
                    {{ $offers->appends(Request::only('search'))->links() }}
                </ul>
            </nav>
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

