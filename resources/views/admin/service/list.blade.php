@extends('layouts.admin')

@section('title')
    Beceri Bilgileri
@endsection

@section('css')

@endsection

@section('content')
    <x-admin.page-header>
        <x-slot:title>Beceri Bilgileri</x-slot:title>
    </x-admin.page-header>

    <x-bootstrap.card>
        <x-slot:header>
            Beceri Bilgileri Listesi
        </x-slot:header>
        <x-slot:body>
            <x-bootstrap.table
            :class="'table-hover table-responsive'"
            :is-responsive="1"
            >
                <x-slot:columns>
                    <th scope="col">Name</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Sıra</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </x-slot:columns>
                <x-slot:rows>
                    @foreach($services as $service)
                        <tr id="row-{{ $service->id }}">
                            <td>{{ $service->name }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button"
                                        class="btn btn-primary lookDescription"
                                        data-desc="{{ $service->description }}"
                                        data-toggle="modal"
                                        data-target="#description">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>
                            <td>{{ $service->icon }}</td>
                            <td>{{ $service->order }}</td>
                            <td>
                                @if($service->status)
                                    <a href="javascript:void(0)" data-id="{{ $service->id }}" class="btn btn-success btnChangeStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{ $service->id }}" class="btn btn-danger btnChangeStatus">Pasif</a>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-content-between">
                                    <a href="{{ route('service.edit', ['id' => $service->id]) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                    class="btn btn-danger btn-sm btnDelete"
                                    data-id="{{ $service->id }}"
                                    data-name="{{ $service->name }}" >
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

    <!-- Modal -->
    <div class="modal fade" id="description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beceri Açıklaması</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.btnDelete').click(function () {
               let id = $(this).data('id');
               let serviceName = $(this).data('name');

                Swal.fire({
                    title: serviceName + "'ni silmek istediğinize emin misiniz?",
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
                            url: "{{ route('service.delete') }}",
                            data: {
                                '_method': 'DELETE',
                                 id: id
                            },
                            async: false,
                            success: function (data) {
                                $('#row-' + id).remove();
                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Bilgiler Silindi",
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
                           url: "{{ route('service.change-status') }}",
                            data: {
                                '_method': 'PATCH',
                                id: id
                            },
                            async: false,
                            success: function (data) {
                               if (data.service_status)
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

            $('.lookDescription').click(function () {
                let desc = $(this).data('desc');
                $('#modalBody').html(desc);
            });


        });
    </script>
@endsection
