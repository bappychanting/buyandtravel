@extends('layouts.master')

@section('title', $user->name." || Offers || ")

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
                    <a class="btn btn-md btn-primary mb-4" href="{{ route('offers.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Offer</a>
                @else
                    <a class="btn btn-sm btn-primary" href="{{ route('offers.index') }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh List</a>
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

            <!-- Nav tabs -->
            <div class="tabs-wrapper"> 
                <ul class="nav classic-tabs tabs-blue" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="#allOffers" role="tab">Added Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('offers.accepted') }}">Approved Offers</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panels -->
            <div class="tab-content card">
              <!--Panel 1-->
              <div class="tab-pane fade in show active" id="allOffers" role="tabpanel">
                <div class="table-responsive">
                  <table class="table table-fixed">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th><i class="fa fa-shopping-bag fa-sm pr-2"></i>Product Name</th>
                              <th><i class="fa fa-user fa-sm pr-2"></i>User</th>
                              <th><i class="fa fa-clock-o fa-sm pr-2"></i>Create Date</th>
                              <th><i class="fa fa-gears fa-sm pr-2"></i>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
              @foreach($offers as $offer)
                          <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $offer->order->product_name }}</td>
                              <td>{{ $offer->order->user->name }}</td>
                              <td>{{ $offer->created_at->format('l d F Y, h:i A') }}</td>
                              <td>
                                  <div class="dropdown" role="group">
                                      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Actions
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('offers.show', $offer->id) }}"><i class="fa fa-eye fa-sm pr-2" aria-hidden="true"></i>View Offer</a>
                                        <a class="dropdown-item" href="{{ route('front.orders.show', $offer->order->id) }}"><i class="fa fa-external-link fa-sm pr-2" aria-hidden="true"></i>Open Order</a>
                                        {!! Form::open(['route' => ['offers.destroy', $offer->id], 'method'=>'delete']) !!}
                                        {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete', array('class' => 'dropdown-item form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Your offer will disappear!', 'confirmButtonText'=>'Yes, delete offer!', 'type'=>'submit')) !!}
                                        {!! Form::close() !!}
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
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

