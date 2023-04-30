@extends('layouts.admin')

@section('title')
    Sosyal Medya Bilgisi {{ isset($socialMedia) ? 'Ekleme' : 'Güncelleme' }}
@endsection

@section('css')
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Sosyal Medya Bilgisi
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Sosyal Medya Bilgisi {{ isset($socialMedia) ? 'Ekleme' : 'Güncelleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action="{{ isset($socialMedia) ? route('social-media.edit', ['id' => $socialMedia->id]) : route('social-media.create') }}"
                  method="POST"
                  class="forms-sample"
                  id="mediaForm">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           placeholder="Name"
                           value="{{ isset($socialMedia) ? $socialMedia->name : ''}}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text"
                           name="link"
                           id="link"
                           class="form-control"
                           placeholder="Link"
                           value="{{ isset($socialMedia) ? $socialMedia->link : '' }}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="text"
                           name="icon"
                           id="icon"
                           class="form-control"
                           placeholder="Icon"
                           value="{{ isset($socialMedia) ? $socialMedia->icon : '' }}"
                           required
                    >
                    <small><a href="https://fontawesome.com/v5/search" target="_blank">İcon bu siteden yükleyebilirsiniz</a></small>
                </div>
                <div class="form-group">
                    <label for="order">Sıralama</label>
                    <input type="number"
                           name="order"
                           id="order"
                           class="form-control"
                           placeholder="Sıralama"
                           value="{{ isset($socialMedia) ? $socialMedia->order : '' }}"
                           required
                    >
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                    <input type="checkbox" name="status" id="form-check-label" class="form-check-input"
                        {{ isset($socialMedia) && $socialMedia->status ? 'checked' : '' }} >
                        Beceri Bilgisi Aktif Olsun mu?
                    </label>
                </div>
                <button type="button" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($socialMedia) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script>

        let name = $('#name');
        let link = $('#link');
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
               else if (link.val() == null || link.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Açıklama alanı boş geçilemez.",
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
                   $('#mediaForm').submit();
               }
           });

        });
    </script>
@endsection
