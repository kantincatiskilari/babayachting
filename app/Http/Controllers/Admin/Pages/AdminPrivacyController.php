<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;

class AdminPrivacyController extends Controller
{
    public function index()
    {
        $privacy = PrivacyPolicy::first() ?? "";

        return view('admin.pages.privacy_policy',compact('privacy'));
    }

    public function store(Request $request)
    {
        $privacy = PrivacyPolicy::first();

        if (!$privacy) {
            $privacy = new PrivacyPolicy;
        }

        $privacy->privacy_policy_text = $request->description;
        $privacy->save();

        return redirect()->back();
    }
}
