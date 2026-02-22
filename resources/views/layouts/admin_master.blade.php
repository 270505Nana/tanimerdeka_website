<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- 1. FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <!-- 2. CSS UTAMA -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- 3. CSS UNTUK CHART -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
</head>

<body>
    <div class="dashboard-wrapper d-flex">
        @include('components_admin.sidebar')

        <main class="dashboard-main w-100">
            @include('components_admin.header')

            <div class="dashboard-main-body">
                @yield('content')
            </div>

            @include('components_admin.footer')
        </main>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>

    <!-- Iconify Icon JS -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- JS untuk Chart -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/homeOneChart.js') }}"></script>

</body>
</html>
