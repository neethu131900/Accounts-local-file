<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('profile.edit')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
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
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    @can('view mid')
                    <li class="nav-item">
                        <a href="{{route('mids')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Mids</p>
                        </a>
                    </li>
                    @endcan
                    @can('view midfees')
                    <li class="nav-item">
                        <a href="{{route('midfees')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Mid Fees</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>


            <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Simple Link
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li> -->
            @can('update profile')
            <li class="nav-item">
                <a href="{{route('profile.edit')}}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-user"></i>
                    <p>
                        {{ __('Profile') }}
                    </p>
                </a>
            </li>
            @endcan

            @can('create role')
            <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Menu Permission') }}
                    </p>
                </a>
            </li>
            @endcan
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>