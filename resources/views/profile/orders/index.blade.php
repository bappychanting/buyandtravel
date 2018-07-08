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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>{{ empty($search) ? 'List of ' : 'Search' }} Orders</h2>
                <p>Following are the list of orders {{ empty($search) ? 'you have added' : 'based on your search' }}.</p>
                @if(empty($search))
                    <a class="btn btn-md btn-primary mb-4" href="{{ route('orders.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Order</a>
                @else
                    <a class="btn btn-sm btn-primary" href="{{ route('orders.index') }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh List</a>
                @endif
          
            {!! Form::open(['url' => '/profile/orders', 'method'=>'get']) !!}
              <div class="row mb-5">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <!-- Material input email -->
                  <div class="md-form">
                      {!! Form::text('search', $search, ['class'=>'form-control', 'id'=>'search']) !!}
                      {!! Form::label('search', 'Search Orders') !!}
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="text-center mt-4">
                    {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                  </div>
                </div>
              </div>
            {!! Form::close() !!}

            @foreach($orders as $order)
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 mb-4">
                      <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid rounded" alt="First sample image" width="100" length="100">
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                        <h5 class="mb-3 font-weight-bold">
                            <strong>{{ $order->product_name }}</strong>
                            <small class="dark-grey-text">{{ $order->product_type->product_type }}</small>
                        </h5>
                        <p><i class="fa fa-clock-o"></i> <span class="font-weight-bold blue-text">{{$order->created_at->format('l d F Y')}}</span></p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        {!! Form::open(['route' => ['orders.destroy', $order->id], 'method'=>'delete']) !!}
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View More</a>
                          {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete</a>', array('class' => 'btn btn-blue btn-sm form_delete_sweet_alert', 'type'=>'submit')) !!}
                        {!! Form::close() !!}
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
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

