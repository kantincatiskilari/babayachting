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
                <div class="col-lg-8 col-md-12">
                    <div class="card mb-3">
                        <div class="container">
                            <div class="card-body">
                                <div class="card-upper d-flex justify-content-between">
                                    <div
                                        class="item-trading-status bg-danger text-white text-center py-2 px-2 rounded fw-bold">
                                        {{ $yacht->trading_status == 1 ? 'SATILIK' : ($yacht->trading_status == 2 ? 'KİRALIK' : 'SATILDI') }}

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
                                            <i class="fas fa-eye"></i> {{ $yacht->view }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-3">
                        <div class="container">
                            <div class="card-body d-flex justify-content-center flex-column">
                                <h3 class="text-center" style="color: teal">Tekne Detayları ve Özellikleri</h3>
                                <table class="mt-3">
                                    <tbody class="text-center">
                                        @foreach ($technicalSpecifications as $specification)
                                            <tr>
                                                <td>{{ $specification->specification->specification_name }}</td>
                                                <td>{{ $specification->specification_value }}</td>
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
                                            <i class="fas fa-check"></i> {{ $system->electronicSystem->electronic_name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <section class="articles">
                        <h3 class="text-center" style="color: rgb(16, 2, 66)">TAVSİYE ETTİKLERİMİZ</h3>
                        @foreach ($recommendedYachts as $recent_yacht)
                            <article>
                                <div class="article-wrapper position-relative">
                                    <figure>
                                        <img src="{{ asset('images/custom-images/') . '/' . $recent_yacht->thumbnail_image }}"
                                            alt="" class="img-fluid" />
                                        <div class="trading-status bg-danger p-2 rounded">
                                            {{ $recent_yacht->trading_status == 1 ? 'Satılık' : ($recent_yacht->trading_status == 2 ? 'Kiralık' : 'Satıldı') }}
                                        </div>
                                        <li class="yacht_price">{{ $recent_yacht->price }}{{ $recent_yacht->currency }}
                                    </figure>

                                    <div class="article-body">
                                        <h2 class="text-center">{{ $recent_yacht->title }}</h2>
                                        <div class="card-body">
                                            @foreach ($selectedSpecifications as $specification)
                                                @if ($specification->yacht_id == $recent_yacht->id)
                                                    <div class="d-flex justify-content-between">
                                                        <div class="my-2">
                                                            {{ $specification->specification->specification_name }}:</div>
                                                        <div class="my-2">{{ $specification->specification_value }}</div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <a href="{{ route('tekne', ['slug' => $recent_yacht->seo_title]) }}"
                                            class="read-more mt-3">
                                            Daha fazlası için <span class="sr-only">about {{ $recent_yacht->title }}</span>
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
                        @endforeach
                    </section>
                </div>
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
