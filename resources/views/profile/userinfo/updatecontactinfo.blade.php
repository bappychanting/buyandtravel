@extends('layouts.master')

@section('title', $user->name." || Profile || ")

@section('content')

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        User Content
      </h1>

      <div class="bc-icons">
          <ol class="breadcrumb blue-gradient">
              <li class="breadcrumb-item"><a class="white-text" href="index.php">Home</a></li>
              <li class="breadcrumb-item"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>User Content</li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Profile</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>{{ $user->name }}</h2>

            <!-- Nav tabs -->
            <div class="tabs-wrapper"> 
                <ul class="nav classic-tabs tabs-blue" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('profile.userinfo') }}">User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('profile.edituserinfo') }}">Update User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="editcontactinfo" role="tab">Update Contact Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" href="{{ route('profile.editpassword') }}">Update Password</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panels -->
            <div class="tab-content card">

                <!--Panel 3-->
                <div class="tab-pane fade in show active" id="editcontactinfo" role="tabpanel">

                  <h4>Update Contact Information</h4><hr>

                  {!! Form::open(['method' => 'put', 'route' => ['update.updatecontactinfo', $user->id]]) !!}

                                        
                    <div class="demo-masked-input">

                    <!-- Material input email -->
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {!! Form::text('email', $user->email, array('class' =>'form-control email', 'placeholder'=>'Your email')) !!}
                    </div>

                    @if ($errors->has('email'))
                        <p class="red-text">{{ $errors->first('email') }}</p>
                    @endif

                    <!-- Material input contact -->
                    <div class="md-form">
                        <i class="fa fa-phone prefix grey-text"></i>
                        {!! Form::text('contact', $user->contact, array('class' =>'form-control mobile-phone-number', 'placeholder'=>'Your contact')) !!}
                    </div>

                    @if ($errors->has('contact'))
                        <p class="red-text">{{ $errors->first('contact') }}</p>
                    @endif

                    <!-- Material input address -->
                    <div class="md-form">
                        <i class="fa fa-address-card-o prefix grey-text"></i>
                        {!! Form::textarea('address', $user->address, array('class'=>'md-textarea form-control no-resize auto-growth', 'rows'=>'1', 'id'=>'address')) !!}
                        {!! Form::label('address', 'Your Address') !!}
                    </div>

                    @if ($errors->has('address'))
                        <p class="red-text">{{ $errors->first('address') }}</p>
                    @endif


                    <div class="text-center mt-4">
                        {!! Form::submit('Update Contact Information', array('class' =>'btn btn-primary')) !!}
                    </div>

                  </div>
                {!! Form::close() !!}

                </div>
                <!--/.Panel 3-->
            </div>
          </div>
        </div>
        <!-- /.row -->

    </div>

@endsection

