<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel Template</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link href="{{ asset('/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- data table -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
        <!-- Date Picker -->
        <link href="{{ asset('/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Admin Panel -->
        <link href="{{ asset('/css/admin-panel.css')}}" rel="stylesheet" type="text/css" />
        <!-- jQuery -->
        <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <!--AdminLTE Js-->
        <script src="{{asset('/js/adminlte.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- Data table -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
        <!--Date picker-->
        <script src="{{asset('/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <!-- Validation -->
        <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
        

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->
    </body>
    @yield('scripts')
</html>