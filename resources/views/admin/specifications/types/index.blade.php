@extends('layouts.layout')
@section('title')
    <title>Tekne Tipleri</title>
@endsection

@section('content')
    <div class="container-fluid">
        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus m-1"></i>Oluştur
        </button>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tip Oluştur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Tip İsmi</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="type_name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Durum</label>
                                <select class="form-select" name="status">
                                    <option value="1">Aktif</option>
                                    <option value="0">İnaktif</option>
                                </select>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                <button type="submit" class="btn btn-primary" id="storeTypeButton">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tekne Tipleri</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-border-bottom" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tip</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tip</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked_{{ $type->id }}"
                                                {{ $type->status == 1 ? 'checked' : '' }} data-type-id="{{ $type->id }}"
                                                onchange="updateTypeStatus({{ $type->id }}, this.checked ? 1 : 0)">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-circle"
                                            data-bs-target="#updateTypeModal{{ $type->id }}" data-bs-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-circle deleteTypeBtn"
                                            data-delete-id="{{ $type->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                    <!-- Update Modal -->
                                    <div class="modal fade" id="updateTypeModal{{ $type->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tipi Düzenle</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="updateTypeForm">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $type->id }}">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tip İsmi</label>
                                                            <input type="text" class="form-control" name="type_name"
                                                                value="{{ $type->type_name }}" id="type_name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Kapat</button>
                                                            <button type="button" class="btn btn-primary"
                                                                id="updateTypeButton">Gönder</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('javascript')
    <script src="{{asset('backend/js/script.js')}}"></script>
@endsection
