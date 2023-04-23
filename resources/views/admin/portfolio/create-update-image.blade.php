@extends('layouts.admin')

@section('title')
    Portfolio Görseli {{ isset($portfolio) ? 'Güncelleme' : 'Ekleme' }}
@endsection

@section('css')
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Portfolio Görseli
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Portfolio Görseli  {{ isset($portfolio) ? 'Güncelleme' : 'Ekleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action="{{ isset($portfolio) ? route('portfolio-image.edit', ['id' => $portfolio->id]) : route('portfolio-image.create') }}"
                  method="POST"
                  class="forms-sample"
                  id="portfolioForm">
                @csrf
                <div class="form-group">
                    <label for="portfolio_id">Portfolio Seçin</label>
                    <select
                        class="form-select form-control form-control-solid-bordered m-b-sm"
                        name="portfolio_id"
                        id="portfolio_id"
                        required
                    >
                        <option value="{{ null }}">Portfolio Seçin</option>
                        @foreach($portfolios as $item)
                            <option value="{{ $item->id }}" {{ isset($portfolio) && $portfolio->portfolio_id == $item->id ? 'selected' : ""}}>
                                {{ $item->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label m-t-sm">Portfolio Görseli</label>
                    <div class="col-6">
                        <a href="javascript:void(0)" id="portfolioImage" data-input="portfolio-image" data-preview="portfolioImg" class="btn btn-primary w-100">
                            Portfolio Görseli
                        </a>
                        <input type="hidden" name="image" id="portfolio-image" value="{{ isset($portfolio) ? $portfolio->image : '' }}">
                    </div>
                    @if(isset($portfolio) && $portfolio->image)
                        <div class="col-6" id="portfolioImg">
                            <img src="{{ $portfolio->image }}" height="100">
                        </div>
                    @endif
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                        <input type="checkbox" name="feature_status" id="form-check-label" class="form-check-input"
                            {{ isset($portfolio) && $portfolio->feature_status ? 'checked' : '' }} >
                        Portfolio Görseli Öne çıkarılsın mı?
                    </label>
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                    <input type="checkbox" name="status" id="form-check-label" class="form-check-input"
                        {{ isset($portfolio) && $portfolio->status ? 'checked' : '' }} >
                        Portfolio Görseli Aktif Olsun mu?
                    </label>
                </div>
                <button type="button" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($portfolio) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>

        $('#portfolioImage').filemanager();

        let portfolio = $('#portfolio_id');

        $(document).ready(function(){

           $('#btnSave').click(function () {
               if (portfolio.val() == null || portfolio.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Portfolio Seçin",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else {
                   $('#portfolioForm').submit();
               }
           });

        });
    </script>
@endsection
