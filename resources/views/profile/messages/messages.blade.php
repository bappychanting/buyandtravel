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

