<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BGI') }} | @yield('Title')</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="../../admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../admin/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../admin/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../admin/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/img/bgi.png" />
</head>

<body>
    @yield('content')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../admin/js/off-canvas.js"></script>
    <script src="../../admin/js/hoverable-collapse.js"></script>
    <script src="../../admin/js/template.js"></script>
    <script src="../../admin/js/settings.js"></script>
    <script src="../../admin/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>