 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard')}}" class="brand-link">
      <img src="{{ asset('vendors/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Login System</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="{{ route('view-profile') }}">
          <div class="image">
            <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" alt="avatar">
          </div>
          <div class="info">
            <a href="{{ route('view-profile') }}" class="d-block">@auth {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} @endauth</a>
          </div>
        </a>
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Dashboard
              </p>
            </a>
          </li>
          @role('admin|faculty|registrar')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                 Class Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @role('faculty')
              <li class="nav-item">
                <a href="{{ route('Classlists/my-class') }}" class="nav-link">
                  <i class="pl-3 nav-icon fas fa-users"></i>
                  <p class="pl-3">
                    My Class
                  </p>
                </a>
              </li>
            @endrole
            @role('admin|registrar')
              <li class="nav-item">
                <a href="{{ route('classlists/lists') }}" class="nav-link">
                  <i class="pl-3 nav-icon fas fa-eye"></i>
                  <p class="pl-3">
                    Class lists
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('classlists/add-student') }}" class="nav-link">
                  <i class="pl-3 nav-icon fas fa-user-plus"></i>
                  <p class="pl-3">
                    Add Student
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('classlists/students') }}" class="nav-link">
                  <i class="pl-3 nav-icon fas fa-users"></i>
                  <p class="pl-3">
                    Students
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('classlists/import-class') }}" class="nav-link">
                  <i class="pl-3 nav-icon fas fa-file-import"></i>
                  <p class="pl-3">
                    Import Class
                  </p>
                </a>
              </li>
              @endrole
            </ul>
          </li>
          @endrole
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Grading Setup
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('role/lists') }}" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-th-large"></i>
                    <p class="pl-3">
                      Create Category
                    </p>
                  </a>
                </li>
                </ul>
              </li>
          @role('admin|system editor|company admin')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-swatchbook"></i>
                <p>
                  Subject Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('subject/lists') }}" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-book"></i>
                    <p class="pl-3">
                      View All Subjects
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('subject/create') }}" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-book-medical"></i>
                    <p class="pl-3">
                      Encode Subject
                    </p>
                  </a>
                </li>
                @role('admin|system editor')
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-clipboard-list"></i>
                    <p class="pl-3">
                      Manage Term Class Records
                    </p>
                  </a>
                </li>
                @endrole
              </ul>
            </li>
            @endrole
            @role('admin|system editor|company admin|company user|system user')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Member Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @role('admin|system editor')
                <li class="nav-item">
                  <a href="{{ route('member/lists') }}" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-eye"></i>
                    <p class="pl-3">
                      View All Members
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('member/create') }}" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-user-plus"></i>
                    <p class="pl-3">
                      Add New Members
                    </p>
                  </a>
                </li>
                @endrole
                </ul>
              </li>
            @endrole
            @role('admin|system editor')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  Role Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('role/lists') }}" class="nav-link">
                    <i class="pl-3 nav-icon fas fa-key"></i>
                    <p class="pl-3">
                      View All Roles
                    </p>
                  </a>
                </li>
                </ul>
              </li>
              @endrole
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
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
