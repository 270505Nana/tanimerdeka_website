<!-- <nav class="w-full bg-white py-4 px-6 md:px-10 lg:px-16 flex justify-between items-center shadow-sm relative z-50"> -->
<nav class="w-full bg-white py-4 px-6 md:px-10 lg:px-16 flex justify-between items-center shadow-sm sticky top-0 z-50">

    <div class="flex items-center">
        <img src="{{ asset('assets/images/tanimerdeka-logo.png') }}" class="h-10 md:h-14" alt="Logo Tani Merdeka">
    </div>

    <div class="hidden md:flex items-center bg-[#47703e] rounded-full px-2 py-2 shadow-md">

        <a href="{{route('beranda')}}" class="text-white px-5 lg:px-7 py-2 rounded-full font-medium transition {{ request()->is('/') ? 'bg-white/20 border border-white/30 shadow-sm' : 'hover:bg-white/10 border border-transparent' }}">
            Beranda
        </a>

        <a href="{{route('pasar-tani')}}" class="text-white px-5 lg:px-7 py-2 rounded-full font-medium transition {{ request()->is('pasar-tani*') ? 'bg-white/20 border border-white/30 shadow-sm' : 'hover:bg-white/10 border border-transparent' }}">
            Pasar Tani
        </a>
        
        <a href="{{route('kabar-berita.index')}}" class="text-white px-5 lg:px-7 py-2 rounded-full font-medium transition {{ request()->is('kabar-berita*') ? 'bg-white/20 border border-white/30 shadow-sm' : 'hover:bg-white/10 border border-transparent' }}">
            Kabar Berita
        </a>   
        
        <a href="{{route('tentang-kami')}}" class="text-white px-5 lg:px-7 py-2 rounded-full font-medium transition {{ request()->is('tentang-kami*') ? 'bg-white/20 border border-white/30 shadow-sm' : 'hover:bg-white/10 border border-transparent' }}">
            Tentang kami
        </a>
    </div>

    <div class="hidden md:flex items-center gap-4 lg:gap-6">
        @auth
            <!-- notification icon -->
            <a href="#" class="text-[#47703e] hover:text-green-900 transition relative mt-1">
                <i class="bi bi-bell-fill text-2xl"></i>
                <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
            </a>

            <!-- profil icon -->
            <div class="relative">
                <button id="profile-btn"
                    class="text-[#47703e] hover:text-green-900 transition flex items-center focus:outline-none">
                    <i class="bi bi-person-circle text-[32px]"></i>
                </button>
                
                <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 border border-gray-100">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-800">Profil Saya</a>
                    
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</button>
                    </form>
                </div>
            </div>
        @endauth

        <!-- if guest then need login first -->
        @guest
            <a href="/login"
                class="bg-[#47703e] text-white px-6 py-2.5 rounded-full font-bold hover:bg-green-800 transition shadow-md">Login</a>
        @endguest
    </div>

    <!-- drawer mobile web -->
    <div class="md:hidden flex items-center gap-4">
        @auth
            <a href="#" class="text-[#47703e] relative mt-1">
                <i class="bi bi-bell-fill text-2xl"></i>
                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
            </a>
        @endauth

        <button id="hamburger-btn" class="text-[#47703e] focus:outline-none mt-1">
            <i class="bi bi-list text-4xl"></i>
        </button>
    </div>

    <!-- navbar menu di mobile web -->
    <div id="mobile-menu" class="hidden md:hidden bg-[#47703e] w-full absolute left-0 top-full shadow-lg rounded-b-2xl">
        <div class="flex flex-col px-6 py-6 space-y-4 font-semibold text-white text-center">
            
            <a href="{{route('beranda')}}" class="rounded-full py-2 transition {{ request()->is('/') ? 'bg-white/20 border border-white/30' : 'hover:bg-white/10 border border-transparent' }}">Beranda</a>
            <a href="{{route('pasar-tani')}}" class="rounded-full py-2 transition {{ request()->is('pasar-tani*') ? 'bg-white/20 border border-white/30' : 'hover:bg-white/10 border border-transparent' }}">Pasar Tani</a>
            <a href="{{route('kabar-berita.index')}}" class="rounded-full py-2 transition {{ request()->is('kabar-berita*') ? 'bg-white/20 border border-white/30' : 'hover:bg-white/10 border border-transparent' }}">Kabar Berita</a>
            <a href="{{route('tentang-kami')}}" class="rounded-full py-2 transition {{ request()->is('tentang-kami*') ? 'bg-white/20 border border-white/30' : 'hover:bg-white/10 border border-transparent' }}">Tentang kami</a>
            
            <!-- icon notif dan profil -->
            @auth
                <hr class="border-white/20 my-2">
                <a href="#" class="hover:bg-white/10 rounded-full py-2 transition border border-transparent">Profil Saya</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-center text-red-300 hover:text-red-100 py-2 font-bold">Logout</button>
                </form>
            @endauth

            @guest
                <hr class="border-white/20 my-2">
                <a href="{{route('login')}}"
                    class="bg-white text-[#47703e] py-3 rounded-full font-bold hover:bg-gray-100 w-full text-center inline-block">Login
                    Akun</a>
            @endguest
        </div>
    </div>
</nav>

<script>
    document.getElementById('hamburger-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Dropdown Profil
    const profileBtn = document.getElementById('profile-btn');
    
    if(profileBtn) {
        
        // Kalau gambar profil diklik ada dropdown
        profileBtn.addEventListener('click', function(event) {
            event.stopPropagation();
            document.getElementById('profile-dropdown').classList.toggle('hidden');
        });
        window.addEventListener('click', function() {
            const dropdown = document.getElementById('profile-dropdown');
            if (!dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden'); 
            }
        });
    }
</script>
