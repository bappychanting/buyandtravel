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
            <h2 class="animated bounceInRight">{{ $user->name }}</h2>

            <!-- Nav tabs -->
            <div class="tabs-wrapper"> 
                <ul class="nav classic-tabs tabs-blue" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab">Update User Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel53" role="tab">Update Contact Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel54" role="tab">Update Password</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panels -->
            <div class="tab-content card">

                <!--Panel 1-->
                <div class="tab-pane fade in show active" id="panel51" role="tabpanel">
                    <div class="row">
                      <div class="col-lg-6 mb-4">
                        <div class="view overlay z-depth-1-half">
                            <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid rounded" alt="First sample image">
                            <a>
                                <div class="mask"></div>
                            </a>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-4">                            
                          <h4>User Information</h4><hr>

                          <p>
                            <i class="fa fa-user prefix grey-text"></i>
                            {{ $user->username }}
                          </p>
                    
                          <p>
                              <i class="fa fa-birthday-cake grey-text"></i>
                              @if(empty($user->dob))
                                <span class="red-text">{{ 'Not updated yet' }}</span> 
                              @else
                                {{$user->dob->format('d-M-Y')}}
                              @endif  
                            </p>

                            <p>
                              <i class="fa fa-venus-mars prefix grey-text"></i>
                              @if($user->gender == 1)
                                {{ 'Male' }}
                              @elseif($user->gender == 2)
                                {{ 'Female' }}
                              @else
                                <span class="red-text">{{ 'Not updated yet' }}</span> 
                              @endif  
                            </p>

                        <div class="btn-group mt-4" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#modalLoginForm">
                              <i class="fa fa-plus fa-sm pr-2" aria-hidden="true"></i>Update Profile Picture
                            </a>
                            <a href="#" class="btn btn-blue btn-sm">
                              @if($user->verified == 1)
                                <i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>
                                Profile verified
                              @else
                                <i class="fa fa-warning fa-sm pr-2" aria-hidden="true"></i>
                                Profile not yet verified
                              @endif
                            </a>
                        </div>
                      </div>
                    </div>
                    
                    <h4>Contact Information</h4><hr>
                      <p>
                        <i class="fa fa-envelope prefix grey-text"></i>
                        {{ $user->email }}
                      </p>

                      <p>
                        <i class="fa fa-phone prefix grey-text"></i>
                        {{ str_replace('-', '', $user->contact) }}
                      </p>
                      <p>
                        <i class="fa fa-address-card prefix grey-text"></i>
                        {!! empty($user->adress) ? '<span class="red-text">Not updated yet</span>' : $user->adress !!}
                      </p>
                </div>
                <!--/.Panel 1-->

                <!--Panel 2-->
                <div class="tab-pane fade" id="panel52" role="tabpanel">

                  <h4 class="mt-4">Update User Information</h4><hr>

                  {!! Form::open(['method' => 'put', 'route' => ['update.updatecontactinfo', $user->id]]) !!}

                                        
                    <div class="demo-masked-input">

                    <!-- Material input text -->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        {!! Form::text('name', $user->name, array('class' =>'form-control', 'id'=>'name')) !!}
                        {!! Form::label('name', 'Your name') !!}
                    </div>

                    @if ($errors->has('name'))
                        <p class="red-text">{{ $errors->first('name') }}</p>
                    @endif

                    <!-- Material input date of Gender -->
                    <div class="md-form my-5">
                        <div class="row">
                            <div class="col-lg-2">
                                <i class="fa fa-venus-mars prefix grey-text"></i>
                            </div>
                            <div class="col-lg-10 form-inline">
                                <div class="form-check">
                                    {!! Form::radio('gender', '1', ($user->gender == 1) ? true : false, array('class' =>'form-check-input', 'id'=>'male')) !!}
                                    {!! Form::label('male', 'Male') !!}
                                </div>
                                <div class="form-check">
                                    {!! Form::radio('gender', '2', ($user->gender == 2) ? true : false, array('class' =>'form-check-input', 'id'=>'female')) !!}
                                    {!! Form::label('female', 'Female') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('gender'))
                        <p class="red-text">{{ $errors->first('gender') }}</p>
                    @endif

                    <!-- Material input date of birth -->
                    <div class="md-form">
                        <i class="fa fa-birthday-cake prefix grey-text"></i>
                        {!! Form::text('dob', empty($user->dob) ? '' : $user->dob->format('d/M/Y'), array('class' =>'form-control date', 'placeholder'=>'Your Date of Birth (dd/mm/yyyy)')) !!}
                    </div>

                    @if ($errors->has('dob'))
                        <p class="red-text">{{ $errors->first('dob') }}</p>
                    @endif


                    <div class="text-center mt-4">
                        {!! Form::submit('Update Information', array('class' =>'btn btn-primary')) !!}
                    </div>

                  </div>
                {!! Form::close() !!}

                </div>
                <!--/.Panel 2-->

                <!--Panel 3-->
                <div class="tab-pane fade" id="panel53" role="tabpanel">

                  <h4 class="mt-4">Update Contact Information</h4><hr>

                  {!! Form::open(['method' => 'put', 'route' => ['update.updateuserInfo', $user->id]]) !!}

                                        
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
                        {!! Form::submit('Update Information', array('class' =>'btn btn-primary')) !!}
                    </div>

                  </div>
                {!! Form::close() !!}

                </div>
                <!--/.Panel 3-->

                <!--Panel 4-->
                <div class="tab-pane fade" id="panel54" role="tabpanel">

                  <h4 class="mt-4">Update Password</h4><hr>

                  {!! Form::open(['method' => 'post', 'route' => 'register']) !!}

                    <!-- Material input password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password', array('class' =>'form-control', 'id'=>'password')) !!}
                        {!! Form::label('password', 'Your password') !!}
                    </div>

                    @if ($errors->has('password'))
                        <p class="red-text">{{ $errors->first('password') }}</p>
                    @endif

                    <!-- Material confirm password -->
                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        {!! Form::password('password_confirmation', array('class' =>'form-control', 'id'=>'password-confirm')) !!}
                        {!! Form::label('password-confirm', 'Confirm Your password') !!}
                    </div>

                    @if ($errors->has('condition'))
                        <p class="red-text mt-3">{{ $errors->first('condition') }}</p>
                    @endif

                    <div class="text-center mt-4">
                        {!! Form::submit('Sign Up', array('class' =>'btn btn-primary')) !!}
                    </div>

                  </div>
                {!! Form::close() !!}

                </div>
                <!--/.Panel 4-->
            </div>
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- View Profile -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Update Profile Picture</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
                    <div class="btn-group mt-4" role="group" aria-label="Basic example">
                      <a href="view_user.php" class="btn btn-blue btn-sm"><i class="fa fa-user fa-sm pr-2" aria-hidden="true"></i>Select</a>
                      <a href="view_order.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Profile -->

@endsection

