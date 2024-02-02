@extends('layouts.frontend.layout')
@section('title')
    {{ $yacht->title }}
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image position-relative">
            <img src="{{ asset('images/custom-images') . '/' . $yacht->banner_image }}" alt="">
            <div class="position-absolute banner-text">{{ $yacht->title }}</div>
        </div>
    </section>
    <section class="yacht-section mb-5">
        <div class="container">
            <div class="slider">
                @foreach ($yachtImages as $image)
                    <div class="slider-item">
                        <img src="{{ asset('images/custom-images/') . '/' . $image->image }}" alt=""
                            class="img-fluid w-100">
                    </div>
                @endforeach
            </div>
            <div class="row mt-3">
                <div class="col-9">
                    <div class="card mb-3">
                        <div class="container">
                            <div class="card-body">
                                <div class="card-upper d-flex justify-content-between">
                                    <div
                                        class="item-trading-status bg-danger text-white text-center py-2 px-2 rounded fw-bold">
                                        {{ $yacht->status == 1 ? 'SATILIK' : ($yacht->status == 2 ? 'KİRALIK' : 'SATILDI') }}
                                    </div>
                                    <div class="item-price bg-danger text-white text-center py-2 px-2 rounded fw-bold">
                                        {{ $yacht->price }}{{ $yacht->currency }}
                                    </div>
                                </div>
                                <div class="card-center my-3">
                                    <h3 class="card-item-title">{{ $yacht->title }}</h3>
                                    <div class="card-item-location">{{ $yacht->country }}</div>
                                </div>
                                <div class="card-bottom">
                                    <ul class="d-flex gap-3 p-0">
                                        @if ($yacht->is_recommended == 1)
                                            <li>
                                                <i class="fas fa-check"></i> Tavsiye Edilen Tekne
                                            </li>
                                        @endif
                                        <li>
                                            <i class="fas fa-eye"></i> 22
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-3">
                        <div class="container">
                            <div class="card-body">
                                <h3 class="text-center" style="color: teal">Tekne Detayları ve Özellikleri</h3>
                                <table>

                                    <tbody>
                                        @foreach ($technicalSpecifications as $specification)
                                            <tr>
                                                <td data-column="First Name">
                                                    {{ $specification->specification->specification_name }}</td>
                                                <td data-column="Last Name">{{ $specification->specification_value }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-3">
                        <div class="container">
                            <div class="card-body">
                                <h3 class="text-center" style="color: teal">Tekne Açıklaması</h3>
                                <div>{!! $yacht->description !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="container">
                            <div class="card-body">
                                <h3 class="text-center" style="color: teal">Elektronik Sistemler</h3>
                                <ul>
                                    @foreach ($electronicSystems as $system)
                                        <li style="font-weight:600; color:rgb(17, 29, 207)">
                                            <i class="fas fa-check"></i> {{$system->electronicSystem->electronic_name}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: "<i class='prev-slide fas fa-chevron-left'></i>",
                nextArrow: "<i class='next-slide fas fa-chevron-right'></i>"
            });

        });
    </script>
@endsection
