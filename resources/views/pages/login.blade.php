<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tani Merdeka Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-screen w-full relative bg-gray-50">

    <div class="fixed inset-0 z-0">
        <img src="{{ asset('assets/images/perkebunan-view.png') }}" class="w-full h-full object-cover" alt="Background">
        <div class="absolute inset-0 bg-white/85"></div>
    </div>

    <!-- logo -->   
    <div class="absolute top-6 left-6 z-20">
        <img src="{{ asset('assets/images/tanimerdeka-logo.png') }}" class="h-12 md:h-16 w-auto" alt="Logo">
    </div>

    <div class="relative z-10 flex flex-col justify-center items-center px-4 pb-12">
        
        <!-- welcoming text -->
        <div class="text-center max-w-2xl mb-8 md:mb-10">
            <h1 class="text-2xl md:text-4xl font-bold text-black mb-3 leading-tight px-2">
                Selamat datang kembali di <br class="hidden md:block"> Tani Merdeka Indonesia!
            </h1>
            <p class="text-sm md:text-base text-gray-600 px-4">
                Silahkan masukkan nomor hp dan password untuk login
            </p>
        </div>

        <form action="{{ url('/login') }}" method="POST" class="w-full max-w-md space-y-4 md:space-y-5">
            @csrf
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="flex flex-col">
                <label class="text-xs md:text-sm font-semibold text-gray-700 mb-1.5 ml-1">Nomor handphone</label>
                <input type="tel" name="no_hp" 
                       placeholder="Masukkan nomor handphone anda"
                       class="w-full px-5 py-3.5 rounded-2xl border-none bg-white shadow-sm focus:ring-2 focus:ring-green-700 focus:outline-none placeholder-gray-300 text-sm md:text-base"
                       value="{{ old('no_hp') }}" required>
            </div>

            <div class="flex flex-col">
                <label class="text-xs md:text-sm font-semibold text-gray-700 mb-1.5 ml-1">Password</label>
                <input type="password" name="password" 
                       placeholder="Masukkan password anda"
                       class="w-full px-5 py-3.5 rounded-2xl border-none bg-white shadow-sm focus:ring-2 focus:ring-green-700 focus:outline-none placeholder-gray-300 text-sm md:text-base"
                       required>
            </div>

            <div class="pt-4 space-y-3">
                <button type="submit" class="w-full bg-[#2d4a22] hover:bg-[#1e3516] text-white font-bold py-3.5 rounded-full transition-all shadow-md active:scale-95">
                    Masuk
                </button>

                <a href="/daftar/anggota" class="block w-full text-center border-2 border-[#2d4a22] text-[#2d4a22] font-bold py-3 rounded-full hover:bg-green-50 transition-all active:scale-95">
                    Daftar
                </a>
            </div>
            
            <div class="text-center pt-2">
                <a href="#" class="text-xs md:text-sm text-gray-500 hover:text-green-800 transition-colors">Lupa Password?</a>
            </div>
        </form>
    </div>

</body>
</html>