<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/img/jnpro-logo.png" alt="UKMads logo" class="brand-image img-circle">
        <span class="brand-text font-weight-bold">JN Pro Movers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @if(Route::has('login'))
                @auth
                    <div class="image">
                        <img src=" {{ asset('img/AvatarMaker.png') }} "
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        @if ( Auth::user()->role == 'admin')
                            <a href="" class="d-block"> {{ ucfirst(Auth::user()->name) }} </a>

                        @else
                            <a href="#" class="d-block"> {{ ucfirst(Auth::user()->name) }} </a>

                        @endif

                    </div>
                @else
                    <div class="image">
                        <img src=" {{ asset('img/AvatarGuest.png') }} "
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> Guest </a>
                    </div>
                @endauth
            @endif

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header bold-font">MENU</li>

                @if(Route::has('login'))
                    @auth

                        @if(Auth::user()->role == 'admin')

                            <li class="nav-item">
                                <a href=" {{ route("admin.dashboard") }} "
                                    class="nav-link {{ (request()->routeIs('admin.dashboard') ? 'active' : '') }}">
                                    <i class="fas fa-house-user mr-2 "></i>
                                    <p class="">Dashboard</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.order.index") }}"
                                   class="nav-link {{ (request()->routeIs('admin.order.index') ? 'active' : '') }}">
                                    <i class="fas fa-list-alt mr-2"></i>
                                    <p class="">Orders</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.customer.index") }}"
                                   class="nav-link {{ (request()->routeIs('admin.customer.index') ? 'active' : '') }}">
                                    <i class="fas fa-user mr-2"></i>
                                    <p class="">Customers</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.employee.index") }}"
                                   class="nav-link {{ (request()->routeIs('admin.employee.index') ? 'active' : '') }}">
                                    <i class="fas fa-id-badge mr-2"></i>
                                    <p class="">Employee</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.infodetails.index") }}"
                                   class="nav-link {{ (request()->routeIs('admin.infodetails.index') ? 'active' : '') }}">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <p class="">Info Details</p>
                                </a>
                            </li>

                        @endif
                    @endauth
                @endif

                <br>
                <br>
                <br>

                <li class="nav-header bold-font">ACCOUNT</li>

                @if(Route::has('login'))

                    @auth

                        <li class="nav-item">
                            <a data-toggle="modal" id="logout-button" data-target="#Logout" class="nav-link"
                                style="color: #fff; cursor: pointer;">
                                <i class="fas fa-sign-out-alt mr-2 "></i>
                                <p class="">Logout</p>
                            </a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a href=" {{ route("login") }} " class="nav-link">
                                <i class="fas fa-sign-in-alt mr-2 "></i>
                                <p class="">Login</p>
                            </a>
                        </li>

                        @if(Route::has("register"))

                            <li class="nav-item">
                                <a href=" {{ route("register") }} " class="nav-link">
                                    <i class="fas fa-share-square mr-2 "></i>
                                    <p class="">Register</p>
                                </a>
                            </li>

                        @endif
                    @endauth
                @endif

            </ul>
        </nav>
    </div>

    <!-- /.sidebar -->
</aside>

{{-- Log out modal --}}
<div class="modal fade" id="Logout" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="LogoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="LogoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->role == "customer")
                            <a type="button" id="advertiser-logout" href="{{ route("customer.logout") }}"
                                class="btn btn-danger">Yes</a>

                        @elseif(Auth::user()->role == "admin")
                            <a type="button" href="{{ route("admin.logout") }}"
                                class="btn btn-danger">Yes</a>

                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</div>
{{-- END of log out modal --}}

<!-- Content Wrapper. Contains page content -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
