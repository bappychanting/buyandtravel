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
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i><a href="{{ route('orders.index') }}" class="white-text">Orders</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Add Order</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
                    <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>Add Order</h2>
            <p class="font-weight-bold">Please Input Following Details</p>
              
              {!! Form::open(['method' => 'post', 'route' => ['travel.create']]) !!}

              <div class="demo-masked-input">

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::text('product_name', null, array('class' =>'form-control', 'id'=>'product_name')) !!}
                  {!! Form::label('product_name', 'Product Title') !!}
                </div>
                <!-- Material input text -->

                <!-- Material input text -->
                <div class="md-form"> 
                  <select name="country_id" class="mdb-select colorful-select dropdown-primary" searchable="Search here..">
                    <option value="" disabled selected>Select Product Category</option>
                    <option>Hot Dog, Fries and a Soda</option>
                    <option>Burger, Shake and a Smile</option>
                    <option>Sugar, Spice and all things nice</option>
                  </select> 
                </div>

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::text('expected_price', null, array('class' =>'form-control', 'id'=>'expected_price')) !!}
                  {!! Form::label('expected_price', 'Expected Product Price') !!}
                </div>

                <!-- Material input text -->
                <div class="md-form">
                  {!! Form::text('reference_link', null, array('class' =>'form-control', 'id'=>'reference_link')) !!}
                  {!! Form::label('reference_link', 'Reference Link') !!}
                </div>

                <div class="md-form">
                  {!! Form::text('delivery_location', null, array('class' =>'form-control', 'id'=>'delivery_location')) !!}
                  {!! Form::label('delivery_location', 'Product Delivery Location') !!}
                </div>

                <!-- Material input text -->
                <p class="font-weight-bold my-3">Add Tags</p>
                  {!! Form::text('tags', null, array('placeholder'=>'Seperate tags with commas', 'data-role' =>'tagsinput')) !!}
                <hr>

                @if ($errors->has('tags'))
                    <p class="red-text">{{ $errors->first('tags') }}</p>
                @endif

                <p class="font-weight-bold my-3">Add Details to Order</p>
                <!-- Material Editor -->
                <div class="md-form">
                    {!! Form::textarea('additional_details', null, array('class'=>'editor')) !!}
                </div>

                <div class="text-center my-4">
                    <a class="btn btn-primary" href="user_order_details.php">Submit</a>
                </div>
              </div>

              {!! Form::close() !!}
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

