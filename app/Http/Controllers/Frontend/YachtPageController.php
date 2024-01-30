<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use App\Models\Yacht;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YachtPageController extends Controller
{
    public function index()
    {
        $yachts = Yacht::where('status',1)->get();
        $banner_image = BannerImage::find(3);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        return view('frontend.pages.yachts',compact('yachts','banner_image','user','pages'));
    }
}
