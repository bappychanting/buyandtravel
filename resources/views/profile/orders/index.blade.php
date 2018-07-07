@extends('layouts.master')

@section('title', $user->name." || Orders || ")

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
              <li class="breadcrumb-item active"><i class="fa fa-hand-o-right mx-2 white-text" aria-hidden="true"></i>Orders</li>
          </ol>
      </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Sidebar Column -->
          @include('profile.sidebar')

          <!-- Content Column -->
                    <!-- Content Column -->
          <div class="col-lg-10 mb-4">
            <h2>List of Orders</h2>
            <p>Following are the list of orders you have added.</p>
          <a class="btn btn-md btn-primary mb-4" href="{{ route('orders.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Order</a>
          <!-- Material input email -->
                <div class="md-form">
                    <input type="email" class="form-control">
                    <label for="materialFormRegisterEmailEx">Search Orders</label>
                </div>
                <div class="text-center mt-4  mb-4">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </div>
             <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-2 mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid rounded" alt="First sample image" width="100" length="100">
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-8 mb-4">
                    <h5 class="mb-3 font-weight-bold dark-grey-text">
                        <strong>This is title of the Order</strong>
                        <small>Added in 19-04-18</small>
                    </h5>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="user_order_details.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View Order</a>
                        <a href="#" class="btn btn-blue btn-sm delete_sweet_alert"><i class="fa fa-trash fa-sm pr-2" aria-hidden="true"></i>Delete Order</a>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr class="mb-5">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-2 mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid rounded" alt="First sample image" width="100" length="100">
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-8 mb-4">
                    <h5 class="mb-3 font-weight-bold dark-grey-text">
                        <strong>This is title of the Order</strong>
                        <small>Added in 19-04-18</small>
                    </h5>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="user_order_details.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View Order</a>
                        <a href="#" class="btn btn-blue btn-sm delete_sweet_alert"><i class="fa fa-trash fa-sm pr-2" aria-hidden="true"></i>Delete Order</a>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr class="mb-5">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-2 mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid rounded" alt="First sample image" width="100" length="100">
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-8 mb-4">
                    <h5 class="mb-3 font-weight-bold dark-grey-text">
                        <strong>This is title of the Order</strong>
                        <small>Added in 19-04-18</small>
                    </h5>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="user_order_details.php" class="btn btn-blue btn-sm"><i class="fa fa-external-link fa-sm pr-2"" aria-hidden="true"></i>View Order</a>
                        <a href="#" class="btn btn-blue btn-sm delete_sweet_alert"><i class="fa fa-trash fa-sm pr-2" aria-hidden="true"></i>Delete Order</a>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr class="mb-5">

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
        </div>
        <!-- /.row -->

    </div>
    <!-- Contents -->

@endsection

