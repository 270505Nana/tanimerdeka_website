<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>

    <!-- Sidebar Menu Area -->
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Tani Merdeka Section -->
            <li class="sidebar-menu-group-title">Tani Merdeka</li>
            <li>
                <a href="email.html">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Kelompok Tani</span>
                </a>
            </li>
            <li>
                <a href="chat-message.html">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Anggota Tani</span>
                </a>
            </li>
            <li>
                <a href="calendar-main.html">
                    <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                    <span>Saran & Masukan</span>
                </a>
            </li>

            <!-- Informasi dan Usaha Section -->
            <li class="sidebar-menu-group-title">Informasi dan Usaha</li>

            <!-- Kabar Berita Dropdown -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span>Kabar Berita</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.kabar-berita.index') }}">Kabar Berita</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.kabar-berita.create') }}">Add Berita</a>
                    </li>
                </ul>
            </li>

            <!-- Pusat Informasi -->
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Pusat Informasi</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.pusat-informasi.index') }}">
                            Daftar Informasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pusat-informasi.create') }}">
                            Tambah Informasi
                        </a>
                    </li>

                </ul>
            </li>

            <!-- Tentang Kami -->
            <li>
                <a href="{{ route('admin.tentang-kami.index') }}">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Tentang Kami</span>
                </a>
            </li>

            <!-- Bidang & Jenis Usaha -->
            <li>
                <a href="kanban.html">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Bidang & Jenis Usaha</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
