<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSettings::get()->first();
        return view('admin.settings.general_settings',compact('generalSettings'));
    }

    public function edit(Request $request)
    {
        
    }
}
