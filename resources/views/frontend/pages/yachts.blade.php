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
                <div class="row mb-3">
                    <div class="col-9">
                        <div class="card yacht-card">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/custom-images/') . '/' . $yacht->thumbnail_image }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to
                                            additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
