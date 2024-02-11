<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();
        $privacy = PrivacyPolicy::first();
        $generalSettings = GeneralSettings::get()->first();
        return view('frontend.pages.privacy_policy', compact('user', 'pages', 'privacy','generalSettings'));
    }
}
