<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

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
