<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSettings::get()->first();
        return view('admin.settings.general_settings',compact('generalSettings'));
    }

    public function edit(Request $request)
    {
        $generalSettings = GeneralSettings::first();

        if ($request->hasFile('header_logo')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('header_logo');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(300, 300)->save($imagePath);

            $generalSettings->header_logo = $imageName;
        }

        if ($request->hasFile('footer_logo')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('footer_logo');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(300, 300)->save($imagePath);

            $generalSettings->footer_logo = $imageName;
        }

        if ($request->hasFile('favicon')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('favicon');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(32, 32)->save($imagePath);

            $generalSettings->favicon = $imageName;
        }


        if ($request->hasFile('terms_image')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('terms_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $generalSettings->terms_image = $imageName;
        }


        if ($request->hasFile('privacy_policy_image')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('privacy_policy_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $generalSettings->privacy_policy_image = $imageName;
        }

        if ($request->hasFile('contact_image')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('contact_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $generalSettings->contact_image = $imageName;
        }

        if ($request->hasFile('entrance_image')) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('entrance_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->save($imagePath);

            $generalSettings->entrance_image = $imageName;
        }

        if ($generalSettings->save()) {
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
