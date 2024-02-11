<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $sharedData = [];

    public function __construct()
    {
        $generalSettings = GeneralSettings::first();
        $this->sharedData['favicon'] = $generalSettings ? $generalSettings->favicon : null;
    }

}
