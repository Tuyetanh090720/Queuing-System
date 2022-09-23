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
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    </head>
    <body class="sb-nav-fixed">
        {{-- header --}}
        @include('admins.blocks.menubar')
        @include('admins.blocks.topbar')
        @yield('dashboard')
        @yield('account')


        @yield('edit-customers')
        @yield('lists-customers')

        @yield('add-ticket-types')
        @yield('edit-ticket-types')
        @yield('lists-ticket-types')

        @yield('edit-contacts')
        @yield('lists-contacts')

        @yield('edit-orders')
        @yield('lists-orders')

        @yield('add-events')
        @yield('edit-events')
        @yield('lists-events')

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src='{{asset('assets/admins/js/chart-area-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/chart-bar-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/chart-pie-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/datatables-demo.js')}}'></script>
        <script src='{{asset('assets/admins/js/scripts.js')}}'></script>
    </body>
</html>