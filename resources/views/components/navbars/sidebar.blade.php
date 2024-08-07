<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-primary"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="{{ route('dashboard') }}">
            <svg width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="navbar-brand-img h-100">
                <rect x="12" y="8" width="40" height="48" rx="2" ry="2" fill="white" stroke="black" stroke-width="2"/>
                <line x1="12" y1="16" x2="52" y2="16" stroke="black" stroke-width="2"/>
                <line x1="12" y1="24" x2="52" y2="24" stroke="black" stroke-width="2"/>
                <line x1="12" y1="32" x2="52" y2="32" stroke="black" stroke-width="2"/>
                <line x1="12" y1="40" x2="52" y2="40" stroke="black" stroke-width="2"/>
                <line x1="12" y1="48" x2="52" y2="48" stroke="black" stroke-width="2"/>
                <line x1="16" y1="8" x2="16" y2="56" stroke="black" stroke-width="2"/>
                <line x1="48" y1="8" x2="48" y2="56" stroke="black" stroke-width="2"/>
                <line x1="8" y1="56" x2="56" y2="56" stroke="black" stroke-width="2"/>
                <path d="M24 8 L32 2 L40 8" fill="none" stroke="black" stroke-width="2"/>
            </svg>
            <span class="ms-2 font-weight-bold text-white">Eğitim Yönetim Sistemi</span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Kullanıcı Yönetimi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profilim</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-management' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('user-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kullanıcı Yönetimi</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Sayfalarım</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kontrol Paneli</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-table"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tablolar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'billing' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('billing') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <span class="nav-link-text ms-1">Faturalama</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'virtual-reality' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('virtual-reality') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-vr-cardboard"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sanal Gerçeklik</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'rtl' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('rtl') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-align-right"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sağdan Sola Metin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'notifications' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-bell"></i>
                    </div>
                    <span class="nav-link-text ms-1">Bildirimler</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Hesap Sayfaları</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'profile' ? ' active bg-gradient-info' : '' }}"
                    href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">Giriş Yap</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kayıt Ol</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
