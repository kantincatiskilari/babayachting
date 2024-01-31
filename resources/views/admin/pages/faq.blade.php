@extends('layouts.layout')
@section('title')
    <title>Sıkça Sorulan Sorular</title>
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
                        <h1 class="modal-title fs-5">S.S.S Oluştur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Soru</label>
                                <input type="text" class="form-control" name="question">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cevap</label>
                                <textarea name="answer" class="form-control"></textarea>
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
                                <button type="submit" class="btn btn-primary" id="storeFaqButton">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">S.S.S</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Soru</th>
                                <th>Cevap</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($FAQs as $FAQ)
                                <tr>
                                    <td>{{ $FAQ->id }}</td>
                                    <td>{{ $FAQ->question }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-circle"
                                            data-bs-target="#faqQuestionModal{{ $FAQ->id }}" data-bs-toggle="modal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Faq Question Modal -->
                                        <div class="modal fade" id="faqQuestionModal{{ $FAQ->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        Cevap
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$FAQ->answer}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked_{{ $FAQ->id }}"
                                                {{ $FAQ->status == 1 ? 'checked' : '' }}
                                                data-system-id="{{ $FAQ->id }}"
                                                onchange="updateFaqStatus({{ $FAQ->id }}, this.checked ? 1 : 0)">
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-circle deleteFaqBtn"
                                            data-delete-id="{{ $FAQ->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Özellik</th>
                                <th>Cevap</th>
                                <th>Durum</th>
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
