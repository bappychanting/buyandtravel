@extends('layouts.master')

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Summery</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('user.sidebar')

          <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2 class="animated bounceInRight">Jessica Clark</h2>

            <!-- Nav tabs -->
            <div class="tabs-wrapper"> 
                <ul class="nav classic-tabs tabs-blue" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-light" data-toggle="tab" href="#panel53" role="tab">Contact Administrator</a>
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
                         <p>
                            <i class="fa fa-envelope prefix grey-text"></i>
                            jessica@hotmail.com
                          </p>

                          <p>
                            <i class="fa fa-phone prefix grey-text"></i>
                            01712423414
                          </p>

                          <p>
                            <i class="fa fa-address-card prefix grey-text"></i>
                            394/1, West Monipur, Mirpur, Dhaka-1216
                          </p>
                          <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="#" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-plus fa-sm pr-2" aria-hidden="true"></i>Update Profile Picture</a>
                              <a href="#" class="btn btn-blue btn-sm"><i class="fa fa-check fa-sm pr-2" aria-hidden="true"></i>Profile verified</a>
                          </div>
                        </div>
                      </div>
                      <h6 class="mb-3 font-weight-bold dark-grey-text">Summery</h6>
                      <ul>
                        <li>500 Requests</li>
                        <li>35 Orders</li>
                        <li>viewed 355 times</li>
                      </ul>

                </div>
                <!--/.Panel 1-->

                <!--Panel 2-->
                <div class="tab-pane fade" id="panel52" role="tabpanel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

                </div>
                <!--/.Panel 2-->

                <!--Panel 3-->
                <div class="tab-pane fade" id="panel53" role="tabpanel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>

                </div>
                <!--/.Panel 3-->
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

