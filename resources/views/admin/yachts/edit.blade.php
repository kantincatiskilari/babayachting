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
        <form id="updateForm" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Bilgi</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Başlık <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{ $yacht->title }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hangi Ülkede?<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="country" value="{{ $yacht->country }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ticari Durumu<span class="text-danger">*</span></label>
                                <select name="trading_status" class="form-select">
                                    <option value="1" {{ $yacht->trading_status == 1 ? 'selected' : '' }}>Satılık
                                    </option>
                                    <option value="2" {{ $yacht->trading_status == 2 ? 'selected' : '' }}>Kiralık
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ücreti<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="price" value="{{ $yacht->price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Para Birimi</label>
                                <select name="currency" class="form-select">
                                    <option value="₺" {{ $yacht->currency == '₺' ? 'selected' : '' }}>₺</option>
                                    <option value="$" {{ $yacht->currency == '$' ? 'selected' : '' }}>$</option>
                                    <option value="€" {{ $yacht->currency == '€' ? 'selected' : '' }}>€</option>
                                    <option value="£" {{ $yacht->currency == '£' ? 'selected' : '' }}>£</option>
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
                        <div class="mb-3">Seçili Banner Resmi:</div>
                        <img src="{{ asset('images/custom-images/' . $yacht->banner_image) }}" alt=""
                            style="width: 350px; height:180px; object-fit:cover">
                        <label class="mt-3" style="display: block">Banner Resmi <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="banner_image">
                        <hr>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">Seçili Kapak Resmi:</div>
                        <img src="{{ asset('images/custom-images/' . $yacht->thumbnail_image) }}" alt=""
                            style="width: 350px; height:180px; object-fit:cover">
                        <label class="mt-3" style="display: block">Kapak Resmi <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="thumbnail_image">
                        <hr>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">Seçili Slider Resimleri:</div>
                        @foreach ($yacht->yachtImages as $image)
                            <img class="my-2" src="{{ asset('images/custom-images/' . $image->image) }}" alt=""
                                style="width: 350px; height:180px; object-fit:cover; display:block">
                        @endforeach
                        <label class="mt-3" style="display: block">Slider Resimleri(Çoklu) <span
                                class="text-danger">*</span></label>
                        <input type="file" multiple class="form-control" name="slider_images[]">
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-secondary fs-3">Elektronik Sistemler</h6>
                </div>
                <div class="card-body">
                    @foreach ($electronicSystems as $key => $system)
                        <div>
                            <input value="{{ $system->id }}" type="checkbox" name="electronic_systems[]"
                                {{ $yacht->electronicSystems->contains('system_id', $system->id) ? 'checked' : '' }}>
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
                                <option value="{{ $type->id }}"
                                    {{ $yacht->yachtType->id == $type->id ? 'selected' : '' }}>{{ $type->type_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @foreach ($specifications as $specification)
                        <div class="col-md-6 form-group">
                            <label class="mx-1">{{ $specification->specification_name }}</label>
                            <input type="text" class="form-control" name="specifications[]"
                                value="{{ $yacht->specifications->contains('specification_id', $specification->id) ? $yacht->specifications->where('specification_id', $specification->id)->first()->specification_value : '' }}">
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
                    <textarea name="description" class="ckeditor">{{ $yacht->description }}</textarea>
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
                            <option value="0" {{ $yacht->is_recommended == 0 ? 'selected' : '' }}>Hayır</option>
                            <option value="1" {{ $yacht->is_recommended == 1 ? 'selected' : '' }}>Evet</option>
                        </select>
                    </div>
                    <div class=" col-6 form-group">
                        <label class="mx-1">Durum</label>
                        <select name="status"class="form-select">
                            <option value="1" {{ $yacht->status == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $yacht->status == 0 ? 'selected' : '' }}>İnaktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" id="yachtId" value="{{ $yacht->id }}">
            <button type="submit" class="btn btn-success" id="updateYachtButton">Gönder</button>

        </form>
    </div>
@endsection
@section('javascript')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
