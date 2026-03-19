<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Beranda - Tani Merdeka')</title>

    <!-- font, tailwind and bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{font-family:'Plus Jakarta Sans', sans-serif;}
        .bg-tani-green{background-color: #3b7d34;}
        .text-tani-green{color:#2d4a22;} /* text navbar */
        .bg-tani-brown{background-color: #7b3e19;} /*button caegory*/
    </style>
</head>
<body class="bg-white min-h-screen flex flex-col">
    @include('components.navbar')
    <main class="flex-grow">
        <!-- content -->
         @yield('content')
    </main>

    @include('components.footer')
</body>
</html>