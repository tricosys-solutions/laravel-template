<header class="main-header">
    <!--UI Blocker -->

    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LT</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Laravel Template</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{Auth::guard('web_admin')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <a href="{{url('admin_profile')}}">
                                <span class="fa fa-users" ></span> Profile
                            </a>
                        </li>
                        <li class="user-body">
                            <a id="logout" href="{{ url('admin_logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                <span class="fa fa-sign-out" ></span> Logout
                            </a>
                            <form id="logout-form" action="{{url('admin_logout')}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>