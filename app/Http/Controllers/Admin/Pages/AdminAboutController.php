<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;

class AdminAboutController extends Controller
{
    public function index()
    {
        $about = About::first() ?? "";

        return view('admin.pages.about',compact('about'));
    }

    public function store(Request $request)
    {
        $about = About::first();

        if (!$about) {
            $about = new About;
        }

        $about->about_text = $request->description;
        $about->save();

        return redirect()->back();
    }
}
