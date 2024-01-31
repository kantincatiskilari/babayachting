@extends('layouts.layout')
@section('title')
    <title>İletişim</title>
@endsection

@section('content')
    <div class="container-fluid">




        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">İletişim</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Mail</th>
                                <th>Telefon</th>
                                <th>Mesaj</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->contact_name }}</td>

                                    <td>
                                        {{ $contact->contact_phone }}
                                    </td>
                                    <td>
                                        {{ $contact->contact_email }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-circle"
                                            data-bs-target="#messageModal{{ $contact->id }}" data-bs-toggle="modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Faq Question Modal -->
                                        <div class="modal fade" id="messageModal{{ $contact->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Mesaj
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $contact->contact_message }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-circle deleteContactBtn"
                                            data-delete-id="{{ $contact->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Mail</th>
                                <th>Telefon</th>
                                <th>Mesaj</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>

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
