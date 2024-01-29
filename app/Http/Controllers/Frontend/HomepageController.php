<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use App\Models\Yacht;
use App\Models\YachtTechincalSpecifications;
use Illuminate\Foundation\Auth\User;

class HomepageController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        $pages = Page::where('status',1)->get();
        $banner_image = BannerImage::find(1);
        $recent_yachts = Yacht::orderBy('created_at', 'asc')->paginate(12);
        $suggested_yachts = Yacht::where('is_recommended', 1)->limit(6)->get();

        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [4, 5, 6, 7])->get();
        return view('frontend.index', compact('user', 'pages', 'banner_image', 'recent_yachts', 'selectedSpecifications', 'suggested_yachts'));
    }
}
