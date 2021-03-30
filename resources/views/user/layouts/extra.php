{{ route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}

{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}


<!-- Sidebar Menu -->
      <nav style="background-color: #0B3B17" class="mt-2">
        <ul style="background-color: #0B3B17" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->role=='Admin')
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                </a>
              </li>
            </ul>
          </li> 
          @endif
           <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 Profile Management
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

        </ul>
    </li>
  </ul>
      </nav>
      <!-- /.sidebar-menu -->