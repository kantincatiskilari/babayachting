<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use App\Models\Term;

class TermsController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $terms = Term::first();
        $generalSettings = GeneralSettings::get()->first();
        return view('frontend.pages.terms', compact('user', 'pages', 'terms','generalSettings'));
    }
}
