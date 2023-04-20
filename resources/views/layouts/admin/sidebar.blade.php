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
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="true" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Eğitim Bilgileri</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('education-list') ||
                                    Route::is('education-create')
                                    ? 'show' : '' }}" id="ui-basic" style="">
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
    </ul>
</nav>


