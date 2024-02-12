<?php

namespace App\Http\Controllers\Admin\SeoSettings;

use App\Http\Controllers\Controller;
use App\Models\SeoTexts;
use Illuminate\Http\Request;

class SeoSettingsController extends Controller
{
    public function home()
    {
        $seo_text = SeoTexts::where('id', 1)->first();
        return view('admin.seo_settings.seo_home', compact('seo_text'));
    }

    public function homeStore(Request $request)
    {
        $seo_text = SeoTexts::where('id', 1)->first();
        if ($request->has('page_title')) {
            $seo_text->page_title = $request->page_title;
        }
        if ($request->has('meta_description')) {
            $seo_text->meta_description = $request->meta_description;
        }

        if ($seo_text->save()) {
            return response()->json([
                'success' => 'Başarı ile güncellendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }

    public function yachts()
    {
        $seo_text = SeoTexts::where('id', 2)->first();
        return view('admin.seo_settings.seo_yachts', compact('seo_text'));
    }

    public function yachtStore(Request $request)
    {
        $seo_text = SeoTexts::where('id', 2)->first();
        if ($request->has('page_title')) {
            $seo_text->page_title = $request->page_title;
        }
        if ($request->has('meta_description')) {
            $seo_text->meta_description = $request->meta_description;
        }

        if ($seo_text->save()) {
            return response()->json([
                'success' => 'Başarı ile güncellendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }

    public function about()
    {
        $seo_text = SeoTexts::where('id', 4)->first();
        return view('admin.seo_settings.seo_about', compact('seo_text'));
    }

    public function aboutStore(Request $request)
    {
        $seo_text = SeoTexts::where('id', 4)->first();
        if ($request->has('page_title')) {
            $seo_text->page_title = $request->page_title;
        }
        if ($request->has('meta_description')) {
            $seo_text->meta_description = $request->meta_description;
        }

        if ($seo_text->save()) {
            return response()->json([
                'success' => 'Başarı ile güncellendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }

    public function faq()
    {
        $seo_text = SeoTexts::where('id', 3)->first();
        return view('admin.seo_settings.seo_faq', compact('seo_text'));
    }

    public function faqStore(Request $request)
    {
        $seo_text = SeoTexts::where('id', 3)->first();
        if ($request->has('page_title')) {
            $seo_text->page_title = $request->page_title;
        }
        if ($request->has('meta_description')) {
            $seo_text->meta_description = $request->meta_description;
        }

        if ($seo_text->save()) {
            return response()->json([
                'success' => 'Başarı ile güncellendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }

    public function contact()
    {
        $seo_text = SeoTexts::where('id', 5)->first();
        return view('admin.seo_settings.seo_contact', compact('seo_text'));
    }

    public function contactStore(Request $request)
    {
        $seo_text = SeoTexts::where('id', 5)->first();
        if ($request->has('page_title')) {
            $seo_text->page_title = $request->page_title;
        }
        if ($request->has('meta_description')) {
            $seo_text->meta_description = $request->meta_description;
        }

        if ($seo_text->save()) {
            return response()->json([
                'success' => 'Başarı ile güncellendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }
}
