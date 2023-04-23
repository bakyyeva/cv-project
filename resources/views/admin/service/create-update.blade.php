@extends('layouts.admin')

@section('title')
    Beceri Bilgisi {{ isset($service) ? 'Güncelleme' : 'Ekleme' }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/plugins/summernote/summernote-lite.min.css') }}">
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Beceri Bilgisi
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Beceri Bilgisi {{ isset($service) ? 'Güncelleme' : 'Ekleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action="{{ isset($service) ? route('service.edit', ['id' => $service->id]) : route('service.create') }}"
                  method="POST"
                  class="forms-sample"
                  id="serviceForm">
                @csrf
                <div class="form-group">
                    <label for="name">Beceri</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           placeholder="Beceri"
                           value="{{ isset($service) ? $service->name : ''}}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="service_description" class="form-label">Açıklama</label>
                    <textarea name="description" id="service_description" class="m-b-sm">{!! isset($service) ? $service->description : "" !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="text"
                           name="icon"
                           id="icon"
                           class="form-control"
                           placeholder="Icon"
                           value="{{ isset($service) ? $service->icon : '' }}"
                           required
                    >
                    <small><a href="https://fontawesome.com/" target="_blank">İcon bu siteden yükleyebilirsiniz</a></small>
                </div>
                <div class="form-group">
                    <label for="order">Sıralama</label>
                    <input type="number"
                           name="order"
                           id="order"
                           class="form-control"
                           placeholder="Sıralama"
                           value="{{ isset($service) ? $service->order : '' }}"
                           required
                    >
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                    <input type="checkbox" name="status" id="form-check-label" class="form-check-input"
                        {{ isset($service) && $service->status ? 'checked' : '' }} >
                        Beceri Bilgisi Aktif Olsun mu?
                    </label>
                </div>
                <button type="button" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($service) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/assets/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/text-editor.js') }}"></script>

    <script>
        let name = $('#name');
        let icon = $('#icon');
        let order = $('#order');

        $(document).ready(function(){

           $('#btnSave').click(function () {
               if (name.val() == null || name.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Beceri adı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (icon.val() == null || icon.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Icon seçiniz.",
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
                   $('#serviceForm').submit();
               }
           });

        });
    </script>
@endsection
