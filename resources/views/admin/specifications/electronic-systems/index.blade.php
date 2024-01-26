@extends('layouts.layout')
@section('title')
    <title>Elektronik Sistemler</title>
@endsection

@section('content')
    <div class="container-fluid">
        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus m-1"></i>Oluştur
        </button>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Elektronik Sistem Oluştur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.elektronik-sistem-olustur') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Elektronik Sistem İsmi</label>
                                <input type="text" class="form-control" name="electronic_name">
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
                                <button type="submit" class="btn btn-primary" id="storeElectronicButton">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Elektronik Sistemler</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ad</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Özellik</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($systems as $system)
                                <tr>
                                    <td>{{ $system->id }}</td>
                                    <td>{{ $system->electronic_name }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked_{{ $system->id }}"
                                                {{ $system->status == 1 ? 'checked' : '' }}
                                                data-system-id="{{ $system->id }}"
                                                onchange="updateElectronicStatus({{ $system->id }}, this.checked ? 1 : 0)">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-circle"
                                            data-bs-target="#updateElectronicModal{{ $system->id }}"
                                            data-bs-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-circle deleteElectronicBtn"
                                            data-delete-id="{{ $system->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                    <!-- Update Modal -->
                                    <div class="modal fade" id="updateElectronicModal{{ $system->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Özellik Düzenle</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="updateElectronicForm">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $system->id }}">
                                                        <div class="mb-3">
                                                            <label class="form-label">Özellik İsmi</label>
                                                            <input type="text" class="form-control"
                                                                name="electronic_name"
                                                                value="{{ $system->electronic_name }}"
                                                                id="electronic_name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Kapat</button>
                                                            <button type="button" class="btn btn-primary"
                                                                id="updateElectronicButton">Gönder</button>
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
    <script src="{{ asset('backend/js/script.js') }}"></script>
@endsection
