@extends('layouts.admin')

@section('title')
    Deneyim Bilgisi {{ isset($experience) ? 'Ekleme' : 'Güncelleme' }}
@endsection

@section('css')
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Deneyim Bilgisi
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Deneyim Bilgisi {{ isset($experience) ? 'Ekleme' : 'Güncelleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action="{{ isset($experience) ? route('experience.edit', ['id' => $experience->id]) : route('experience-create') }}"
                  method="POST"
                  class="forms-sample"
                  id="experienceForm">
                @csrf
                <div class="form-group">
                    <label for="profession">Meslek</label>
                    <input type="text"
                           name="profession"
                           id="profession"
                           class="form-control"
                           placeholder="Meslek"
                           value="{{ isset($experience) ? $experience->profession : ''}}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="task">Görev</label>
                    <input type="text"
                           name="task"
                           id="task"
                           class="form-control"
                           placeholder="Görev"
                           value="{{ isset($experience) ? $experience->task : '' }}"
                           required
                    >
                </div>
                <div class="form-group">
                    <label for="description">Açıklama</label>
                    <input type="text"
                           name="description"
                           id="description"
                           class="form-control"
                           placeholder="Açıklama"
                           value="{{ isset($experience) ? $experience->description : '' }}"
                    >
                </div>
                <div class="form-group">
                    <label for="year">Yıl</label>
                    <input type="text"
                           name="year"
                           id="year"
                           class="form-control"
                           placeholder="Yıl"
                           value="{{ isset($experience) ? $experience->year : ''}}"
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
                           value="{{ isset($experience) ? $experience->order : '' }}"
                    >
                </div>
                <div class="form-check form-check-flat">
                    <label class="form-check-label">
                    <input type="checkbox" name="status" id="form-check-label" class="form-check-input"
                        {{ isset($experience) && $experience->status ? 'checked' : '' }} >
                        Deneyim Bilgisi Aktif Olsun mu?
                    </label>
                </div>
                <button type="button" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($experience) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script>

        let profession = $('#profession');
        let task = $('#task');
        let year = $('#year');

        $(document).ready(function(){

           $('#btnSave').click(function () {
               if (profession.val() == null || profession.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Mesklek Adı boş geçilemez.",
                       confirmButtonText: 'Tamam',
                       icon: "info",
                   });
               }
               else if (task.val() == null || task.val() === '')
               {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Görev adı boş geçilemez.",
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
               else {
                   $('#experienceForm').submit();
               }
           });

        });
    </script>
@endsection
