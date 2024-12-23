
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">
                {{ auth()->user()->name }}
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{ __('Users') }}</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.travel_packages.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-hotel"></i>
                        <p>Paket Wisata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>Blog <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @else



            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->