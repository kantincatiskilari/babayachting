@extends('layouts.layout')

@section('title')
    <title>Tekneler</title>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.tekne-olustur') }}" class="btn btn-primary my-2">
            <i class="fas fa-plus m-1"></i>Oluştur
        </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tüm Tekneler</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tekne</th>
                                <th>Fiyat</th>
                                <th>Tip</th>
                                <th>Ticari Durum</th>
                                <th>Görüntülenme</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tekne</th>
                                <th>Fiyat</th>
                                <th>Tip</th>
                                <th>Ticari Durum</th>
                                <th>Görüntülenme</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($yachts as $yacht)
                                <tr>
                                    <td>{{ $yacht->id }}</td>
                                    <td>{{ $yacht->title }}</td>
                                    <td>{{ $yacht->price }}{{ $yacht->currency }}</td>
                                    <td>{{ $yacht->yachtType->type_name }}</td>
                                    <td>
                                        @if ($yacht->trading_status == 1)
                                            Satılık
                                        @elseif ($yacht->trading_status == 2)
                                            Kiralık
                                        @elseif ($yacht->trading_status == 3)
                                            Satıldı
                                        @endif
                                    </td>
                                    <td>{{ $yacht->view }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked_{{ $yacht->id }}"
                                                {{ $yacht->status == 1 ? 'checked' : '' }}
                                                data-type-id="{{ $yacht->id }}"
                                                onchange="updateYachtStatus({{ $yacht->id }}, this.checked ? 1 : 0)">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('tekne',['slug' => $yacht->seo_title])}}" class="btn btn-success btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.tekne-guncelle',['id' => $yacht->id])}}" class="btn btn-warning btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-circle deleteYachtBtn"
                                            data-delete-id="{{ $yacht->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

