  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="{{ url('admin/images/iaa.png') }}" alt="IAA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="d-block" style="color: white;">ISVS</span>
    </div>   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <h4 class="d-block" style="color: white;">ADMIN</h4>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('votes')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Votes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('voter')}}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
               Manage Voters
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('ballot')}}" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Ballot
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('candidate')}}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Candidates
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>