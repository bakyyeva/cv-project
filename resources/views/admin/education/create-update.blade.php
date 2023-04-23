@extends('layouts.admin')

@section('title')
    Eğitim Bilgisi {{ isset($education) ? 'Güncelleme' : 'Ekleme' }}
@endsection

@section('css')
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Eğitim Bilgisi
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Eğitim Bilgisi {{ isset($education) ? 'Güncelleme' : 'Ekleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action="{{ isset($education) ? route('education-edit', ['id' => $education->id]) : route('education-create') }}"
                  method="POST"
                  class="forms-sample"
                  id="educationForm">
                @csrf
                <div class="form-group">
                    <label for="unv_name">Üniversite Adı</label>
                    <input type="text"
                           name="unv_name"
                           id="unv_name"
                           class="form-control"
                           placeholder="Üniversite Adı"
                           value="{{ isset($education) ? $education->unv_name : ''}}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="degree">Degree</label>
                    <input type="text"
                           name="degree"
                           id="degree"
                           class="form-control"
                           placeholder="Degree"
                           value="{{ isset($education) ? $education->degree : '' }}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="branch">Bölüm</label>
                    <input type="text"
                           name="branch"
                           id="branch"
                           class="form-control"
                           placeholder="Bölüm"
                           value="{{ isset($education) ? $education->branch : '' }}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="year">Yıl</label>
                    <input type="text"
                           name="year"
                           id="year"
                           class="form-control"
                           placeholder="Yıl"
                           value="{{ isset($education) ? $education->year : ''}}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="order">Sıralama</label>
                    <input type="number"
                           name="order"
                           id="order"
                           class="form-control"
                           placeholder="Sıralama"
                           value="{{ isset($education) ? $education->order : '' }}"
                           required
                    >
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                    <input type="checkbox" name="status" id="form-check-label" class="form-check-input"
                        {{ isset($education) && $education->status ? 'checked' : '' }} >
                        Eğitim Bilgisi Aktif Olsun mu?
                    </label>
                </div>
                <button type="button" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($education) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script>

        let unvName = $('#unv_name');
        let degree = $('#degree');
        let branch = $('#branch');
        let year = $('#year');
        let order = $('#order');

        $(document).ready(function(){

           $('#btnSave').click(function () {
               if (unvName.val() == null || unvName.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Üniversite Adı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (degree.val() == null || degree.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Üniversite Degree boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (branch.val() == null || branch.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Bölüm alanı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (year.val() == null || year.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Yıl alanı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (order.val() == null || order.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Siralama alanı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else {
                   $('#educationForm').submit();
               }
           });

        });
    </script>
@endsection
