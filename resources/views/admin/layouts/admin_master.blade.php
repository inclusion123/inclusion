<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    @include('admin.layouts.admin_head')
    @yield('css')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('admin.layouts.admin_preloader')

        @include('admin.layouts.admin_navbar')

        @include('admin.layouts.admin_sidebar')
       @yield('breadcumb')

        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        @include('admin.layouts.admin_footer')
    </div>
    @include('admin.layouts.admin_js_imports')

</body>
@yield('script')
</html>
