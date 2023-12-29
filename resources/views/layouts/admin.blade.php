<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin BGI</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('../../admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('../../admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('../../admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('../../assets/img/bgi.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            @include('layouts.nav-admin')
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('layouts.setting-admin')

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
            <!-- partial -->

            @yield('content')

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('layouts.footer-admin')

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('../../admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('../../admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('../../admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('../../admin/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../../admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('../../admin/js/template.js') }}"></script>
    <script src="{{ asset('../../admin/js/settings.js') }}"></script>
    <script src="{{ asset('../../admin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('../../admin/js/jquery.cookie.j') }}s" type="text/javascript"></script>
    <script src="{{ asset('../../admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('../../admin/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->

    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
    <script>
        CKEDITOR.replace('visi');
    </script>
    <script>
        CKEDITOR.replace('misi');
    </script>
    <script>
        CKEDITOR.replace('desk_tim');
    </script>
</body>

</html>