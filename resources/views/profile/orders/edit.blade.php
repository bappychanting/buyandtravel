@extends('layouts.master')

@section('title', $user->name." || Edit Order Details || ")

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
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i><a href="{{ route('orders.index') }}" class="white-text">Orders</a></li>
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('orders.show', $order->id) }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Order Details</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Edit Order Details</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
                    <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>Edit Order</h2>
            <p>Last Updated: <span class="font-weight-bold">{{$order->updated_at->format('l d F Y, h:i A')}}</span></p>
              
              {!! Form::open(['method' => 'put', 'route' => ['orders.update', $order->id]]) !!}

              <div class="demo-masked-input">

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::text('product_name', $order->product_name, array('class' =>'form-control', 'id'=>'product_name')) !!}
                  {!! Form::label('product_name', 'Product Title') !!}
                </div>

                <!-- Material input text -->
                <div class="md-form"> 
                  {!! Form::select('product_type_id', $categories, $order->product_type->id, array('class' =>'mdb-select colorful-select dropdown-primary', 'searchable'=>'Search here..')) !!}
                </div>

                @if ($errors->has('product_type_id'))
                    <p class="red-text">{{ $errors->first('product_type_id') }}</p>
                @endif

                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('expected_price', $order->expected_price, array('class' =>'form-control', 'id'=>'expected_price')) !!}
                      {!! Form::label('expected_price', 'Expected Product Price') !!}
                    </div>

                    @if ($errors->has('expected_price'))
                        <p class="red-text">{{ $errors->first('expected_price') }}</p>
                    @endif
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <!-- Material input text -->
                    <div class="md-form">
                      {!! Form::text('reference_link', $order->reference_link, array('class' =>'form-control', 'id'=>'reference_link')) !!}
                      {!! Form::label('reference_link', 'Reference Link') !!}
                    </div>

                    @if ($errors->has('reference_link'))
                        <p class="red-text">{{ $errors->first('reference_link') }}</p>
                    @endif
                  </div>
                </div>

                <div class="md-form">
                  {!! Form::text('delivery_location', $order->delivery_location, array('class' =>'form-control', 'id'=>'delivery_location')) !!}
                  {!! Form::label('delivery_location', 'Product Delivery Location') !!}
                </div>

                @if ($errors->has('delivery_location'))
                    <p class="red-text">{{ $errors->first('delivery_location') }}</p>
                @endif

                <!-- Material input text -->
                <p class="font-weight-bold my-3">Add Tags</p>
                  {!! Form::text('tags', $order->tags, array('placeholder'=>'Seperate tags with commas', 'data-role' =>'tagsinput')) !!}
                <hr>

                @if ($errors->has('tags'))
                    <p class="red-text">{{ $errors->first('tags') }}</p>
                @endif

                <p class="font-weight-bold my-3">Add Details to Order</p>

                @if ($errors->has('additional_details'))
                    <p class="red-text">{{ $errors->first('additional_details') }}</p>
                @endif

                <!-- Material Editor -->
                <div class="md-form">
                    {!! Form::textarea('additional_details', $order->additional_details, array('class'=>'editor')) !!}
                </div>

                <div class="text-center my-4">
                  {!! Form::submit('Update Order', array('class' =>'btn btn-primary')) !!}
                </div>
              </div>

              {!! Form::close() !!}
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

