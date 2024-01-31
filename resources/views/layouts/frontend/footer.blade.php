<div class="content">

</div>

<footer class="footer">
    <div class="upper-footer">
        <div class="footer-container container d-flex flex-column flex-md-row justify-content-between">
            <div class="upper-footer-left">
                <div class="upper-footer-logo mb-5">
                    <a href="/">BABAYACHTING</a>
                </div>
                <div class="upper-footer-addresses">
                    <div class="footer-address-item text-white">
                        <i class="fa-solid fa-location-dot"></i>
                        {{ $user->address }}
                    </div>
                    <div class="footer-address-item text-white my-3">
                        <i class="fa-solid fa-phone"></i>
                        {{ $user->tel_no }}
                    </div>
                    <div class="footer-address-item text-white">
                        <i class="fa-solid fa-envelope"></i>
                        {{ $user->email }}
                    </div>
                </div>
            </div>
            <div class="upper-footer-center">
                <h5>SAYFALAR</h5>
                <div class="upper-footer-pages">
                    <ul class="d-flex gap-3">
                        <div class="upper-footer-pages-left d-flex flex-column gap-2">
                            <li>
                                <a href="">Anasayfa</a>
                            </li>
                            <li>
                                <a href="">Hakkımızda</a>
                            </li>
                            <li>
                                <a href="">Tüm Tekneler</a>
                            </li>
                            <li>
                                <a href="">S.S.S</a>
                            </li>
                        </div>
                        <div class="upper-footer-pages-right d-flex flex-column gap-2">
                            <li>
                                <a href="">Kullanım Koşulları</a>
                            </li>
                            <li>
                                <a href="">Gizlilik ve Politika</a>
                            </li>
                            <li>
                                <a href="">İletişim</a>
                            </li>
                        </div>

                    </ul>
                </div>
            </div>
            <div class="upper-footer-right">
                <h5>BİZİ TAKİP EDİN!</h5>
                <ul class="d-flex gap-3">
                    <li>

                        <a href="{{ $user->facebook_address }}">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $user->twitter_address }}">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $user->linkedin_address }}">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $user->whatsapp_address }}">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-footer text-center">
        Copyright 2024, Babayachting. Bütün hakları saklıdır.
    </div>
</footer>
</body>


</html>
@yield('javascript')
