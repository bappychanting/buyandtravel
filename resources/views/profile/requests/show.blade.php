@extends('layouts.master')

@section('title', $user->name." || View Request || ")

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
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('requests.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Requests</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Request</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
              <h2>View Request</h2>
              <hr class="my-3">
              <p><i class="fa fa-clock-o fa-sm pr-2"></i><span class="font-weight-bold light-blue-text">{{$request->created_at->format('l d F Y, h:i A')}}</p>
              {!! Form::open(['route' => ['requests.destroy', $request->id], 'method'=>'delete']) !!}
                  <a href="{{ route('front.travel.show', $request->travel_schedule->id) }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Open Travel Schedule</a>
                  <a href="{{ route('messages.show', $request->message_subject_id) }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-comments fa-sm pr-2"" aria-hidden="true"></i>Request Conversation</a>
                  <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-indigo btn-sm"><i class="fa fa-edit fa-sm pr-2" aria-hidden="true"></i>Update Request</a>
                  {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete', array('class' => 'btn btn-unique btn-sm form_warning_sweet_alert', 'title'=>'Are you sure?', 'text'=>'Your request will disappear!', 'confirmButtonText'=>'Yes, delete request!', 'type'=>'submit')) !!}
              {!! Form::close() !!}

              <h5 class="my-4">Travel Schedule Overview</h5>
              <h5 class="mt-0 font-weight-bold dark-grey-text"><a data-toggle="modal" data-target="#userPopup">{{ $request->travel_schedule->user->name }}</a></h5>
              <h6 class="font-weight-bold mt-3">
                <i class="fa fa-plane fa-sm pr-2"></i>{{ $request->travel_schedule->city }}, {{ $request->travel_schedule->country->name }} 
                <i class="fa fa-map-marker fa-sm pr-2"></i><span class="dark-grey-text">{{ $request->travel_schedule->destination }}</span>
              </h6>
              <p class="mt-3">
                <i class="fa fa-calendar-check-o fa-sm pr-2"></i>
                <span class="blue-text">{{ date('l d F Y', strtotime($request->travel_schedule->arrival_date)) }}</span> &#8594; 
                <span class="blue-text">{{ date('l d F Y', strtotime($request->travel_schedule->leave_date)) }}</span>
              </p>
              <hr class="my-3">

              <h4 class="mb-4">Request Details</h4>

              <div class="row">
                  <!--Grid column-->
                  <div class="col-xl-4 col-lg-4 col-md-3 col-sm-6 col-12">
                      <!--Featured image-->
                      <div class="z-depth-1-half" id="aniimated-thumbnials">
                        <a href="{{ file_exists($request->image) ? asset($request->image) : 'http://via.placeholder.com/450?text=Product+Image' }}" data-sub-html="{{ $user->name }} Profile Picture"> 
                          <img src="{{ file_exists($request->image) ? asset($request->image) : 'http://via.placeholder.com/450?text=Product+Image' }}" class="img-fluid rounded" alt="{{ $request->image }} Request Image">
                        </a>
                      </div>
                      @if ($errors->has('image'))
                          <p class="red-text mt-4">{{ $errors->first('image') }}</p>
                      @endif
                      @if (empty($request->accepted))
                      <button class="btn blue-gradient btn-sm mt-4" data-toggle="modal" data-target="#updateimage">
                        <i class="fa fa-cloud-upload fa-sm pr-2" aria-hidden="true"></i>Upload An Image
                      </button>
                      @endif
                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-xl-8 col-lg-8 col-md-9 col-sm-6 col-12">
                    <h5 class="font-weight-bold">{{ $request->product_name }}</h5>
                    <p><strong>Product Quantity:</strong> {{ $request->quantity }}/=</p>
                    <p><strong>Expected Price:</strong> {{ $request->expected_price }}/=</p>
                    <p><a href="{{ $request->reference_link }}" target="_blank" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View Reference</a></p>
                  </div>
                  <!--Grid column-->
              </div>

              <button class="btn btn-primary btn-md my-4" id="showDetailsButton" type="button" data-toggle="collapse" data-target="#showDetails" aria-expanded="false" aria-controls="showDetails">
                <i class="fa fa-folder-open fa-sm pr-2"></i>Click Here to Show Details
              </button>
              <div class="collapse" id="showDetails">
                {!! $request->additional_details !!}
              </div>
           
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- Image Modal -->
    <div class="modal fade" id="updateimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Request Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body image_modal">
                  <div class="text-center">
                    <img src="http://placehold.it/200" class="img-fluid z-depth-1 preview_input" alt="Responsive image">
                    <p class="text-center mt-4">Maximum Allowed Size: 500 KB</p>
                  </div>
                    {!! Form::open(['class'=>'md-form upload_image', 'method' => 'put', 'route' => ['requests.image.update', $request->id], 'enctype' => 'multipart/form-data']) !!}
                      {!! Form::hidden('id', $request->id) !!}
                      <div class="file-field">
                          <div class="btn btn-primary btn-sm float-left">
                              <span>Select</span>
                              {!! Form::file("image", ['class'=>'input_image']) !!}
                          </div>
                          <div class="file-path-wrapper">
                              {!! Form::text('', null, ['class'=>'file-path validate', 'placeholder'=>'Choose your file']) !!}
                          </div>
                      </div>
                      <div class="text-center mt-4">
                          {{ Form::button('Upload Image <i class="fa fa-upload ml-1"></i>', ['type' => 'submit', 'class' => 'btn primary-color-dark mt-1 btn-md'] ) }}
                      </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Image Modal -->

@endsection

