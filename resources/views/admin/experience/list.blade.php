@extends('layouts.admin')

@section('title')
    Deneyim Bilgileri
@endsection

@section('css')

@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>Deneyim Bilgileri</x-slot:title>
    </x-admin.page-header>

    <x-bootstrap.card>
        <x-slot:header>
            Deneyim Bilgileri Listesi
        </x-slot:header>
        <x-slot:body>
            <x-bootstrap.table
            :class="'table-hover table-responsive'"
            :is-responsive="1"
            >
                <x-slot:columns>
                    <th scope="col">Meslek</th>
                    <th scope="col">Görev</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Yıl</th>
                    <th scope="col">Sıra</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </x-slot:columns>
                <x-slot:rows>
                    @foreach($experiences as $experience)
                        <tr id="row-{{ $experience->id }}">
                            <td>{{ $experience->profession }}</td>
                            <td>{{ $experience->task }}</td>
                            <td>{{ $experience->description }}</td>
                            <td>{{ $experience->year }}</td>
                            <td>{{ $experience->order }}</td>
                            <td>
                                @if($experience->status)
                                    <a href="javascript:void(0)" data-id="{{ $experience->id }}" class="btn btn-success btnChangeStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{ $experience->id }}" class="btn btn-danger btnChangeStatus">Pasif</a>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-content-between">
                                    <a href="{{ route('experience.edit', ['id' => $experience->id]) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                    class="btn btn-danger btn-sm btnDelete"
                                    data-id="{{ $experience->id }}"
                                    data-name="{{ $experience->profession }}" >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-bootstrap.table>
        </x-slot:body>
    </x-bootstrap.card>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.btnDelete').click(function () {
               let id = $(this).data('id');
               let profName = $(this).data('name');

                Swal.fire({
                    title: profName + "'ni silmek istediğinize emin misiniz?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: 'Hayır',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'POST',
                            url: "{{ route('experience.delete') }}",
                            data: {
                                '_method': 'DELETE',
                                 id: id
                            },
                            async: false,
                            success: function (data) {
                                $('#row-' + id).remove();
                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Deneyim Bilgisi Silindi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function () {
                                console.log('işlem başarısız');
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })
            });

            $('.btnChangeStatus').click(function () {
               let id = $(this).data('id');
               let self = $(this);

                Swal.fire({
                    title: 'Status değiştirmek istediğinzden emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: 'Hayır',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $.ajax({
                           method: 'POST',
                           url: "{{ route('experiences.change-status') }}",
                            data: {
                                '_method': 'PATCH',
                                id: id
                            },
                            async: false,
                            success: function (data) {
                               if (data.profStatus)
                               {
                                    self.removeClass('btn-danger');
                                    self.addClass('btn-success');
                                    self.text('Aktif');
                               }
                               else
                               {
                                   self.removeClass('btn-success');
                                   self.addClass('btn-danger');
                                   self.text('Pasif');
                               }

                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Status değer güncellendi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function () {
                                console.log('işlem başarısız');
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire({
                            title: 'Bilgi',
                            text: 'Herhangi bir işlem yapılmadı',
                            confirmButtonText: 'Tamam',
                            icon: 'info'
                        });
                    }
                })

            });


        });
    </script>
@endsection
