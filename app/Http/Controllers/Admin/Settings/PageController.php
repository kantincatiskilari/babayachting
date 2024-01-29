<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.settings.pages', compact('pages'));
    }

    public function updateStatus(Request $request)
    {
        $pageId = $request->input('pageId');
        $status = $request->input('status');

        // Veritabanında durumu güncelle
        Page::where('id', $pageId)->update(['status' => $status]);

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function store(Request $request)
    {
        $page = new Page;
        $page->page_title = $request->page_title;
        $page->status = 1;
        $page->page_seo_title = Str::slug($request->page_title);
        $page->save();

        return redirect()->back();
    }
}
