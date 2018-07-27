<!-- Sidebar -->
          <div class="col-lg-2 mb-4">
            <div class="list-group">
              <a href="{{ route('profile.summery') }}" class="list-group-item {{Route::is('profile.summery')? 'active':'list-group-item-action'}}">Summery</a>
              <a href="#" class="list-group-item disabled">Notifications</a>
              <a href="{{ route('messages.index') }}" class="list-group-item {{Route::is('messages*')? 'active':'list-group-item-action'}}">Messages</a>
              <a href="{{ route('orders.index') }}" class="list-group-item {{Route::is('orders*')? 'active':'list-group-item-action'}}">Orders</a>
              <a href="{{ route('travel.index') }}" class="list-group-item {{Route::is('travel*')? 'active':'list-group-item-action'}}">Travel History</a>
              <a href="{{ route('offers.index') }}" class="list-group-item {{Route::is('offers*')? 'active':'list-group-item-action'}}">Offers</a>
              <a href="#" class="list-group-item disabled">Requests</a>
              <a href="{{ route('user.userinfo') }}" class="list-group-item {{Route::is('user*')? 'active':'list-group-item-action'}}">View Profile</a>
              <a href="#" class="list-group-item disabled">Following Users</a>
              <a href="#" class="list-group-item disabled">Followed Users</a>
              <a href="#" class="list-group-item disabled">User Reviews</a>
            </div>
          </div>
<!-- #Ends# Sidebar -->