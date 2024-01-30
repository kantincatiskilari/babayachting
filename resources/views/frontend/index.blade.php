@extends('layouts.frontend.layout')
@section('title')
    Anasayfa
@endsection

@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image">
            <img src="{{ asset('images/website-images') . '/' . $banner_image->image }}" alt="">
            <div class="banner-title">BABAYACHTING</div>
        </div>
    </section>

    <section class="current-items mb-5">
        <div class="container title-container">
            <h3 class="items-title mb-3 text-center">Güncel Tekneler</h3>
            <h6 class="items-subtitle text-center mb-3">En güncel tekneler aşağıda listelenmiştir.</h6>
        </div>
        <div class="container d-flex gap-4 flex-wrap">
            @foreach ($recent_yachts as $recent_yacht)
                <a href="">
                    <div class="card mb-3 position-relative">
                        <img style="width:100%; height:300px; object-fit:cover"
                            src="{{ asset('images/custom-images/') . '/' . $recent_yacht->thumbnail_image }}"
                            class="card-img-top" alt="...">
                        <div class="trading-status bg-danger p-2 rounded">
                            {{ $recent_yacht->status == 1 ? 'Satılık' : 'Kiralık' }}</div>

                        <ul class="list-group list-group-flush position-relative">
                            <li class="list-group-item text-center yacht_title">{{ $recent_yacht->title }}</li>
                            <li class="list-group-item yacht_price">{{ $recent_yacht->price }}{{ $recent_yacht->currency }}
                            </li>
                        </ul>
                        <div class="card-body">
                            @foreach ($selectedSpecifications as $specification)
                                @if ($specification->yacht_id == $recent_yacht->id)
                                    <div class="container d-flex justify-content-between px-5">
                                        <div class="my-2 specification_key">{{ $specification->specification->specification_name }}:</div>
                                        <div class="my-2">{{ $specification->specification_value }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="recommended-items">
        <div class="container title-container">
            <h3 class="items-title text-center">Önerilen Tekneler</h3>
            <h6 class="items-subtitle text-center">Önerilen tekneler aşağıda listelenmiştir.</h6>
        </div>
        <div class="container d-flex gap-4 flex-wrap">
            @foreach ($suggested_yachts as $recent_yacht)
                <div class="row">
                    <div class="col-md-4">
                        <a href="">
                            <div class="card mb-3 position-relative">
                                <img style="width:100%; height:300px; object-fit:cover"
                                    src="{{ asset('images/custom-images/') . '/' . $recent_yacht->thumbnail_image }}"
                                    class="card-img-top" alt="...">
                                <div class="trading-status bg-danger p-2 rounded">
                                    {{ $recent_yacht->status == 1 ? 'Satılık' : 'Kiralık' }}</div>

                                <ul class="list-group list-group-flush position-relative">
                                    <li class="list-group-item text-center yacht_title">{{ $recent_yacht->title }}</li>
                                    <li class="list-group-item yacht_price">
                                        {{ $recent_yacht->price }}{{ $recent_yacht->currency }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    @foreach ($selectedSpecifications as $specification)
                                        @if ($specification->yacht_id == $recent_yacht->id)
                                            <div class="container d-flex justify-content-between px-5">
                                                <div class="my-2 specification_key">
                                                    {{ $specification->specification->specification_name }}:</div>
                                                <div class="my-2">{{ $specification->specification_value }}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="sold-items">
        <div class="container title-container">
            <h3 class="items-title text-center">Satılan Tekneler</h3>
            <h6 class="items-subtitle text-center">Satılan tekneler aşağıda listelenmiştir.</h6>
        </div>
        <div class="container d-flex gap-4 flex-wrap">
            @foreach ($sold_yachts as $sold_yacht)
                <div class="row">
                    <div class="col-md-4">
                        <a href="">
                            <div class="card mb-3 position-relative">
                                <img style="width:100%; height:300px; object-fit:cover"
                                    src="{{ asset('images/custom-images/') . '/' . $sold_yacht->thumbnail_image }}"
                                    class="card-img-top" alt="...">
                                <div class="trading-status bg-danger p-2 rounded">
                                    Satıldı</div>

                                <ul class="list-group list-group-flush position-relative">
                                    <li class="list-group-item text-center yacht_title">{{ $sold_yacht->title }}</li>
                                    <li class="list-group-item yacht_price">
                                        {{ $sold_yacht->price }}{{ $sold_yacht->currency }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    @foreach ($selectedSpecifications as $specification)
                                        @if ($specification->yacht_id == $sold_yacht->id)
                                            <div class="container d-flex justify-content-between px-5">
                                                <div class="my-2 specification_key">
                                                    {{ $specification->specification->specification_name }}:</div>
                                                <div class="my-2">{{ $specification->specification_value }}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
