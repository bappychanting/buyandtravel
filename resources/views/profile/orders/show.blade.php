@extends('layouts.master')

@section('title', $user->name." || View Order Details || ")

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
              <li class="breadcrumb-item"><a class="white-text" href="{{ route('orders.index') }}"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</a></li>
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>View Order Details</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

            <!-- Content Column -->
            <div class="col-lg-10">
                <h2>View Order Details</h2>
                <h5 class="my-3 font-weight-bold">{{ $order->product_name }}</h5>
                <h6><i class="fa fa-tags fa-sm pr-2"></i><span class="dark-grey-text">{{ $order->product_type->product_type }}</span></h6>
                <hr class="mb-4">
                <p class="mt-4">
                  <i class="fa fa-clock-o fa-sm pr-2"></i><span class="font-weight-bold light-blue-text">{{$order->created_at->format('l d F Y, h:i A')}}</span>
                </p>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method'=>'delete']) !!}
                    <a href="{{ $order->reference_link }}" class="btn btn-blue btn-sm" target="_blank"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>Reference Link</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-blue btn-sm"><i class="fa fa-edit fa-sm pr-2" aria-hidden="true"></i>Update Order</a>
                    {!! Form::button('<i class="fa fa-trash fa-sm pr-2"" aria-hidden="true"></i>Delete', array('class' => 'btn btn-blue btn-sm form_delete_sweet_alert', 'type'=>'submit')) !!}
                {!! Form::close() !!}

                  <!-- Portfolio Section -->
                    <div class="item my-4" id="aniimated-thumbnials">
                      <ul id="content-slider" class="content-slider">
                        @foreach($order->images as $image)
                          <li>
                              <a href="{{ asset($image->src) }}" data-sub-html="{{ $order->product_name.' '.$loop->iteration }}"> 
                                <img class="img-fluid" src="{{ asset($image->src) }}" alt="{{ $image->alt.' '.$loop->iteration }}">
                              </a>
                              {!! Form::open(['route' => ['order.image.delete', $image->id], 'method'=>'delete']) !!}
                                {!! Form::button('<i class="fa fa-trash"" aria-hidden="true"></i>', array('class' => 'btn btn-blue btn-sm form_delete_sweet_alert', 'type'=>'submit')) !!}
                              {!! Form::close() !!}
                          </li>
                        @endforeach  
                      </ul>
                      @if(count($order->images) < 5)
                        <button type="button" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#updateimage">
                          <i class="fa fa-cloud-upload fa-sm pr-2"" aria-hidden="true"></i>Add image
                        </button>
                      @endif
                    </div>
                  <!-- #End# Portfolio Section -->

                <button class="btn btn-primary btn-md mb-4" id="showDetailsButton" type="button" data-toggle="collapse" data-target="#showDetails" aria-expanded="false" aria-controls="showDetails">
                  <i class="fa fa-folder-open fa-sm pr-2"></i>Click Here to Show Details
                </button>
                <div class="collapse" id="showDetails">
                  {!! $order->additional_details !!}
                </div>

                <h5 class="my-4"><i class="fa fa-money fa-sm pr-2"></i>{{ $order->expected_price }}/=</h5>
                <h6 class="my-4"><i class="fa fa-map-signs fa-sm pr-2"></i>{{ $order->delivery_location }}</h6>
                <p class="my-4">
                  @if( !empty($order->tags) )
                    @php $tags = explode(',', $order->tags); @endphp
                    @foreach($tags as $tag) <div class="chip blue lighten-1 white-text">{{ $tag }}</div> @endforeach
                  @endif
                </p>
                <p class="grey-text">Views: {{ $order->views }}</p>
                <h4>Offers</h4><hr>
            <div class="table-responsive">
                <div class="md-form">
                    <input type="email" class="form-control">
                    <label for="materialFormRegisterEmailEx">Search Offers</label>
                </div>
                <div class="text-center mt-4  mb-4">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--Pagination-->
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
            </div>
            <!-- #END# Content Column -->
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

    <!-- Modal -->
    <div class="modal fade" id="updateimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Order Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body image_modal">
                  <div class="text-center">
                    <img src="http://placehold.it/200" class="img-fluid z-depth-1 preview_input" alt="Responsive image">
                    <p class="text-center mt-4">Maximum Allowed Size: 500 KB</p>
                  </div>
                    {!! Form::open(['class'=>'md-form upload_image', 'method' => 'post', 'route' => ['order.image.add'], 'enctype' => 'multipart/form-data']) !!}
                      {!! Form::hidden('id', $order->id) !!}
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
                          {{ Form::button('Upload Image <i class="fa fa-upload ml-1"></i>', ['type' => 'submit', 'class' => 'btn btn-cyan mt-1 btn-md'] ) }}
                      </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

