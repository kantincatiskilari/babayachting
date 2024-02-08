<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\Yacht;
use App\Models\YachtTypes;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Models\ElectronicSystems;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\YachtTechincalSpecifications;

class HomepageController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $banner_image = BannerImage::find(1);
        $recent_yachts = Yacht::orderBy('created_at', 'asc')->where('status', 1)->paginate(12);
        $suggested_yachts = Yacht::where('is_recommended', 1)
            ->where('status', 1)
            ->limit(6)
            ->get();
        $sold_yachts = Yacht::where('trading_status', 3)->get();

        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [4, 5, 6, 7])->get();
        $yacht_types = YachtTypes::all();
        return view('frontend.index', compact('user', 'pages', 'banner_image', 'recent_yachts', 'selectedSpecifications', 'suggested_yachts', 'sold_yachts', 'yacht_types'));
    }

    public function search(Request $request)
    {
        if ($request->filled('yacht_type_id')) {
            $query = Yacht::where('yacht_type_id', $request->yacht_type_id);
        } else {
            $query = Yacht::query();
        }

        if ($request->filled('search_yacht')) {
            $query->where('title', 'like', '%' . $request->search_yacht . '%');
        }

        $query->where('status', 1);

        $yachts = $query->paginate(10);




        $banner_image = BannerImage::find(3);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $yachtTypes = YachtTypes::all();
        $electronicSystems = ElectronicSystems::where('status', 1)->get();
        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [4, 5, 6, 7])->get();
        $tradingStatus = $request->trading_status;

        return view('frontend.pages.yachts', compact('yachts', 'banner_image', 'user', 'pages', 'selectedSpecifications', 'tradingStatus', 'yachtTypes', 'electronicSystems'));
    }
}
