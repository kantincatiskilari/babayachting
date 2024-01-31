@extends('layouts.frontend.layout')
@section('title')
    Tekneler
@endsection

<link rel="stylesheet" href="{{ asset('frontend/css/card.css') }}">
@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image position-relative">
            <img src="{{ asset('images/website-images') . '/' . $banner_image->image }}" alt="">
            <div class="position-absolute banner-text">TEKNELER</div>
        </div>
    </section>
    <section class="yacht-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Tekne Türleri</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($yachtCountsByType as $type)
                                <li class="mb-1"><a href="#"
                                        class="d-flex"><span>{{ $type->yachtType->type_name }}</span> <span
                                            class="text-black ml-auto">({{ $type->count }})</span></a></li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Fiyata Göre Filtrele</h3>
                            <div id="slider-range"
                                class="border-primary ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;">
                                </div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                    style="left: 15%;"></span><span tabindex="0"
                                    class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span>
                            </div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                disabled="">
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                            <label for="s_sm" class="d-flex">
                                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small
                                    (2,319)</span>
                            </label>
                            <label for="s_md" class="d-flex">
                                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium
                                    (1,282)</span>
                            </label>
                            <label for="s_lg" class="d-flex">
                                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large
                                    (1,392)</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span
                                    class="text-black">Red (2,429)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span
                                    class="text-black">Green (2,298)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span
                                    class="text-black">Blue (1,075)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span
                                    class="text-black">Purple (1,075)</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-9">
                    <div class="col-12 d-flex justify-content-between align-items-center border p-3 mb-3">
                        <div class="view d-flex gap-3">
                            <div class="border-end px-3">
                                <i class="fas fa-table-cells-large" style="font-size: 22px"></i>
                            </div>
                            <div style="font-size: 22px">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                        <div class="filter">
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Satılıklar</option>
                                <option value="2">Kiralıklar</option>
                                <option value="3">Satılanlar</option>
                                <option value="3">Yeniden Eskiye</option>
                                <option value="3">Eskiden Yeniye</option>
                                <option value="3">Tavsiye Edilenler</option>
                                <option value="3">En Çok Görüntülenenler</option>
                            </select>
                        </div>
                    </div>
                    @foreach ($yachts as $index => $yacht)
                        @if ($index % 2 == 0)
                            <div class="row mb-3">
                        @endif

                        <div class="col-6">
                            <article style="border: 1px solid rgb(187, 186, 186)">
                                <div class="article-wrapper position-relative">

                                    <figure>
                                        <img src="{{ asset('images/custom-images/') . '/' . $yacht->thumbnail_image }}"
                                            alt="" />
                                        <div class="trading-status bg-danger p-2 rounded">
                                            {{ $yacht->status == 1 ? 'Satılık' : 'Kiralık' }}
                                        </div>
                                        <li class="yacht_price">{{ $yacht->price }}{{ $yacht->currency }}
                                    </figure>

                                    <div class="article-body">
                                        <h2 class="text-center">{{ $yacht->title }}</h2>
                                        <div class="card-body">
                                            @foreach ($selectedSpecifications as $specification)
                                                @if ($specification->yacht_id == $yacht->id)
                                                    <div class="d-flex justify-content-between">
                                                        <div class="my-2">
                                                            {{ $specification->specification->specification_name }}:</div>
                                                        <div class="my-2">{{ $specification->specification_value }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <a href="#" class="read-more mt-3">
                                            Daha fazlası için <span class="sr-only">about {{ $yacht->title }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>

                        @if ($index % 2 == 1 || $index == count($yachts) - 1)
                </div>
                @endif
                @endforeach
            </div>

        </div>
        </div>
    </section>
@endsection
