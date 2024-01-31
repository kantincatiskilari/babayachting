<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\User;
use App\Models\Contact;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactPageController extends Controller
{
    public function index()
    {
        $banner_image = BannerImage::find(5);
        $user = User::get()->first();
        $pages = Page::where('status', 1)->get();

        return view('frontend.pages.contact', compact('banner_image', 'user', 'pages'));
    }

    public function store(Request $request)
    {

        $contact = new Contact;
        $contact->contact_name = $request->contact_name;
        $contact->contact_email = $request->contact_email;
        $contact->contact_phone = $request->contact_phone;
        $contact->contact_message = $request->contact_message;

        $contact->save();

        if ($contact->exists) {
            return response()->json([
                'success' => 'Başarı ile eklendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }
}
