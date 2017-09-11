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
                <!-- User Account: style can be found in dropdown.less -->
                <li class="user user-menu">
                    <!--<a id="logout" href="#"> <span class="fa fa-sign-out" ></span></a>-->
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
        </div>
    </nav>
</header>