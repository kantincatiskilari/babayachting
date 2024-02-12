<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Page;
use App\Models\User;
use App\Models\SeoTexts;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqPageController extends Controller
{
    public function index()
    {
        $seo_text = SeoTexts::where('id',3)->first();
        $banner_image = BannerImage::find(4);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $FAQs = Faq::where('status',1)->get();

        return view('frontend.pages.faq', compact('banner_image','user','pages','FAQs','seo_text'));
    }
}
