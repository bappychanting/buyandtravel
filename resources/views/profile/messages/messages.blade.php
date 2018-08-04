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
        <li class="breadcrumb-item"><a class="white-text" href="{{ route('messages.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Messages</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Conversation</li>
      </ol>
    </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">
                <h2>Conversation</h2>         

                <h4 class="my-3 font-weight-bold">{{ $conversation->subject }}</h4><hr>

                <small class="grey-text mr-3">
                  In this conversation
                </small>
                @foreach($conversation->participants as $participant)
                <div class="chip">
                  <img src="{{ file_exists($participant->user->avatar) ? asset($participant->user->avatar) : 'http://via.placeholder.com/450' }}" alt="{{ $participant->user->name }}"> {{ $participant->user->name }}
                </div>
                @endforeach
                {!! Form::open(['url' => '/profile/offers', 'method'=>'get']) !!}
                  <div class="row mb-5">
                    <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
                      <!-- Material input email -->
                      <div class="md-form">
                          {!! Form::text('add_participants', null, ['class'=>'form-control', 'id'=>'add']) !!}
                          {!! Form::label('add', 'Add more participants') !!}
                      </div>
                      <div id="participants_list">
                        <!-- <ul class="list-group jquery_dropdown_result">
                          <a href="#" class="list-group-item">Cras justo odio</a>
                          <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                          <a href="#" class="list-group-item">Morbi leo risus</a>
                          <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                          <a href="#" class="list-group-item">Vestibulum at eros</a>
                        </ul> -->
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                      <div class="text-center mt-4">
                        {!! Form::button('<i class="fa fa-plus"></i>', array('type' => 'submit', 'class' =>'btn btn-primary btn-sm')) !!}
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="pull-right mt-4">
                          <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-exclamation-triangle fa-sm pr-2" aria-hidden="true"></i>Remove yourself from this conversation</a>
                        </div>
                    </div>
                  </div>
                {!! Form::close() !!}

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination pg-blue justify-content-end">
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
                @foreach($conversation->messages as $message)
                  {{-- "Messages go here" --}}
                @endforeach

                <!-- Message -->
                <div class="row">
                  <div class="col-lg-1 mb-5">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle z-depth-0">
                  </div>
                  <div class="col-lg-11 mb-5">
                    <div class="card border border-info">
                      <div class="card-body">
                        <h6 class="font-weight-bold">Kamran</h6>
                        <small class="grey-text">19th January, Sunday, 2.00 AM</small>
                        <hr>
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                      </div>
                      <div class="btn-group justify-content-end mb-3 mx-3" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-indigo btn-sm btn-rounded"><i class="fa fa-edit"" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-unique btn-sm btn-rounded"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Message -->

                <!-- Message -->
                <div class="row">
                  <div class="col-lg-1 mb-5">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle z-depth-0">
                  </div>
                  <div class="col-lg-11 mb-5">
                    <div class="card border border-light">
                      <div class="card-body">
                        <p class="">Kamran</p>
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Message -->

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

