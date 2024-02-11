<?php

namespace App\Http\Controllers\Admin;

use App\Models\Yacht;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $yachts = Yacht::all();
        return view('admin.dashboard', compact("yachts"));
    }
}
