<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Linh test -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang Chủ - SB Admin</title>
        <link rel="stylesheet" href="{{asset('assets/admins/css/styles.css')}}">
        <link rel='stylesheet' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    </head>
<body class="sb-nav-fixed">
        {{-- header --}}
        @include('admins.blocks.menubar')
        @include('admins.blocks.topbar')
        @yield('dashboard')
        @yield('account')

        @yield('device-type-list')
        @yield('device-type-add')
        @yield('device-type-edit')

        @yield('device-list')
        @yield('device-add')
        @yield('device-detail')
        @yield('device-edit')

        @yield('service-list')
        @yield('service-add')
        @yield('service-detail')
        @yield('service-edit')


        @yield('number-list')
        @yield('number-add')
        @yield('umber-detail')

        @yield('report-list')

        @yield('right-list')
        @yield('right-add')
        @yield('right-detail')
        @yield('right-edit')

        @yield('account-list')
        @yield('account-diary')
        @yield('account-add')
        @yield('account-detail')
        @yield('account-edit')

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src='{{asset('assets/admins/js/chart-area-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/chart-bar-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/chart-pie-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/datatables-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/scripts.js')}}'></script>
        @stack('scripts')
    </body>
</html>
