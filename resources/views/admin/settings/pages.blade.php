@extends('layouts.layout')

@section('title')
    <title>Sayfalar</title>
@endsection

@section('content')
    <div class="container-fluid">


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ekle
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('admin.sayfa-ekle')}}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Sayfa Ekle</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Sayfa adını girin.</label>
                                <input name="page_title" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sayfalar</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">

                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <form action="{{ route('admin.banner-resmi-guncelle', ['id' => $page->id]) }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <td>{{ $page->page_title }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked_{{ $page->id }}"
                                                        {{ $page->status == 1 ? 'checked' : '' }}
                                                        data-system-id="{{ $page->id }}"
                                                        onchange="updatePageStatus({{ $page->id }}, this.checked ? 1 : 0)">
                                                </div>
                                            </td>

                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
