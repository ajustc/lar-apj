<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- BOX ICON -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/boxicons.css" />

    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css?v=0.40" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets') }}/js/config.js?v=0.20"></script>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <!-- ADD SCRIPT JS/CSS HERE -->
    <?php if (!empty($datatables)) : ?>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.12.1/api/sum().js">
    <?php endif; ?>

    <?php if (!empty($swal)) : ?>
        <script async defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php endif; ?>

    <?php if (!empty($dropify)) : ?>
        <link rel="stylesheet" href="{{ asset('assets') }}/css/dropify.css">
    <?php endif; ?>

    <?php if (!empty($datetimepicker)) : ?>
        <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery.datetimepicker.css?v=1.00" />
    <?php endif; ?>

</head>