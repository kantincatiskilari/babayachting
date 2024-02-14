<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use App\Models\Yacht;
use App\Models\SeoTexts;
use App\Models\YachtTypes;
use App\Models\BannerImage;
use App\Models\YachtImages;
use Illuminate\Http\Request;
use App\Models\ElectronicSystems;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\YachtElectronicSystems;
use App\Models\YachtTechincalSpecifications;

class YachtPageController extends Controller
{
    public function index(Request $request)
    {
        $seo_text = SeoTexts::where('id',2)->first();
        $yachts = Yacht::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $banner_image = BannerImage::find(3);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $yachtTypes = YachtTypes::all();
        $electronicSystems = ElectronicSystems::where('status', 1)->get();
        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [7, 1, 9, 5])->get();
        $yachtCountsByType = Yacht::select('yacht_type_id', DB::raw('count(*) as count'))
            ->with('yachtType:id,type_name') // Yat tipi adını ekleyin
            ->groupBy('yacht_type_id')
            ->get();
        $tradingStatus = $request->trading_status;
        if ($tradingStatus) {
            switch ($request->trading_status) {
                case "1":
                    $yachts = Yacht::where('trading_status', "1")->paginate(10); // first() yerine get() kullanılmalı
                    break;
                case "2":
                    $yachts = Yacht::where('trading_status', "2")->paginate(10); // first() yerine get() kullanılmalı
                    break;
                case "3":
                    $yachts = Yacht::where('trading_status', "3")->paginate(10);
                    break;
                case "4":
                    $yachts = Yacht::orderBy('created_at', 'desc')->paginate(10);
                    break;
                case "5":
                    $yachts = Yacht::orderBy('created_at', 'asc')->paginate(10);
                    break;
                case "6":
                    $yachts = Yacht::where('is_recommended', '1')->paginate(10);
                    break;
                default:
                    $yachts = Yacht::orderBy('view', 'desc')
                        ->paginate(10);
                    break;
            }
        }

        return view('frontend.pages.yachts', compact('yachts', 'banner_image', 'user', 'pages', 'selectedSpecifications', 'yachtCountsByType', 'tradingStatus', 'yachtTypes', 'electronicSystems','seo_text'));
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
        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [7, 1, 9, 5])->get();
        $yacht->increment('view');
        return view('frontend.pages.yacht', compact('yacht', 'user', 'pages', 'technicalSpecifications', 'yachtImages', 'electronicSystems', 'recommendedYachts', 'selectedSpecifications'));
    }

    public function search(Request $request)
    {

        $sortArry = [];

        if ($request->electronic_system) {

            foreach ($request->electronic_system as $electronicSystem) {

                array_push($sortArry, (int)$electronicSystem);
            }
        }
        //start query

        $yachts = Yacht::whereHas('electronicSystems', function ($query) use ($request) {
            if ($request->filled('yacht_type')) {
                $query->where(['yacht_type_id' => $request->yacht_type, 'status' => 1]);
            }

            if ($request->filled('search_yacht')) {
                $query->where('title', 'LIKE', '%' . $request->search_yacht . '%')->where('status', 1);
            }

            if ($request->filled('trading_status')) {
                $query->where(['trading_status' => $request->trading_status, 'status' => 1]);
            }
        });

        $yachtQuery = clone $yachts;

        if ($request->has('electronic_system')) {
            $yachtQuery = $yachtQuery->whereHas('electronicSystems', function ($query) use ($sortArry) {
                $query->whereIn('system_id', $sortArry)
                    ->groupBy('yacht_id')
                    ->havingRaw('COUNT(DISTINCT system_id) = ?', [count($sortArry)]);
            })->orderBy('id', 'asc');
        } else {
            $yachtQuery = $yachtQuery->whereDoesntHave('electronicSystems', function ($query) use ($sortArry) {
                $query->whereIn('system_id', $sortArry);
            })->orderBy('id', 'desc');
        }

        $yachts = $yachtQuery->where('status',1)->orderBy('id', 'desc')->paginate(10);



        $banner_image = BannerImage::find(3);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $yachtTypes = YachtTypes::all();
        $electronicSystems = ElectronicSystems::where('status', 1)->get();
        $selectedSpecifications = YachtTechincalSpecifications::whereIn('specification_id', [7, 1, 9, 5])->get();
        $tradingStatus = $request->trading_status;

        return view('frontend.pages.yachts', compact('yachts', 'banner_image', 'user', 'pages', 'selectedSpecifications', 'tradingStatus', 'yachtTypes', 'electronicSystems'));
    }
}
