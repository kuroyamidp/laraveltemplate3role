<!DOCTYPE html>
<html lang="en">

<head>


    @include('inc.head')

</head>

<body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @include('inc.navbar', ['background' => 'white'])

    @include('inc.sidebar')

    <main id="main" class="main">
        <div id="content">
            @yield('content')
        </div>
    </main>
    @include('inc.footer')

    <!-- Vendor JS Files -->


    @include('inc.scripts')

</body>

</html>