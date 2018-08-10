<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar blue darken-1 fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('buyandtravel') }}">
        <i class="fa fa-shopping-bag fa-sm pr-2" aria-hidden="true"></i>Buy &#38; Travel
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Route::is('front.orders*')? 'active':''}}">
                <a class="nav-link" href="{{ route('front.orders.index') }}">Orders</a>
            </li>
            <li class="nav-item {{Route::is('front.travel*')? 'active':''}}">
                <a class="nav-link" href="{{ route('front.travel.index') }}">Travelers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">News</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons">
            @guest          
              <li class="nav-item {{ Route::is('login') || Route::is('register') ? 'active':'' }} dropdown">
              <a class="nav-link dropdown-toggle" id="navbarAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-sm pr-2"></i>Account</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarAccount">
                  <a class="dropdown-item" href="{{ route('register') }}"><i class="fa fa-user-plus fa-sm pr-2"></i>Sign Up</a>
                  <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-sign-in fa-sm pr-2"></i>Sign in</a>
                </div>
              </li>
            @else
                <li class="nav-item dropdown" id="messages_navigation_menu">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1
                        <i class="fa fa-envelope"></i>
                    </a>
                    <!-- Messages Dropdown -->
                    <div class="dropdown-menu">
                      <ul class="list-group">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                          </div>
                          <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                          <small>Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                          </div>
                          <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                          <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                          </div>
                          <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                          <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                      </ul>

                        <!-- <p class="text-center h6">Messages</p>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Message 1</a>
                        <a class="dropdown-item" href="#">Message 2</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="user_messages.php">All Messages</a> -->
                    </div>
                    <!-- Messages Dropdown -->
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">2
                        <i class="fa fa-bell"></i>
                    </a>
                    <!-- Notification Dropdown -->
                    <div class="dropdown-menu">
                        <p class="text-center h6">Notifications</p>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Notification 1</a>
                        <a class="dropdown-item" href="#">Notification 2</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="user_notifications.php">All Notifications</a>
                    </div>
                    <!-- Notification Dropdown -->
                </li>  
                <li class="nav-item avatar dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ file_exists(Auth::user()->avatar) ? asset(Auth::user()->avatar) : 'http://via.placeholder.com/100?text=No+Profile+Picture+Found' }}" class="img-fluid rounded-circle z-depth-0">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-purple" aria-labelledby="navbarDropdownMenuLink-5">
                        <a class="dropdown-item" href="{{ route('profile.summery') }}"><i class="fa fa-user fa-sm pr-2"></i> Your Content</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-sm pr-2"></i> Log out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
<!-- #ENDS# Navigation -->