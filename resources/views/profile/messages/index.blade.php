@extends('layouts.master')

@section('title', $user->name." || Messages || ")

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
          <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Messages</li>
        </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
              <h2>{{ empty($search) ? 'List of ' : 'Search' }} Participated Messages</h2>
              <p>Following are the list of messages {{ empty($search) ? 'you have participated in' : 'based on your search' }}.</p>
              @if(empty($search))
                  <a class="btn btn-md blue-gradient mb-4" href="{{ route('messages.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Create Message</a>
              @else
                  <a class="btn btn-sm btn-blue" href="{{ route('messages.index') }}"><i class="fa fa-refresh fa-sm pr-2"" aria-hidden="true"></i> Refresh List</a>
              @endif
              {!! Form::open(['url' => '/profile/messages', 'method'=>'get']) !!}
              <div class="row mb-5">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <!-- Material input email -->
                  <div class="md-form">
                      {!! Form::text('search', $search, ['class'=>'form-control', 'id'=>'search']) !!}
                      {!! Form::label('search', 'Search Messages') !!}
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="text-center mt-4">
                    {!! Form::button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                  </div>
                </div>
              </div>
            {!! Form::close() !!}
              <div class="row mb-5">
                <div class="col-lg-1">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="img-fluid rounded-circle z-depth-0">
                </div>
                <div class="col-lg-11">
                  <div class="card">
                    <div class="card-body blue white-text">
                      Eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas? 
                    </div>
                  </div> 
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-lg-1">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle z-depth-0">
                </div>
                <div class="col-lg-11">
                  <div class="card">
                    <div class="card-body grey white-text">
                      Quis autem vel eum iure reprehenderit ...
                    </div>
                  </div> 
                </div>
              </div>
            </div> 
           
          </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

