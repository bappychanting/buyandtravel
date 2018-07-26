@extends('layouts.master')

@section('title', $user->name." || Conversation || ")

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
				<li class="breadcrumb-item"><a class="white-text" href="{{ route('messages.all') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Messages</a></li>
				<li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Offer Conversation</li>
			</ol>
		</div>

        <!-- Content Row -->
        <div class="row">
          	<!-- Sidebar Column -->
          	@include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>Offer Conversation</h2>
                
                <h5 class="my-3 font-weight-bold">Overview</h5>
                <!--Grid row-->
                <div class="row mb-3">
                    <!--Grid column-->
                    <div class="col-xl-6 col-lg-6">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <i class="fa fa-user fa-sm pr-2"></i>
                          <strong>Order Added By:</strong> {{ $offer->order->user->name }}
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-shopping-cart fa-sm pr-2"></i>
                          <strong>Product Name:</strong> {{ $offer->order->product_name }}
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-dollar fa-sm pr-2"></i>
                          <strong>Price Expected:</strong> {{ $offer->order->expected_price }}/=
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-map-marker fa-sm pr-2"></i>
                          <strong>Handover Location:</strong> {{ $offer->order->delivery_location }}
                        </li>
                      </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-xl-6 col-lg-6">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <i class="fa fa-user fa-sm pr-2"></i>
                          <strong>Offer Added By:</strong> 
                          {{ $offer->user->name }}
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-cart-plus fa-sm pr-2"></i>
                          <strong>Quantity:</strong> 
                          {{ str_replace('-', '', $offer->product_quantity) }}
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-dollar fa-sm pr-2"></i>
                          <strong>Asking Price:</strong> 
                          {{ $offer->asking_price }}/=
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-calendar-check-o fa-sm pr-2"></i>
                          <strong>Delivery Date:</strong> 
                          {{ date('l d F Y', strtotime($offer->delivery_date)) }}
                        </li>
                      </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

                @if($user->id == $offer->user->id)
                  <a class="btn btn-blue btn-sm" href="{{ route('offers.show', $offer->id) }}"><i class="fa fa-external-link fa-sm pr-2" aria-hidden="true"></i>Open Offer Details</a>
                @else
                    @if(empty($offer->accepted))
                      {!! Form::open(['route' => ['order.offer.accept'], 'method'=>'post']) !!}
                        {!! Form::hidden('offer_id', $offer->id) !!}
                        {!! Form::hidden('order_id', $offer->order->id) !!}
                        <a class="btn btn-blue btn-sm" href="{{ route('orders.show', $offer->order->id) }}" target="_blank">
                          <i class="fa fa-external-link fa-sm pr-2" aria-hidden="true"></i>Open Order
                        </a>
                        {!! Form::button('<i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>Accept Offer', array('class' => 'btn btn-success btn-sm form_warning_sweet_alert', 'title'=>'Are you sure to accept this offer?', 'text'=>'Rest of the offers will disappear and updating or deleting the order will be disabled! Make sure you have read the offer thoroughly and confirmed the deal with the offerer!', 'confirmButtonText'=>'Yes, accept offer!', 'type'=>'submit')) !!}
                      {!! Form::close() !!} 
                    @else
                      {!! Form::open(['route' => ['order.offer.remove', $offer->accepted->id], 'method'=>'delete']) !!}
                        <a class="btn btn-blue btn-sm" href="{{ route('orders.show', $offer->order->id) }}" target="_blank">
                          <i class="fa fa-external-link fa-sm pr-2" aria-hidden="true"></i>Open Order
                        </a>
                        {!! Form::button('<i class="fa fa-close fa-sm pr-2"" aria-hidden="true"></i>Reject Accpeted Offer', array('class' => 'btn btn-warning btn-sm form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Once accepted offer is removed other offers will resurface and the order will reappear in the front page list!', 'confirmButtonText'=>'Yes, remove accepted offer!', 'type'=>'submit')) !!}
                      {!! Form::close() !!}
                    @endif
                @endif

                <h4 class="my-3 font-weight-bold">Messages</h4>

                <!-- Pagination -->
                <nav aria-label="pagination example">
                  <ul class="pagination pg-blue">
                    <!--Arrow left-->
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item active">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                  </ul>
                </nav> 
                <!-- End Pagination -->
                <div class="row">
                  <!-- <span class="border border-primary"></span>
                  <span class="border border-secondary"></span>
                  <span class="border border-success"></span>
                  <span class="border border-danger"></span>
                  <span class="border border-warning"></span>
                  <span class="border border-info"></span>
                  <span class="border border-light"></span>
                  <span class="border border-dark"></span> -->
                  <div class="col-lg-1 mb-5">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle z-depth-0">
                  </div>
                  <div class="col-lg-11 mb-5">
                    <div class="card">
                      <div class="card-body grey white-text">
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? 
                      </div>
                    </div> 
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-1 mb-5">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="img-fluid rounded-circle z-depth-0">
                  </div>
                  <div class="col-lg-11 mb-5">
                    <div class="card">
                      <div class="card-body blue white-text">
                        Eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas? 
                      </div>
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1 mb-5">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle z-depth-0">
                  </div>
                  <div class="col-lg-11 mb-5">
                    <div class="card">
                      <div class="card-body grey white-text">
                        Quis autem vel eum iure reprehenderit ...
                      </div>
                    </div> 
                  </div>
                </div>

                {!! Form::open(['method' => 'post', 'route' => ['orders.store']]) !!}

                  {!! Form::hidden('user_id', $user->id) !!}

                  <p class="font-weight-bold my-3">Add Message</p>

                  @if ($errors->has('message_body'))
                      <p class="red-text">{{ $errors->first('message_body') }}</p>
                  @endif

                  <!-- Material Editor -->
                  <div class="md-form">
                      {!! Form::textarea('message_body', null, array('class'=>'editor')) !!}
                  </div>

                  <div class="text-center my-4">
                    {!! Form::submit('Add', array('class' =>'btn btn-primary')) !!}
                  </div>

                {!! Form::close() !!}
           
          	</div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

