@extends('layouts.frontend.layout')
@section('title')
    Hakkımızda
@endsection


@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image position-relative">
            <img src="{{ asset('images/website-images') . '/' . $banner_image->image }}" alt="">
            <div class="position-absolute banner-text">HAKKIMIZDA</div>
        </div>
    </section>
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/website-images/'. $generalSettings->about_image)}}" alt="" style="width: 100%; height: 90%; object-fit:cover">
                </div>
                <div class="col-md-8">
                    {!!$about->about_text!!}
                </div>
            </div>
        </div>
    </section>
@endsection
