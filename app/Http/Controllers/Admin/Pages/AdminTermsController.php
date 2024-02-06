<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class AdminTermsController extends Controller
{
    public function index()
    {
        $terms = Term::first() ?? "";
        return view('admin.pages.terms',compact('terms'));
    }

    public function store(Request $request)
    {
        $terms = Term::first();

        if (!$terms) {
            $terms = new Term;
        }

        $terms->terms_text = $request->description;
        $terms->save();

        return redirect()->back();
    }
}
