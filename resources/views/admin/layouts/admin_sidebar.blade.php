<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('front\img\logo-white.png') }}" alt="Inclusion Logo" class="brand-image img-round" />
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('back/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
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
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.aboutus.index') }}" class="nav-link {{ request()->is('admin/About-Us') ? 'active' : '' }}">
                        <i class="nav-icon fa fa fa-paper-plane-o"></i>
                        <p>About-Us</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.service.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-rocket"></i>
                        <p>Services</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link">
                        <i class="nav-icon fab fa-blogger-b"></i>
                        <p>Blogs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.projectcategory.index') }}" class="nav-link">
                        <i class="nav-icon fab fa fa-briefcase"></i>
                        <p>Portfolio</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.team.index') }}" class="nav-link">
                        <i class="nav-icon team fa fa-group"></i>
                        <p>Team</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.testimonial.index') }}" class="nav-link">
                        <i class="nav-icon team fa fa-quote-left"></i>
                        <p>
                            Testimonial
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.seo.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Seo
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>Career <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.requirement.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Job Requirements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.career.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Applicant Details</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Themes <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.theme.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.theme.theme_tag.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tag</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.theme.items.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Items</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.career.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Applicant Details</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-info"></i>
                        <p>Inquiry<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.contact') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Requests</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.quote.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quote Requests</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.banner.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Landing-Page Banner
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
