@extends('layouts.admin')

@section('title')
    Kişisel Bilgi {{ isset($data) ? 'Ekleme' : 'Güncelleme' }}
@endsection

@section('css')
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
                  class="forms-sample"
                  id="personForm">
                @csrf

                <button type="button" class="btn btn-success mr-2" id="btnSave">
                    {{ isset($data) ? 'Güncelle' : 'Kaydet' }}
                </button>
            </form>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
@endsection
