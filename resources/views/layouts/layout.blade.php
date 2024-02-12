@include('layouts.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('anasayfa') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-ship"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Babayachting</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-house"></i>
                    <span>Panel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Başlıklar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li
                class="nav-item {{ Route::is('admin.tekneler') | Route::is('admin.tekne-turleri') | Route::is('admin.teknik-ozellikler') | Route::is('admin.elektronik-sistemler') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-ship"></i>
                    <span>Tekne</span>
                </a>
                <div id="collapseTwo"
                    class="collapse {{ Route::is('admin.tekneler') | Route::is('admin.tekne-turleri') | Route::is('admin.teknik-ozellikler') | Route::is('admin.elektronik-sistemler') ? 'show' : '' }} "
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.tekneler') ? 'active' : '' }}"
                            href="{{ route('admin.tekneler') }}">Tekneler</a>
                        <a class="collapse-item {{ Route::is('admin.tekne-turleri') ? 'active' : '' }}"
                            href="{{ route('admin.tekne-turleri') }}">Tekne Türleri</a>
                        <a class="collapse-item {{ Route::is('admin.teknik-ozellikler') ? 'active' : '' }}"
                            href="{{ route('admin.teknik-ozellikler') }}">Teknik Özellikler</a>
                        <a class="collapse-item {{ Route::is('admin.elektronik-sistemler') ? 'active' : '' }}"
                            href="{{ route('admin.elektronik-sistemler') }}">Elektronik Sistemler</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li
                class="nav-item {{ Route::is('admin.genel-ayarlar') | Route::is('admin.banner-resimleri') | Route::is('admin.sayfalar') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Ayarlar</span>
                </a>
                <div id="collapseUtilities"
                    class="collapse {{ Route::is('admin.genel-ayarlar') | Route::is('admin.banner-resimleri') | Route::is('admin.sayfalar') ? 'show' : '' }}"
                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.genel-ayarlar') ? 'active' : '' }}"
                            href="{{ route('admin.genel-ayarlar') }}">Genel Ayarlar</a>
                        <a class="collapse-item {{ Route::is('admin.banner-resimleri') ? 'active' : '' }}"
                            href="{{ route('admin.banner-resimleri') }}">Banner Resimleri</a>
                        <a class="collapse-item {{ Route::is('admin.sayfalar') ? 'active' : '' }}"
                            href="{{ route('admin.sayfalar') }}">Sayfalar</a>
                    </div>
                </div>
            </li>
            <li
                class="nav-item {{ Route::is('admin.hakkimizda') | Route::is('admin.s.s.s') | Route::is('admin.kullanim-sartlari') | Route::is('admin.gizlilik-ve-politika') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-globe"></i>
                    <span>Sayfalar</span>
                </a>
                <div id="collapsePages"
                    class="collapse {{ Route::is('admin.hakkimizda') | Route::is('admin.s.s.s') | Route::is('admin.kullanim-sartlari') | Route::is('admin.gizlilik-ve-politika') ? 'show' : '' }}"
                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.hakkimizda') ? 'active' : '' }}"
                            href="{{ route('admin.hakkimizda') }}">Hakkımızda</a>
                        <a class="collapse-item {{ Route::is('admin.s.s.s') ? 'active' : '' }}"
                            href="{{ route('admin.s.s.s') }}">S.S.S</a>
                        <a class="collapse-item {{ Route::is('admin.kullanim-sartlari') ? 'active' : '' }}"
                            href="{{ route('admin.kullanim-sartlari') }}">Kullanım Şartları</a>
                        <a class="collapse-item {{ Route::is('admin.gizlilik-ve-politika') ? 'active' : '' }}"
                            href="{{ route('admin.gizlilik-ve-politika') }}">Gizlilik ve Politika</a>
                    </div>

                </div>
            </li>

            <li
                class="nav-item {{ Route::is('admin.anasayfa-seo') | Route::is('admin.tekneler-seo') | Route::is('admin.sss-seo') | Route::is('admin.hakkimizda-seo') | Route::is('admin.iletisim-seo') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSEO"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fab fa-searchengin"></i>
                    <span>SEO Ayarları</span>
                </a>
                <div id="collapseSEO"
                    class="collapse {{ Route::is('admin.anasayfa-seo') | Route::is('admin.tekneler-seo') | Route::is('admin.sss-seo') | Route::is('admin.hakkimizda-seo') | Route::is('admin.iletisim-seo') ? 'show' : '' }}"
                    aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('admin.anasayfa-seo') ? 'active' : '' }}"
                            href="{{ route('admin.anasayfa-seo') }}">Anasayfa</a>
                        <a class="collapse-item {{ Route::is('admin.tekneler-seo') ? 'active' : '' }}"
                            href="{{ route('admin.tekneler-seo') }}">Tekneler</a>
                        <a class="collapse-item {{ Route::is('admin.sss-seo') ? 'active' : '' }}"
                            href="{{ route('admin.sss-seo') }}">S.S.S</a>
                        <a class="collapse-item {{ Route::is('admin.hakkimizda-seo') ? 'active' : '' }}"
                            href="{{ route('admin.hakkimizda-seo') }}">Hakkımızda</a>
                        <a class="collapse-item {{ Route::is('admin.iletisim-seo') ? 'active' : '' }}"
                            href="{{ route('admin.iletisim-seo') }}">İletişim</a>

                    </div>

                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Charts -->
            <li class="nav-item {{ Route::is('admin.iletisim') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.iletisim') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>İletişim</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('images/website-images/' . Auth::user()->image) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profil') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Çıkış
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Babayachting 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('layouts.footer')
