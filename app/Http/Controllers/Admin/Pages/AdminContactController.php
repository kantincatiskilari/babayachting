<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.pages.contact', compact('contacts'));
    }

    public function delete($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();

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
