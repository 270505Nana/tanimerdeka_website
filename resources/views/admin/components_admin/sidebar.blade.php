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
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
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

            <li class="sidebar-menu-group-title">Informasi dan Usaha</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                    <span>Kabar Berita</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="blog.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Kabar Berita</a>
                    </li>
                    <li>
                        <a href="blog-details.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Detail Berita</a>
                    </li>
                    <li>
                        <a href="add-blog.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Add Berita</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="kanban.html">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Tentang Kami</span>
                </a>
            </li>
            <li>
                <a href="kanban.html">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Bidang & Jenis Usaha</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
