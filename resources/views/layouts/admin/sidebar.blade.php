<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('assets/admin/assets/images/faces/face8.jpg') }}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Uzuk Bakyyeva</p>
                    <p class="designation">Admin</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('admin.home') ? 'active' : '' }} " href="{{ route('admin.home') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#edu-link" aria-expanded="true" aria-controls="edu-link">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Eğitim Bilgileri</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('education-list') ||
                                    Route::is('education-create')
                                    ? 'show' : '' }}" id="edu-link" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('education-create') ? 'active' : '' }}" href="{{ route('education-create') }}">Eğitim Ekleme Güncelleme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('education-list') ? 'active' : '' }}" href="{{ route('education-list') }}">Eğitim Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#exp-link" aria-expanded="true" aria-controls="exp-link">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Deneyim Bilgileri</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('experience.index') ||
                                    Route::is('experience-create')
                                    ? 'show' : '' }}" id="exp-link" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('experience.index') }}">Deneyim Listesi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('experience-create') }}">Deneyim Ekleme Güncelleme</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#service-link" aria-expanded="true" aria-controls="service-link">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Beceri Bilgileri</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('service.index') ||
                                    Route::is('service.create')
                                    ? 'show' : '' }}" id="service-link" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('service.create') }}">Beceri Ekleme Güncelleme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('service.index') }}">Beceri Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#service-link" aria-expanded="true" aria-controls="service-link">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Sosyal Medya Yönetimi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('social-media.index') ||
                                    Route::is('social-media.create')
                                    ? 'show' : '' }}" id="service-link" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('social-media.create') }}">Sosyal Medya Ekleme Güncelleme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('social-media.index') }}">Sosyal Medya Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#service-link" aria-expanded="true" aria-controls="service-link">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Portfolio Yönetimi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('portfolio.index') ||
                                    Route::is('portfolio.create') ||
                                    Route::is('portfolio-image.index') ||
                                    Route::is('portfolio-image.create')
                                    ? 'show' : '' }}" id="service-link" style="">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.create') }}">Portfolio Ekleme Güncelleme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio.index') }}">Portfolio Listesi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio-image.create') }}">Portfolio Resim Ekleme Güncelleme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('portfolio-image.index') }}">Portfolio Resim Listesi</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>


