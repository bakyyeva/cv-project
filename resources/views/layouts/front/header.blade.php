<header>
    <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto"><img src="{{ asset('assets/front/assets/images/share.svg') }}" alt="share" class="btn-img">
        SHARE</button>
    <nav class="collapsible-nav" id="collapsible-nav">
        <a href="{{ route('front.index') }}" class="nav-link {{ Route::is('front.index') ? 'active' : '' }}">HOME</a>
        <a href="{{ route('front.resume') }}" class="nav-link {{ Route::is('front.resume') ? 'active' : '' }}">RESUME</a>
        <a href="{{ route('front.portfolios') }}" class="nav-link {{ Route::is('front.portfolios') ? 'active' : '' }}">PORTFOLIO</a>
        <a href="{{ route('front.blog') }}" class="nav-link {{ Route::is('front.blog') ? 'active' : '' }}">BLOG</a>
        <a href="{{ route('front.contact') }}" class="nav-link {{ Route::is('front.contact') ? 'active' : '' }}">CONTACT</a>
    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{ asset('assets/front/assets/images/hamburger.svg') }}" alt="hamburger"></button>
</header>
