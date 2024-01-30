<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use App\Models\About;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $banner_image = BannerImage::find(2);
        $about = About::first();
        return view('frontend.pages.about',compact('banner_image','user','pages','about'));
    }
}
