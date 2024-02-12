@extends('layouts.frontend.layout')
@section('title')
    {{ isset($seo_text) ? $seo_text->page_title : "Arama sonuçları" }}
@endsection

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
                <div class="col-lg-4 order-1 filter-wrapper py-5 mb-3">
                    <div class="container">
                        <h4 class="filter-title bg-danger text-white px-1 py-2 text-center fw-semibold rounded">FİLTRELE
                        </h4>
                        <form class="mt-4" action="{{ route('tekne-ara') }}" method="GET">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-primary fs-5">Aranacak Yat</label>
                                <input type="text" class="form-control" name="search_yacht" placeholder="Aranacak"
                                    value="{{ request('search_yacht') }}">

                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-primary fs-5">Tekne Tipi</label>
                                <select name="yacht_type" class="form-select">
                                    <option value="">Hepsi</option>
                                    @foreach ($yachtTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ request('yacht_type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->type_name }}
                                    @endforeach
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-primary fs-5">Ticari Durumu</label>
                                <select name="trading_status" class="form-select">
                                    <option value="">Hepsi</option>
                                    <option value="1" {{ request('trading_status') == 1 ? 'selected' : '' }}>Satılık
                                    </option>
                                    <option value="2" {{ request('trading_status') == 2 ? 'selected' : '' }}>Kiralık
                                    </option>
                                    <option value="3" {{ request('trading_status') == 3 ? 'selected' : '' }}>Satıldı
                                    </option>
                                </select>
                            </div>


                            <div class="mb-3 mt-4">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item mt-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed text-primary fw-semibold px-1 fs-5"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="true" aria-controls="flush-collapseOne">
                                                Elektronik Sistemler
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="p-3 accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                @foreach ($electronicSystems as $system)
                                                    <div class="d-flex gap-2">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $system->id }}" aria-label="..."
                                                            name="electronic_system[]"
                                                            {{ request()->filled('electronic_system') && in_array($system->id, request('electronic_system')) ? 'checked' : '' }}>
                                                        <label>{{ $system->electronic_name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning text-white py-2 fw-semibold w-100">ARA</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 col-12">
                    <div class="col-12 d-lg-flex d-none justify-content-between align-items-center border p-3 mb-3">
                        <div class="view d-flex gap-3">
                            <div class="border-end px-3" id="gridBtn">
                                <i class="fas fa-table-cells-large" style="font-size: 22px; cursor:pointer"></i>
                            </div>
                            <div style="font-size: 22px; cursor:pointer" id="listBtn">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                        <div class="filter">
                            <select class="form-select" id="tradingStatusSelect">
                                <option value="1" {{ $tradingStatus == 1 ? 'selected' : '' }}>Satılıklar</option>
                                <option value="2" {{ $tradingStatus == 2 ? 'selected' : '' }}>Kiralıklar</option>
                                <option value="3" {{ $tradingStatus == 3 ? 'selected' : '' }}>Satılanlar</option>
                                <option value="4" {{ $tradingStatus == 4 ? 'selected' : '' }}>Yeniden Eskiye
                                </option>
                                <option value="5" {{ $tradingStatus == 5 ? 'selected' : '' }}>Eskiden Yeniye
                                </option>
                                <option value="6" {{ $tradingStatus == 6 ? 'selected' : '' }}>Tavsiye Edilenler
                                </option>
                                <option value="7" {{ $tradingStatus == 7 ? 'selected' : '' }}>En Çok
                                    Görüntülenenler
                                </option>
                            </select>

                        </div>
                    </div>
                    @if ($yachts->isEmpty())
                        <div class="col-lg-12 mb-3">
                            <div class="alert alert-danger text-center fs-4 fw-semibold " role="alert">
                                Aradığınız kriterlere uygun tekne bulunamadı.
                            </div>
                        </div>
                    @else
                        @foreach ($yachts as $index => $yacht)
                            @if ($index % 2 == 0)
                                <div class="row mb-3">
                            @endif
                            <div class="yachts col-lg-6 col-12 mb-3">
                                <article style="border: 1px solid rgb(187, 186, 186)">
                                    <div class="article-wrapper position-relative">
                                        <div class="row">
                                            <div class="yacht-info">
                                                <figure>
                                                    <img src="{{ asset('images/custom-images/') . '/' . $yacht->thumbnail_image }}"
                                                        alt="" />
                                                    <div class="trading-status bg-danger p-2 rounded">
                                                        {{ $yacht->trading_status == 1 ? 'Satılık' : ($yacht->trading_status == 2 ? 'Kiralık' : 'Satıldı') }}
                                                    </div>
                                                    <li class="yacht_price">{{ $yacht->price }}{{ $yacht->currency }}
                                                </figure>
                                            </div>
                                            <div class="yacht-info">
                                                <div class="article-body">
                                                    <h2 class="text-center">{{ $yacht->title }}</h2>
                                                    <div class="card-body">
                                                        @foreach ($selectedSpecifications as $specification)
                                                            @if ($specification->yacht_id == $yacht->id)
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="my-2">
                                                                        {{ $specification->specification->specification_name }}:
                                                                    </div>
                                                                    <div class="my-2">
                                                                        {{ $specification->specification_value }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <a href="{{ route('tekne', ['slug' => $yacht->seo_title]) }}"
                                                        class="read-more mt-3">
                                                        Daha fazlası için <span class="sr-only">about
                                                            {{ $yacht->title }}</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @if ($index % 2 == 1 || $index == count($yachts) - 1)
                </div>
                @endif
                @endforeach
                @endif
            </div>

        </div>
        {{ $yachts->links('pagination.custom') }}

        </div>
    </section>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            // Sayfa yüklendiğinde varsayılan olarak gridBtn aktif olsun
            $("#gridBtn").addClass("text-danger");

            $("#gridBtn, #listBtn").on("click", function() {
                // Tüm butonlardan text-danger sınıfını kaldır
                $("#gridBtn, #listBtn").removeClass("text-danger");

                // Tıklanan butona text-danger sınıfını ekle
                $(this).addClass("text-danger");

                // Eğer gridBtn tıklanırsa, grid ile ilgili işlemleri yap
                if ($(this).attr("id") === "gridBtn") {
                    $(".yachts").addClass("col-lg-6");
                    $(".article-wrapper").removeClass("d-flex");
                    $(".yacht-info").removeClass('col-6');

                }
                // Eğer listBtn tıklanırsa, list ile ilgili işlemleri yap
                else if ($(this).attr("id") === "listBtn") {
                    $(".yachts").removeClass("col-lg-6");
                    $(".article-wrapper").addClass("d-flex");
                    $(".yacht-info").addClass('col-6');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Select değiştiğinde olayı dinle
            $("#tradingStatusSelect").on("change", function() {
                // Seçilen değeri al
                var selectedValue = $("#tradingStatusSelect").val();

                // URL'yi güncelle ve sorguyu ekleyerek sayfayı yenile
                var newUrl = window.location.origin + window.location.pathname + "?trading_status=" +
                    selectedValue;
                window.location.href = newUrl;
            });
        });
    </script>
@endsection
