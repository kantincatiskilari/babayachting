<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use App\Models\Yacht;
use App\Models\YachtTypes;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\YachtElectronicSystems;
use App\Models\YachtImages;
use App\Models\YachtTechincalSpecifications;

class YachtPageController extends Controller
{
    public function index()
    {
        $yachts = Yacht::where('status', 1)->get();
        $banner_image = BannerImage::find(3);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [4, 5, 6, 7])->get();
        $yachtCountsByType = Yacht::select('yacht_type_id', DB::raw('count(*) as count'))
            ->with('yachtType:id,type_name') // Yat tipi adını ekleyin
            ->groupBy('yacht_type_id')
            ->get();
        return view('frontend.pages.yachts', compact('yachts', 'banner_image', 'user', 'pages', 'selectedSpecifications', 'yachtCountsByType'));
    }

    public function show($slug)
    {
        $yacht = Yacht::where('seo_title', $slug)->first();
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $technicalSpecifications = YachtTechincalSpecifications::where('yacht_id', $yacht->id)->get();
        $yachtImages = YachtImages::where('yacht_id', $yacht->id)->get();
        $electronicSystems = YachtElectronicSystems::where('yacht_id', $yacht->id)->get();
        $recommendedYachts = Yacht::where('is_recommended', 1)->limit(3)->get();
        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [4, 5, 6, 7])->get();
        $yacht->increment('view');
        return view('frontend.pages.yacht', compact('yacht', 'user', 'pages', 'technicalSpecifications', 'yachtImages', 'electronicSystems', 'recommendedYachts', 'selectedSpecifications'));
    }
}
