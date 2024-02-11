<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;

class AdminFaqController extends Controller
{
    public function index()
    {
        $FAQs = Faq::all();

        return view('admin.pages.faq', compact('FAQs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $faq = new Faq;

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;

        $faq->save();

        if ($faq->exists) {
            return response()->json([
                'success' => 'Başarı ile eklendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }

    public function updateStatus(Request $request)
    {
        $faqId = $request->input('id');
        $status = $request->input('status');

        // Veritabanında durumu güncelle
        Faq::where('id', $faqId)->update(['status' => $status]);

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function delete($id)
    {
        $FAQ = Faq::find($id);

        if ($FAQ) {
            $FAQ->delete();

            return response()->json([
                'success' => 'Başarı ile silindi'
            ]);
        } else {
            return response()->json([
                'error' => 'Silinirken bir hata meydana geldi.'
            ]);
        };
    }
}
