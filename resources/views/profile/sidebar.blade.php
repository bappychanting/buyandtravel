<!-- Sidebar -->
          <div class="col-lg-2 mb-4">
            <div class="list-group">
              <a href="{{ route('profile.summery') }}" class="list-group-item {{Route::is('profile.summery')? 'active':''}}">Summery</a>
              <a href="{{ route('orders.index') }}" class="list-group-item {{Route::is('orders*')? 'active':''}}">Orders</a>
              <a href="user_travel_schedules.php" class="list-group-item">Travel History</a>
              <a href="user_requests.php" class="list-group-item">Requests</a>
              <a href="user_offers.php" class="list-group-item">Offers</a>
              <a href="{{ route('user.userinfo') }}" class="list-group-item {{Route::is('user*')? 'active':''}}">View Profile</a>
              <a href="user_profile.php" class="list-group-item">Following Users</a>
              <a href="user_profile.php" class="list-group-item">Followed Users</a>
              <a href="user_reviews.php" class="list-group-item">User Reviews</a>
            </div>
          </div>
<!-- #Ends# Sidebar -->