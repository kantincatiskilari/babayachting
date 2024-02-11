@include('layouts.frontend.header')
@yield('content')
<button onclick="scrollTopFunction()" id="scrollToTopBtn" title="Sayfanın en başına dön">
    <i class="fas fa-chevron-up"></i>
</button>

<div class="social-media-icons">
    <div class="social-media-icon">
        <a href="https://wa.me/905321760843" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <div class="social-media-icon">
        <a href="mailto:babayachting@gmail.com">
            <i class="far fa-envelope"></i>
        </a>
    </div>
    <div class="social-media-icon">
        <a href="tel:905321760843">
            <i class="fas fa-phone"></i>
        </a>
    </div>
</div>
@include('layouts.frontend.footer')
