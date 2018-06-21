@extends('layouts.master')

@section('content')
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg" alt="First slide">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Light mask</h3>
                <p>Use a hidden field for notifications</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg" alt="Second slide">
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Strong mask</h3>
                <p>If the hidden field exists show its value through bootstrap notify</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
            <div class="view">
                <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg" alt="Third slide">
                <div class="mask rgba-black-slight"></div>
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Slight mask</h3>
                <p>User different fields for different type of notifications</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4 blue-text">Welcome to Buy &#38; Travel</h1>
      <div class="media mb-5">
          <img class="d-flex mr-3" src="http://icons.iconarchive.com/icons/martin-berube/people/128/astronaut-icon.png" alt="Generic placeholder image">
          <div class="media-body">
              <h5 class="mt-0 font-weight-bold">Enabling you to trade products from overseas for the first time in bangladesh.</h5>
              Ever suddenly came accorss a product online and you thought you really wanted it, but then found the area of its availablity is out of your reach? Or ever stumbled upon a product you thought bringing it to certain customers would be mutually benifical for both of you, but you don't know where to find them? We are helping you to achieve all that! 
          </div>
      </div>

      <!-- row -->

      <div class="row">
        <div class="col-lg-6 mb-5">
          <div class="card card-cascade mb-4">
            <div class="view gradient-card-header blue-gradient">
              <h5 class="card-header-title">Find Travelers</h5>
            </div>
            <div class="card-body">
              <div class="md-form">
                  <i class="fa fa-plane prefix grey-text"></i>
                  <input type="email" class="form-control">
                  <label for="materialFormLoginEmailEx">From</label>
              </div>

              <!-- Material input password -->
              <div class="md-form">
                  <i class="fa fa-truck prefix grey-text"></i>
                  <input type="password" class="form-control">
                  <label for="materialFormLoginPasswordEx">To</label>
              </div>

              <div class="text-center mt-4">
                  <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search"></i> Find</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-5">
          <div class="card card-cascade mb-4">
            <div class="view gradient-card-header blue-gradient">
              <h5 class="card-header-title">Find Orders</h5>
            </div>
            <div class="card-body">
              <div class="md-form">
                  <i class="fa fa-plane prefix grey-text"></i>
                  <input type="email" class="form-control">
                  <label for="materialFormLoginEmailEx">From</label>
              </div>

              <!-- Material input password -->
              <div class="md-form">
                  <i class="fa fa-truck prefix grey-text"></i>
                  <input type="password" class="form-control">
                  <label for="materialFormLoginPasswordEx">To</label>
              </div>

              <div class="text-center mt-4">
                  <button class="btn btn-primary btn-md" type="submit"><i class="fa fa-search"></i> Find</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

        <!-- Portfolio Section -->
        <h2 class="my-4 blue-text">News</h2>
        <div class="item mb-5">
          <ul id="content-slider" class="content-slider">
              <li>
                   <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                   <p class="h5 my-1">New features</p>
                   <p>New Features here!</p>
              </li>
              <li>
                   <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                   <p class="h5 my-1">New features</p>
                   <p>New Features here!</p>
              </li>
              <li>
                   <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                   <p class="h5 my-1">New features</p>
                   <p>New Features here!</p>
              </li>
              <li>
                   <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                   <p class="h5 my-1">New features</p>
                   <p>New Features here!</p>
              </li>
              <li>
                   <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                   <p class="h5 my-1">New features</p>
                   <p>New Features here!</p>
              </li>
              <li>
                   <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                   <p class="h5 my-1">New features</p>
                   <p>New Features here!</p>
              </li>
          </ul>
          <p class="text-right"><a href="#">View all news!</a></p>
      </div>
     
      <h2 class="my-4 blue-text">How it works</h2><hr>
      <div class="media mb-5">
        <div class="media-body">
          <h5 class="mt-0 mb-1 font-weight-bold">Media object</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
          Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
        <img class="d-flex ml-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
      </div>
      <div class="media mb-5">
          <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
          <div class="media-body">
              <h5 class="mt-0 font-weight-bold">Media heading</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
              Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
              nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
      </div>
      <div class="media mb-5">
        <div class="media-body">
          <h5 class="mt-0 mb-1 font-weight-bold">Media object</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
          Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
        <img class="d-flex ml-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
      </div>
      <div class="media mb-5">
          <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
          <div class="media-body">
              <h5 class="mt-0 font-weight-bold">Media heading</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
              Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
              nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
      </div>

    </div>
    <!-- /.container -->

@endsection