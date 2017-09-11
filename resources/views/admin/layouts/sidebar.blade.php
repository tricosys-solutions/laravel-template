<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--<li class="header">MAIN NAVIGATION</li>-->
            <li class="treeview {!! Request::is('admin_home') ? 'active' : '' !!}">
                <a href="{{ url('admin_home')}}"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>
            <li class=" {!! Request::is('admin_users') ? 'active' : '' !!}">
                <a href="{{ url('admin_users')}}"><i class="fa fa-user"></i>  <span>Users</span></a>
            </li>
        </ul>        

    </section>
    <!-- /.sidebar -->
</aside>