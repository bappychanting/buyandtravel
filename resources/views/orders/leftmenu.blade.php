<div class="col-lg-4">

  <a class="btn btn-md btn-primary btn-block mb-4" href="{{ route('orders.create') }}"><i class="fa fa-plus fa-sm pr-2"" aria-hidden="true"></i> Add Order</a>

  <!-- Search -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Search</h5>
      <p class="card-header-subtitle mb-0">product, delivery location etc</p>
    </div>
    <div class="card-body">
      <div class="md-form">
          <input type="email" class="form-control">
          <label for="materialFormRegisterEmailEx">Search Orders</label>
      </div>
      <div class="text-center mt-4">
          <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </div>
  <!-- Search -->

  <!-- Sort by Date -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Sort by Date</h5>
    </div>
    <div class="card-body">
      <div class="md-form">
          <i class="fa fa-plane prefix grey-text"></i>
          <input type="email" class="form-control datepicker">
          <label for="materialFormRegisterEmailEx">From</label>
      </div>
      <div class="md-form">
          <i class="fa fa-truck prefix grey-text"></i>
          <input type="email" class="form-control datepicker">
          <label for="materialFormRegisterEmailEx">To</label>
      </div>
      <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">Sort</button>
      </div>
    </div>
  </div>
  <!-- Sort by Date -->

  <!-- Categories -->
  <div class="card card-cascade mb-4">
    <div class="view gradient-card-header blue-gradient">
      <h5 class="card-header-title">Categories</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">Web Design</a>
            </li>
            <li>
              <a href="#">HTML</a>
            </li>
            <li>
              <a href="#">Freebies</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">JavaScript</a>
            </li>
            <li>
              <a href="#">CSS</a>
            </li>
            <li>
              <a href="#">Tutorials</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Categories -->
</div> 