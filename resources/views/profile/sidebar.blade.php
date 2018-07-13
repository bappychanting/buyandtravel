<!-- Sidebar -->
          <div class="col-lg-2 mb-4">
            <div class="list-group">
              <a href="{{ route('profile.summery') }}" class="list-group-item {{Route::is('profile.summery')? 'active disabled':'list-group-item-action'}}">Summery</a>
              <a href="{{ route('orders.index') }}" class="list-group-item {{Route::is('orders*')? 'active disabled':'list-group-item-action'}}">Orders</a>
              <a href="{{ route('travel.index') }}" class="list-group-item {{Route::is('travel*')? 'active disabled':'list-group-item-action'}}">Travel History</a>
              <a href="user_requests.php" class="list-group-item disabled">Requests</a>
              <a href="user_offers.php" class="list-group-item disabled">Offers</a>
              <a href="{{ route('user.userinfo') }}" class="list-group-item {{Route::is('user*')? 'active disabled':'list-group-item-action'}}">View Profile</a>
              <a href="user_profile.php" class="list-group-item disabled">Following Users</a>
              <a href="user_profile.php" class="list-group-item disabled">Followed Users</a>
              <a href="user_reviews.php" class="list-group-item disabled">User Reviews</a>
            </div>
          </div>
<!-- #Ends# Sidebar -->