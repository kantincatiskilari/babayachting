<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Page;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        $banners = BannerImage::all();
        $pages = Page::where('status',1)->get();

        return view('admin.settings.banner_images', compact('pages','banners'));
    }

    public function store(Request $request, $id)
    {
        $page_banner = BannerImage::find($id);
        //Thumbnail image upload
        if ($request->hasFile("image")) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/website-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1920, 1080)->save($imagePath);

            $page_banner->image = $imageName;
        }
        if($page_banner->save())
        {
            return redirect()->back();
        }
    }
}
