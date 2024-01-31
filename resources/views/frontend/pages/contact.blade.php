@extends('layouts.frontend.layout')
@section('title')
    İletişim
@endsection


<link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">

@section('content')
    <section class="banner_section mb-5">
        <div class="banner-image position-relative">
            <img src="{{ asset('images/website-images') . '/' . $banner_image->image }}" alt="">
            <div class="position-absolute banner-text">İletişim</div>
        </div>
    </section>
    <section class="contact-section mb-5">
        <div class="container">
            <div class="content">
                <div class="left-side">
                    <div class="address details">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="topic">Addres</div>
                        <div class="text-one">{{ $user->address }}</div>
                    </div>
                    <div class="phone details">
                        <i class="fas fa-phone-alt"></i>
                        <div class="topic">Telefon</div>
                        <div class="text-one">{{ $user->tel_no }}</div>
                    </div>
                    <div class="email details">
                        <i class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-two">{{ $user->email }}</div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="topic-text">Bize ulaşın!</div>
                    <form id="messageForm">
                        @csrf
                        <div class="input-box">
                            <input type="text" placeholder="Adınız..." name="contact_name">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-box">
                                    <input type="text" placeholder="Mail adresiniz..." name="contact_email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-box">
                                    <input type="text" placeholder="Telefon numaranız..." name="contact_phone">
                                </div>
                            </div>
                        </div>

                        <div class="input-box message-box">
                            <textarea name="contact_message" id="" cols="30" rows="10" placeholder="Mesajınızı girin..."></textarea>
                        </div>
                        <div class="button">
                            <input type="button" value="Gönder" id="sendMessageButton">
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#sendMessageButton").click(function(e) {
                e.preventDefault();
                var formData = $("#messageForm").serialize();

                // updateType fonksiyonunu çağır
                storeMessage(formData);
                console.log(formData);
            });

            function storeMessage(formData) {

                $.ajax({
                    url: "/iletisim/gonder",
                    method: "POST",

                    data: formData,
                    success: function(response) {
                        toastr.success(response.success);
                        setTimeout(function() {
                            location.reload();
                        }, 3000)
                    },
                    error: function() {},
                });
            }
        });
    </script>
@endsection
