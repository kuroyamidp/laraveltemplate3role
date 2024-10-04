<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Login </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Nunito:wght@300;400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Preload non-essential CSS and fonts -->
    <link rel="preload" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('assets/vendor/quill/quill.snow.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('assets/vendor/simple-datatables/style.css') }}" as="style" onload="this.rel='stylesheet'">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <body>
        <main id="main" class="main">
            <div id="content">
                @yield('content')
            </div>
        </main>


        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>


    </body>

</html>