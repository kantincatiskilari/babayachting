@extends('layouts.frontend.layout')
@section('title')
    Gizlilik ve Politika
@endsection


@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image position-relative">
            <img src="{{ asset('images/website-images/'.$generalSettings->privacy_policy_image) }}" alt="">
            <div class="position-absolute banner-text">GİZLİLİK ve POLİTİKA</div>
        </div>
    </section>
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!!$privacy->privacy_policy_text!!}
                </div>
            </div>
        </div>
    </section>
@endsection
