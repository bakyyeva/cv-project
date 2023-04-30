@extends('layouts.front')

@section('title')
    Portfolio
@endsection

@section('css')
@endsection

@section('content')
    <section class="portfolio-section">
        <h2 class="section-title">PORTFOLIO</h2>

        <div class="portfolio-wrapper">
            @foreach($portfolios as $portfolio)
{{--                @dd($portfolio->featureImage->image)--}}
                <a href="{{ route('front.portfolioDetail', ['id' => $portfolio->id]) }}">
                <figure class="portfolio-item hover-box">
                    <img src="{{ asset($portfolio->featureImage?->image) }}" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">{{ $portfolio->title }}</h5>
                        <p class="portfolio-item-description">{{ substr($portfolio->about, 0, 50) }}</p>
                    </figcaption>
                </a>
                </figure>
            @endforeach
        </div>

    </section>
@endsection

@section('js')
@endsection
