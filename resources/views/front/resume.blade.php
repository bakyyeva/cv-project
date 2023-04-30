@extends('layouts.front')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <section class="resume-section">
        <div class="row">
            <div class="col-lg-6">
                <h6 class="section-subtitle">{{ $data->small_title_left }}</h6>
                <h2 class="section-title">{{ $data->sub_title_left }}</h2>
                <ul class="time-line">
                    @foreach($educations as $education)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{ $education->year }}</span>
                            <h6 class="time-line-item-title">{{ $education->degree }}</h6>
                            <p class="time-line-item-subtitle">{{ $education->unv_name }}</p>
                            <p class="time-line-item-content">{{ $education->branch }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <h6 class="section-subtitle">{{ $data->small_title_right }}</h6>
                <h2 class="section-title">{{ $data->sub_title_right }}</h2>
                <ul class="time-line">
                    @foreach($experiences as $experience)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{ $experience->year }}</span>
                            <h6 class="time-line-item-title">{{ $experience->profession }}</h6>
                            <p class="time-line-item-subtitle">{{ $experience->task }}</p>
                            <p class="time-line-item-content">{!! $experience->description !!}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <section class="services-section">
        <h6 class="section-subtitle">{{ $data->small_title_bottom }}</h6>
        <h2 class="section-title">{{ $data->sub_title_bottom }}</h2>
        <div class="row">
            @foreach($services as $service)
                <div class="media service-card col-lg-6">
                    <div class="service-icon">
                        <i class="{{ $service->icon }}"></i>
                        {{--                        <img src="assets/images/001-target.svg" alt="target">--}}
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">{{ $service->name }}</h5>
                        <p class="service-description">{!! $service->description !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('js')
@endsection
