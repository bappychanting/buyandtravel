@extends('layouts.master')

@section('title', $user->name." || View Travel Schdule Details || ")

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
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('travel.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Travel History</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Travel Schdule Details</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
          <div class="col-lg-10">
            <h2>View Travel Schedule Details</h2>
            <h5 class="font-weight-bold"><i class="fa fa-plane fa-sm pr-2"></i>{{ $travel->city }}, {{ $travel->country->name }}</h5>
            <h6><i class="fa fa-map-marker fa-sm pr-2"></i> <span class="dark-grey-text font-weight-bold">{{ $travel->destination }}</span></h6>
            <p>
              <i class="fa fa-calendar-check-o fa-sm pr-2"></i><span class="blue-text">{{ date('l d F Y', strtotime($travel->arrival_date)) }}</span> &#8594; <span class="blue-text">{{ date('l d F Y', strtotime($travel->leave_date)) }}</span>
            </p>
            <hr class="mb-4">
            <p>
              <i class="fa fa-clock-o fa-sm pr-2"></i>
              <span class="font-weight-bold light-blue-text">{{$travel->created_at->format('l d F Y, h:i A')}}</span>
            </p>
            {!! Form::open(['route' => ['travel.destroy', $travel->id], 'method'=>'delete']) !!}
                <a href="{{ route('travel.edit', $travel->id) }}" class="btn btn-indigo btn-sm"><i class="fa fa-edit fa-sm pr-2"" aria-hidden="true"></i>Update Schedule</a>
                {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete</a>', array('class' => 'btn btn-unique btn-sm form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Your travel schedule will disapper from history!', 'confirmButtonText'=>'Yes, delete travel schedule!', 'type'=>'submit')) !!}
            {!! Form::close() !!}

            <button class="btn btn-primary btn-md my-4" id="showDetailsButton" type="button" data-toggle="collapse" data-target="#showDetails" aria-expanded="false" aria-controls="showDetails">
              <i class="fa fa-folder-open fa-sm pr-2"></i>Click Here to Show Details
            </button>
            <div class="collapse" id="showDetails">
                {!! $travel->additional_details !!}
            </div>
            <p class="my-4">
              @if( !empty($travel->tags) )
                @php $tags = explode(',', $travel->tags); @endphp
                @foreach($tags as $tag) <div class="chip blue lighten-1 white-text">{{ $tag }}</div> @endforeach
              @endif
            </p>
            <p class="grey-text">Views: {{ $travel->views }}</p>


            <!-- Requests -->
            <h4>Requests</h4><hr>
            <div class="table-responsive my-5">
                <table class="table table-striped table-fixed" id="dataTable">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>
                          <i class="fa fa-cart-plus fa-sm pr-2"></i>Product Name
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th>
                          <i class="fa fa-user fa-sm pr-2"></i>Added By
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th>
                          <i class="fa fa-cart-plus fa-sm pr-2"></i>Quantity
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th>
                          <i class="fa fa-dollar fa-sm pr-2"></i>Expected Price
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th>
                          <i class="fa fa-info fa-sm pr-2"></i>Status
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th>
                          <i class="fa fa-gears fa-sm pr-2"></i>Actions
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($travel->requests as $request)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $request->product_name }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->quantity }}</td>
                        <td>{{ $request->expected_price }}/=</td>
                        <td>
                          {!! empty($request->accepted) ? '<p class="red-text font-weight-bold">Not accepted!</p>' : '<p class="font-weight-bold"><span class="green-text">Accepted: </span>'.date('l, d F Y', strtotime($request->accepted)).'</p>' !!}
                          {{ empty($request->recieved) ? '' : 'Delivered '.date('l d F Y', strtotime($request->recieved)) }}
                        </td>
                        <td>
                            <div class="dropdown" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                  <button class="dropdown-item view_request_details_button" data-request="{{ $request->id }}" data-travel="{{ $travel->id }}" data-toggle="modal" data-target="#viewRequestDetails">
                                    <i class="fa fa-eye fa-sm pr-2" aria-hidden="true"></i>View Details
                                  </button>
                                  <a class="dropdown-item" href="{{ route('messages.show', $request->message_subject_id) }}" target="_blank"><i class="fa fa-comments fa-sm pr-2" aria-hidden="true"></i>Request Conversation</a>
                                  @if(!empty($request->accepted))
                                    {!! Form::open(['route' => ['travel.request.remove', $travel->id], 'method'=>'put']) !!}
                                    {!! Form::hidden('request_id', $request->id) !!}
                                      {!! Form::button('<i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>Remove Accepted Request', array('class' => 'dropdown-item form_warning_sweet_alert', 'title'=>'Are you sure to remove this accepted request?', 'text'=>'Make sure you have informed the user who made the request!', 'confirmButtonText'=>'Yes, remove accepted request!', 'type'=>'submit')) !!}
                                    {!! Form::close() !!} 
                                  @else
                                    {!! Form::open(['route' => ['travel.request.accept', $travel->id], 'method'=>'put']) !!}
                                    {!! Form::hidden('request_id', $request->id) !!}
                                      {!! Form::button('<i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>Accept Request', array('class' => 'dropdown-item form_warning_sweet_alert', 'title'=>'Are you sure to accept this request?', 'text'=>'Make sure you have read the request details thoroughly and confirmed the deal with the user!', 'confirmButtonText'=>'Yes, accept request!', 'type'=>'submit')) !!}
                                    {!! Form::close() !!} 
                                  @endif
                                </div>
                            </div>
                        </td>
                      </tr>
                    @endforeach   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th><i class="fa fa-cart-plus fa-sm pr-2"></i>Product Name</th>
                      <th><i class="fa fa-user fa-sm pr-2"></i>Added By</th>
                      <th><i class="fa fa-cart-plus fa-sm pr-2"></i>Quantity</th>
                      <th><i class="fa fa-dollar fa-sm pr-2"></i>Expected Price</th>
                      <th><i class="fa fa-info fa-sm pr-2"></i>Status</th>
                      <th><i class="fa fa-gears fa-sm pr-2"></i>Actions</th>
                    </tr>
                  </tfoot>
                </table>
            </div> 
           <!-- #END# Requests -->
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- Product Request Details Modal -->
    <div class="modal fade" id="viewRequestDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100" id="viewDetailsTitle">View Request Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="modal_request_details"></div>
          </div>
          <div class="modal-footer">
            {!! Form::open(['route' => ['travel.request.accept', $travel->id], 'method'=>'put']) !!}
              {!! Form::hidden('request_id', '', ['id'=>'modal_request_id']) !!}
              {!! Form::button('<i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>Accept Request', array('class' => 'btn btn-indigo btn-sm form_warning_sweet_alert', 'id'=>'modal_accept_request_btn', 'title'=>'Are you sure to accept this request?', 'text'=>'Make sure you have read the request details thoroughly and confirmed the deal with the user!', 'confirmButtonText'=>'Yes, accept request!', 'type'=>'submit', 'disabled'=>'true')) !!}
              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <!-- Product Request Details Modal -->

@endsection

