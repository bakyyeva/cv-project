@extends('layouts.admin')

@section('title')
    Kişisel Bilgi {{ isset($data) ? 'Ekleme' : 'Güncelleme' }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/plugins/summernote/summernote-lite.min.css') }}">
@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>
            Kişisel Bilgi
        </x-slot:title>
    </x-admin.page-header>
    <x-bootstrap.card>
        <x-slot:header>
            Kişisel Bilgi {{ isset($data) ? 'Ekleme' : 'Güncelleme' }}
        </x-slot:header>
        <x-slot:body>
            <x-errors.display-error />
            <form action=""
                  method="POST"
                  class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="full_name">Ad Soyad</label>
                    <input type="text"
                           name="full_name"
                           id="full_name"
                           class="form-control"
                           placeholder="Ad Soyad"
                           value="{{ isset($data) ? $data->full_name : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="about" class="form-label">Hakkımda</label>
                    <textarea name="about" id="about" class="m-b-sm">{!! isset($data) ? $data->about : "" !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="languages" class="form-label">Diller</label>
                    <textarea name="languages" id="languages" class="m-b-sm">{!! isset($data) ? $data->languages : "" !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="interests" class="form-label">İlgi Alanlar</label>
                    <textarea name="interests" id="interests" class="m-b-sm">{!! isset($data) ? $data->interests : "" !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="profession">Meslek</label>
                    <input type="text"
                           name="profession"
                           id="profession"
                           class="form-control"
                           placeholder="Meslek"
                           value="{{ isset($data) ? $data->profession : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="birthday">Doğum Gün</label>
                    <input type="text"
                           name="birthday"
                           id="birthday"
                           class="form-control"
                           placeholder="Doğum Gün"
                           value="{{ isset($data) ? $data->birthday : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="website">Web Site</label>
                    <input type="text"
                           name="website"
                           id="website"
                           class="form-control"
                           placeholder="Web Site"
                           value="{{ isset($data) ? $data->website : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text"
                           name="phone"
                           id="phone"
                           class="form-control"
                           placeholder="Telefon"
                           value="{{ isset($data) ? $data->phone : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           placeholder="Email"
                           value="{{ isset($data) ? $data->email : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text"
                           name="address"
                           id="address"
                           class="form-control"
                           placeholder="Adres"
                           value="{{ isset($data) ? $data->address : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="main_title">Main Title</label>
                    <input type="text"
                           name="main_title"
                           id="main_title"
                           class="form-control"
                           placeholder="Main Title"
                           value="{{ isset($data) ? $data->main_title : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="btn_contact_text">Buton Text</label>
                    <input type="text"
                           name="btn_contact_text"
                           id="btn_contact_text"
                           class="form-control"
                           placeholder="Buton Text"
                           value="{{ isset($data) ? $data->btn_contact_text : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="btn_contact_link">Buton Link</label>
                    <input type="text"
                           name="btn_contact_link"
                           id="btn_contact_link"
                           class="form-control"
                           placeholder="Buton Link"
                           value="{{ isset($data) ? $data->btn_contact_link : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="sub_title_left">Sol Alt Başlık</label>
                    <input type="text"
                           name="sub_title_left"
                           id="sub_title_left"
                           class="form-control"
                           placeholder="Sol Alt Başlık"
                           value="{{ isset($data) ? $data->sub_title_left : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="small_title_left">Sol Alt Başlık Açıklama</label>
                    <input type="text"
                           name="small_title_left"
                           id="small_title_left"
                           class="form-control"
                           placeholder="Sol Alt Başlık Açıklama"
                           value="{{ isset($data) ? $data->small_title_left : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="sub_title_right">Sağ Alt Başlık</label>
                    <input type="text"
                           name="sub_title_right"
                           id="sub_title_right"
                           class="form-control"
                           placeholder="Sağ Alt Başlık"
                           value="{{ isset($data) ? $data->sub_title_right : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="small_title_right">Sağ Alt Başlık Açıklama</label>
                    <input type="text"
                           name="small_title_right"
                           id="small_title_right"
                           class="form-control"
                           placeholder="Sağ Alt Başlık Açıklama"
                           value="{{ isset($data) ? $data->small_title_right : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="sub_title_bottom">Alt Başlık</label>
                    <input type="text"
                           name="sub_title_bottom"
                           id="sub_title_bottom"
                           class="form-control"
                           placeholder="Alt Başlık"
                           value="{{ isset($data) ? $data->sub_title_bottom : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="small_title_bottom">Alt Başlık Açıklama</label>
                    <input type="text"
                           name="small_title_bottom"
                           id="small_title_bottom"
                           class="form-control"
                           placeholder="Alt Başlık Açıklama"
                           value="{{ isset($data) ? $data->small_title_bottom : ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="image" class="form-label m-t-sm">Profil Resim</label>
                    <div class="col-6">
                        <a href="javascript:void(0)" id="profileImage" data-input="profile-image" data-preview="profileImg" class="btn btn-primary w-100">
                            Profil Resim
                        </a>
                        <input type="hidden" name="image" id="profile-image" value="{{ isset($data) ? $data->image : '' }}">
                    </div>
                    @if(isset($data) && $data->image)
                        <div class="col-6" id="profileImg">
                            <img src="{{ $data->image }}" height="100">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cv" class="form-label m-t-sm">Cv</label>
                    <input type="file" name="cv" id="cv" class="form-control">
                </div>
                <button type="submit" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($data) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/assets/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/text-editor.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#profileImage').filemanager()
    </script>
@endsection
