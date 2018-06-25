<!-- Sidebar -->
          <div class="col-lg-2 mb-4">
            <div class="list-group">
              <a href="{{ route('profile.summery') }}" class="list-group-item {{Route::is('profile.summery')? 'active':''}}">Summery</a>
              <a href="user_orders.php" class="list-group-item">Orders</a>
              <a href="user_travel_schedules.php" class="list-group-item">Travel History</a>
              <a href="user_requests.php" class="list-group-item">Requests</a>
              <a href="user_offers.php" class="list-group-item">Offers</a>
              <a href="{{ route('profile.userinfo') }}" class="list-group-item {{Route::is('profile.userinfo') || Route::is('profile.edituserinfo') || Route::is('profile.editcontactinfo') || Route::is('profile.editpassword')? 'active':''}}">View Profile</a>
              <a href="user_profile.php" class="list-group-item">Following Users</a>
              <a href="user_profile.php" class="list-group-item">Followed Users</a>
              <a href="user_reviews.php" class="list-group-item">User Reviews</a>
            </div>
          </div>
<!-- #Ends# Sidebar -->