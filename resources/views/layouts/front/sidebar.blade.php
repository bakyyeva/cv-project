<aside>
    <div class="profile-img-wrapper">
        <img src="{{ asset($data->image) }}" alt="profile">
    </div>
    <h1 class="profile-name">{{ $data->full_name }}</h1>
    <div class="text-center">
        <span class="badge badge-white badge-pill profile-designation">{{ $data->profession }}</span>
    </div>
    <nav class="social-links">
        @foreach($socialMedia as $item)
            <a href="{{ $item->link }}" target="_blank" class="social-link"> <i class="{{ $item->icon }}"></i> </a>
        @endforeach
    </nav>
    <div class="widget">
        <h5 class="widget-title">KİŞİSEL BİLGİLER</h5>
        <div class="widget-content">
            <p>DOĞUM TARİH : {{ $data->format_birthday }}</p>
            <p>WEBSİTE : {{ $data->website }}</p>
            <p>TELEFON : {{ $data->phone }}</p>
            <p>MAİL : {{ $data->email }}</p>
            <p>ADRES : {{ $data->address }}</p>
                <a href="{{ asset($data->cv) }}" class="btn btn-download-cv btn-primary rounded-pill">
                <img src="{{ asset('assets/front/assets/images/download.svg') }}" alt="download"
                                                                               class="btn-img">DOWNLOAD CV
                </a>
        </div>
    </div>
    <div class="widget card">
        <div class="card-body">
            <div class="widget-content">
                <h5 class="widget-title card-title">DİLLER</h5>
                {!! $data->languages !!}
            </div>
        </div>
    </div>
    <div class="widget card">
        <div class="card-body">
            <div class="widget-content">
                <h5 class="widget-title card-title">İLGİ ALANLAR</h5>
                {!! $data->interests !!}
            </div>
        </div>
    </div>
</aside>
