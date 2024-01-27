<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel_no = $request->tel_no;
        $user->facebook_address = $request->facebook;
        $user->twitter_address = $request->twitter;
        $user->linkedin_address = $request->linkedin;
        $user->whatsapp_address = $request->whatsapp;
        $user->address = $request->address;

        if (isset($request->password) && isset($request->confirm_password)) {
            if ($request->password == $request->confirm_password) {
                // Eğer eski şifresi doğruysa şifreyi güncelle

                $user->password = Hash::make($request->password);
            } else {
                return response()->json([
                    'error' => 'Şifreler eşleşmiyor.',
                ]);
            }
        }


        if ($request->hasFile('image')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $user->image = $imageName;
        }



        if ($user->save()) {
            return response()->json([
                'success' => 'Başarı ile güncellendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }
}
