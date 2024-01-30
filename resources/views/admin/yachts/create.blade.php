@extends('layouts.layout')

@section('title')
    <title>Tekne Oluştur</title>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.tekneler') }}" class="btn btn-primary my-2">
            <i class="fas fa-list m-1"></i>Tüm Tekneler
        </a>
        <!-- DataTales Example -->
        <form id="storeForm" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Bilgi</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Başlık <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hangi Ülkede?<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ticari Durumu<span class="text-danger">*</span></label>
                                <select name="trading_status" class="form-select">
                                    <option value="1">Satılık</option>
                                    <option value="2">Kiralık</option>
                                    <option value="3">Satıldı</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ücreti<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Para Birimi</label>
                                <select name="currency" class="form-select">
                                    <option value="₺">₺</option>
                                    <option value="$">$</option>
                                    <option value="€">€</option>
                                    <option value="£">£</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Resimler</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Banner Resmi <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="banner_image">
                    </div>
                    <div class="form-group">
                        <label>Kapak Resmi <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="thumbnail_image">
                    </div>
                    <div class="form-group">
                        <label>Slider Resimleri(Çoklu) <span class="text-danger">*</span></label>
                        <input type="file" multiple class="form-control" name="slider_images[]">
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Elektronik Sistemler</h6>
                </div>
                <div class="card-body">
                    @foreach ($electronicSystems as $system)
                        <div>
                            <input value="{{ $system->id }}" type="checkbox" name="electronic_systems[]">
                            <label class="mx-1" for="alarm">{{ $system->electronic_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Teknik Özellikler</h6>
                </div>
                <div class="card-body">
                    <div class="col-md-6 form-group">
                        <label>Tekne Tipi</label>
                        <select name="yacht_type_id" class="form-select">
                            @foreach ($yachtTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @foreach ($specifications as $specification)
                        <div class="col-md-6 form-group">
                            <label class="mx-1">{{ $specification->specification_name }}</label>
                            <input type="text" class="form-control" name="specifications[]">
                            <input type="hidden" name="specification_ids[]" value="{{ $specification->id }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Tekne Açıklama</h6>
                </div>
                <div class="card-body">
                    <textarea name="description" class="ckeditor"></textarea>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Son Dokunuşlar</h6>
                </div>
                <div class="card-body">
                    <div class=" col-6 form-group">
                        <label class="mx-1">Tavsiye edilen tekne mi?</label>
                        <select name="is_recommended"class="form-select">
                            <option value="0">Hayır</option>
                            <option value="1">Evet</option>
                        </select>
                    </div>
                    <div class=" col-6 form-group">
                        <label class="mx-1">Durum</label>
                        <select name="status"class="form-select">
                            <option value="1">Aktif</option>
                            <option value="0">İnaktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="storeYachtButton">Gönder</button>

        </form>
    </div>
@endsection
@section('javascript')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
