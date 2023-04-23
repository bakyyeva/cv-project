@extends('layouts.admin')

@section('title')
    Portfolio Bilgisi {{ isset($portfolio) ? 'Güncelleme' : 'Ekleme' }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/plugins/summernote/summernote-lite.min.css') }}">
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Portfolio Bilgisi
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Portfolio Bilgisi {{ isset($portfolio) ? 'Güncelleme' : 'Ekleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action="{{ isset($portfolio) ? route('portfolio.edit', ['id' => $portfolio->id]) : route('portfolio.create') }}"
                  method="POST"
                  class="forms-sample"
                  id="portfolioForm">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           placeholder="Title"
                           value="{{ isset($portfolio) ? $portfolio->title : ''}}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="portfolio_about" class="form-label">Açıklama</label>
                    <textarea name="about" id="portfolio_about" class="m-b-sm">{!! isset($portfolio) ? $portfolio->about : "" !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="link">Web Site Linki</label>
                    <input type="text"
                           name="link"
                           id="link"
                           class="form-control"
                           placeholder="Web Site Linki"
                           value="{{ isset($portfolio) ? $portfolio->link : '' }}"
                    >
                </div>
                <div class="form-group">
                    <label for="order">Sıralama</label>
                    <input type="number"
                           name="order"
                           id="order"
                           class="form-control"
                           placeholder="Sıralama"
                           value="{{ isset($portfolio) ? $portfolio->order : '' }}"
                           required
                    >
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                    <input type="checkbox" name="status" id="form-check-label" class="form-check-input"
                        {{ isset($portfolio) && $portfolio->status ? 'checked' : '' }} >
                        Portfolio Aktif Olsun mu?
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
    <script src="{{ asset('assets/admin/assets/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/text-editor.js') }}"></script>
    <script>

        let title = $('#title');
        let order = $('#order');

        $(document).ready(function(){

           $('#btnSave').click(function () {
               if (title.val() == null || title.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Portfolio Başlığı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (order.val() == null || order.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Sıra numarası giriniz",
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
