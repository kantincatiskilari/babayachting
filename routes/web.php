<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FaqPageController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Admin\Yachts\YachtController;
use App\Http\Controllers\Frontend\YachtPageController;
use App\Http\Controllers\Admin\Settings\PageController;
use App\Http\Controllers\Admin\Pages\AdminFaqController;
use App\Http\Controllers\Admin\Settings\GeneralSettingsController;
use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Admin\Settings\BannerController;
use App\Http\Controllers\Admin\Pages\AdminAboutController;
use App\Http\Controllers\Admin\Pages\AdminTermsController;
use App\Http\Controllers\Frontend\PrivacyPolicyController;
use App\Http\Controllers\Admin\Pages\AdminContactController;
use App\Http\Controllers\Admin\Pages\AdminPrivacyController;
use App\Http\Controllers\Admin\Specifications\TypeController;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\SeoSettings\SeoSettingsController;
use App\Http\Controllers\Admin\Specifications\ElectronicController;
use App\Http\Controllers\Admin\Specifications\TechnicalSpecifications;




//Frontend
Route::get('/', [HomepageController::class, 'index'])->name('anasayfa');
Route::get('/anasayfa', [HomepageController::class, 'index'])->name('anasayfa');
Route::post('/arama-sonuclari', [HomepageController::class, 'search'])->name('arama-sonuclari');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('hakkimizda');
Route::get('/tekneler', [YachtPageController::class, 'index'])->name('tekneler');
Route::get('/sikca-sorulan-sorular', [FaqPageController::class, 'index'])->name('sikca-sorulan-sorular');
Route::get('/iletisim', [ContactPageController::class, 'index'])->name('iletisim');
Route::post('/iletisim/gonder', [ContactPageController::class, 'store'])->name('iletisim-gonder');
Route::get('/tekne/{slug}', [YachtPageController::class, 'show'])->name('tekne');
Route::post("/tekneler", [YachtPageController::class, 'index'])->name('tekne-filtrele');
Route::get("/tekne-ara", [YachtPageController::class, 'search'])->name('tekne-ara');
Route::get("/kullanim-sartlari", [TermsController::class, 'index'])->name('kullanim-sartlari');
Route::get("/gizlilik-ve-politika", [PrivacyPolicyController::class, 'index'])->name('gizlilik-ve-politika');

//Auth
Route::get("/admin/login", [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);

//Admin
Route::group(['middleware' => 'auth.user', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [AdminProfileController::class, 'show'])->name('profil');
    Route::post('/profil-guncelle', [AdminProfileController::class, 'update'])->name('profil-guncelle');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    //Tekneler
    Route::get('/tekneler', [YachtController::class, 'index'])->name('tekneler');
    Route::post('/update-yacht-status', [YachtController::class, 'updateStatus'])->name('update_yacht_status');
    Route::get('/tekne-olustur', [YachtController::class, 'create'])->name('tekne-olustur');
    Route::post('/tekne-olustur/kaydet', [YachtController::class, 'store'])->name('tekne-olustur-kaydet');
    Route::get('/tekne-guncelle/{id}', [YachtController::class, 'update'])->name('tekne-guncelle');
    Route::post('/tekne-guncelle/kaydet/{id}', [YachtController::class, 'edit'])->name('tekne-guncelle-kaydet');
    Route::delete('/tekne-sil/{id}', [YachtController::class, 'destroy'])->name('tekne-sil');

    //Tekne tipleri
    Route::get('/tekne-turleri', [TypeController::class, 'index'])->name('tekne-turleri');
    Route::post('/update-status', [TypeController::class, 'updateStatus'])->name('update_status');
    Route::post('/tip-olustur', [TypeController::class, 'store'])->name('tip-olustur');
    Route::post('/tip-duzenle', [TypeController::class, 'edit'])->name('tip-duzenle');
    Route::delete('/tip-sil/{id}', [TypeController::class, 'delete'])->name('tip-sil');

    //Teknik özellikler
    Route::get('/teknik-ozellikler', [TechnicalSpecifications::class, 'index'])->name('teknik-ozellikler');
    Route::post('update-specification-status', [TechnicalSpecifications::class, 'updateStatus'])->name('update-specification-status');
    Route::post('/teknik-ozellik-olustur', [TechnicalSpecifications::class, 'store'])->name('teknik-ozellik-olustur');
    Route::post('/teknik-ozellik-duzenle', [TechnicalSpecifications::class, 'edit'])->name('teknik-ozellik-duzenle');
    Route::delete('teknik-ozellik-sil/{id}', [TechnicalSpecifications::class, 'delete']);

    //Elektronik Sistemler
    Route::get('/elektronik-sistemler', [ElectronicController::class, 'index'])->name('elektronik-sistemler');
    Route::post('/elektronik-sistem-olustur', [ElectronicController::class, 'store'])->name('elektronik-sistem-olustur');
    Route::post('/update-electronic-status', [ElectronicController::class, 'updateStatus']);
    Route::post('/elektronik-duzenle', [ElectronicController::class, 'edit']);
    Route::delete('elektronik-sil/{id}', [ElectronicController::class, 'delete']);

    //Ayarlar
    Route::get("/genel-ayarlar", [GeneralSettingsController::class, 'index'])->name('genel-ayarlar');
    Route::post("/genel-ayarlar/guncelle", [GeneralSettingsController::class, 'edit'])->name('genel-ayarlar-guncelle');
    Route::get('/banner-resimleri', [BannerController::class, 'index'])->name('banner-resimleri');
    Route::post('/banner-resmi/guncelle/{id}', [BannerController::class, 'store'])->name('banner-resmi-guncelle');
    Route::get('/sayfalar', [PageController::class, 'index'])->name('sayfalar');
    Route::post('update-page-status', [PageController::class, 'updateStatus']);
    Route::post('sayfa-ekle', [PageController::class, 'store'])->name('sayfa-ekle');

    //Sayfalar
    Route::get('/hakkimizda', [AdminAboutController::class, 'index'])->name('hakkimizda');
    Route::post('/hakkimizda/ekle', [AdminAboutController::class, 'store'])->name('hakkimizda-ekle');
    Route::get('/kullanim-sartlari', [AdminTermsController::class, 'index'])->name('kullanim-sartlari');
    Route::post('/kullanim-sartlari/ekle', [AdminTermsController::class, 'store'])->name('kullanim-sartlari-ekle');
    Route::get('/gizlilik-ve-politika', [AdminPrivacyController::class, 'index'])->name('gizlilik-ve-politika');
    Route::post('/gizlilik-ve-politika/ekle', [AdminPrivacyController::class, 'store'])->name('gizlilik-ve-politika-ekle');
    Route::get('/sikca-sorulan-sorular', [AdminFaqController::class, 'index'])->name('s.s.s');
    Route::post('/update-faq-status', [AdminFaqController::class, 'updateStatus']);
    Route::post('/sikca-sorulan-sorular/ekle', [AdminFaqController::class, 'store'])->name('s.s.s-ekle');
    Route::delete('/s.s.s-sil/{id}', [AdminFaqController::class, 'delete'])->name('s.s.s-sil');
    Route::get('/iletisim', [AdminContactController::class, 'index'])->name('iletisim');
    Route::delete('/iletisim-sil/{id}', [AdminContactController::class, 'delete'])->name('iletisim-sil');

    //SEO Ayarları
    Route::get('/anasayfa-seo', [SeoSettingsController::class, 'home'])->name('anasayfa-seo');
    Route::post('/anasayfa-seo/ekle', [SeoSettingsController::class, 'homeStore'])->name('anasayfa-seo/ekle');
    Route::get('/tekneler-seo', [SeoSettingsController::class, 'yachts'])->name('tekneler-seo');
    Route::post('/tekneler-seo/ekle', [SeoSettingsController::class, 'yachtStore'])->name('tekneler-seo/ekle');
    Route::get('/hakkimizda-seo', [SeoSettingsController::class, 'about'])->name('hakkimizda-seo');
    Route::post('/hakkimizda-seo/ekle', [SeoSettingsController::class, 'aboutStore'])->name('hakkimizda-seo/ekle');
    Route::get('/sss-seo', [SeoSettingsController::class, 'faq'])->name('sss-seo');
    Route::post('/sss-seo/ekle', [SeoSettingsController::class, 'faqStore'])->name('sss-seo/ekle');
    Route::get('/iletisim-seo', [SeoSettingsController::class, 'contact'])->name('iletisim-seo');
    Route::post('/iletisim-seo/ekle', [SeoSettingsController::class, 'contactStore'])->name('iletisim-seo/ekle');
});
