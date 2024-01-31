@extends('layouts.frontend.layout')
@section('title')
    Sıkça Sorulan Sorular
@endsection


@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image position-relative">
            <img src="{{ asset('images/website-images') . '/' . $banner_image->image }}" alt="">
            <div class="position-absolute banner-text">S.S.S</div>
        </div>
    </section>
    <section class="faq-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        @foreach ($FAQs as $FAQ)
                            <div class="accordion-item my-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$FAQ->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$FAQ->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{$FAQ->id}}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$FAQ->answer}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <!--Bootstrap ve Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
