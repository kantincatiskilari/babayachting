@extends('layouts.frontend.layout')
@section('title')
    Anasayfa
@endsection

@section('content')
    <section class="banner_section mb-5">
        <div class="main-image">
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
            <section class="articles">
                @foreach ($recent_yachts as $recent_yacht)
                    <article>
                        <div class="article-wrapper position-relative">

                            <figure>
                                <img src="{{ asset('images/custom-images/') . '/' . $recent_yacht->thumbnail_image }}"
                                    alt="" />
                                <div class="trading-status bg-danger p-2 rounded">
                                    {{ $recent_yacht->status == 1 ? 'Satılık' : 'Kiralık' }}
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
                                <a href="#" class="read-more mt-3">
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
    </section>

    <section class="recommended-items mb-4">
        <div class="container title-container">
            <h3 class="items-title text-center">Önerilen Tekneler</h3>
            <h6 class="items-subtitle text-center">Önerilen tekneler aşağıda listelenmiştir.</h6>
        </div>
        <div class="container d-flex gap-4 flex-wrap">
            <section class="articles">
                @foreach ($suggested_yachts as $recent_yacht)
                    <article style="border: 1px solid rgb(187, 186, 186)">
                        <div class="article-wrapper position-relative">

                            <figure>
                                <img src="{{ asset('images/custom-images/') . '/' . $recent_yacht->thumbnail_image }}"
                                    alt="" />
                                <div class="trading-status bg-danger p-2 rounded">
                                    {{ $recent_yacht->status == 1 ? 'Satılık' : 'Kiralık' }}
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
                                <a href="#" class="read-more mt-3">
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
    </section>

    <section class="sold-items">
        <div class="container title-container">
            <h3 class="items-title text-center">Satılan Tekneler</h3>
            <h6 class="items-subtitle text-center">Satılan tekneler aşağıda listelenmiştir.</h6>
        </div>
        <div class="container d-flex gap-4 flex-wrap">
            <section class="articles">
                @foreach ($sold_yachts as $recent_yacht)
                    <article>
                        <div class="article-wrapper position-relative">

                            <figure>
                                <img src="{{ asset('images/custom-images/') . '/' . $recent_yacht->thumbnail_image }}"
                                    alt="" />
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
                                <a href="#" class="read-more mt-3">
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
    </section>
@endsection
