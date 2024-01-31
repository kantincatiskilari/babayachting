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
            @foreach ($yachts as $yacht)
                <a href="">
                    <div class="row mb-3">
                        <div class="col-9">
                            <div class="card yacht-card">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <img src="{{ asset('images/custom-images/') . '/' . $yacht->thumbnail_image }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $yacht->title }}</h5>
                                            <p class="card-text">{!! $yacht->description !!}</p>
                                            @foreach ($selectedSpecifications as $specification)
                                                @if ($specification->yacht_id == $yacht->id)
                                                    <div class="container d-flex justify-content-between px-5">
                                                        <div class="my-2 specification_key">
                                                            {{ $specification->specification->specification_name }}:</div>
                                                        <div class="my-2">{{ $specification->specification_value }}</div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </a>
            </div>
            @endforeach
            <div class="col-3"></div>
        </div>
    </section>
@endsection
