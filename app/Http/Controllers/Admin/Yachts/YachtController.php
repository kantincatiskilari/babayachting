<?php

namespace App\Http\Controllers\Admin\Yachts;

use App\Models\Yacht;
use App\Models\YachtTypes;
use App\Models\YachtImages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ElectronicSystems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\TechnicalSpecification;
use App\Models\YachtElectronicSystems;
use App\Models\YachtTechincalSpecifications;

class YachtController extends Controller
{
    public function index()
    {
        $yachts = Yacht::orderBy('created_at','desc')->get();
        return view('admin.yachts.index', compact('yachts'));
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        // Veritabanında durumu güncelle
        Yacht::where('id', $id)->update(['status' => $status]);

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function create()
    {
        $yachtTypes = YachtTypes::all();
        $electronicSystems = ElectronicSystems::all();
        $specifications = TechnicalSpecification::all();
        return view('admin.yachts.create', compact('electronicSystems', 'specifications', 'yachtTypes'));
    }

    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|unique:yachts,title',
            'yacht_type_id' => 'required',
            'country' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required',
            'description' => 'required',
            'is_recommended' => 'required',
        ];

        $customMessages = [
            'title.required' => 'Bir başlık giriniz.',
            'title.unique' => 'Bu başlık daha önce kullanıldı.',
            'yacht_type_id.required' => 'Tekne tipini belirleyiniz.',
            'country.required' => 'Teknenin hangi ülkede olduğunu belirtiniz.',
            'price.required' => 'Teknenin fiyatı boş olamaz.',
            'description.required' => 'Açıklama alanı boş bırakılamaz.',
            'is_recommended.required' => 'Önerilen alanı boş bırakılamaz.',
        ];

        $this->validate($request, $rules, $customMessages);

        $yacht = new Yacht;
        $yacht->title = $request->title;
        $yacht->seo_title = Str::slug($request->title);
        $yacht->yacht_type_id = $request->yacht_type_id;
        $yacht->trading_status = $request->trading_status;
        $yacht->country = $request->country;
        $yacht->price = $request->price;
        $yacht->currency = $request->currency;
        $yacht->description = $request->description;
        $yacht->is_recommended = $request->is_recommended;

        //Banner Image Upload

        if ($request->hasFile("banner_image")) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('banner_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/custom-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $yacht->banner_image = $imageName;
        }

        //Thumbnail image upload
        if ($request->hasFile("thumbnail_image")) {
            // Formdan gelen resim dosyasını al
            $image = $request->file('thumbnail_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/custom-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $yacht->thumbnail_image = $imageName;
        }

        $yacht->save();

        //Slider Images Upload
        if ($request->hasFile('slider_images')) {
            $slider_images = $request->slider_images;
            foreach ($slider_images as $image) {
                $slider_images = new YachtImages;
                $slider_images->yacht_id = $yacht->id;

                //Resim adı
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Resmi belirli bir klasöre kaydet
                $imagePath = public_path('images/custom-images/' . $imageName);
                Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

                $slider_images->image = $imageName;

                if ($slider_images->save()) {
                    // dd("Başarılı"); // Bu satır döngü içinde olmamalı
                } else {
                    dd("Başarısız: " . $slider_images->getErrors()); // Hata mesajını göster
                }
            }
        }
        //Electronic Systems
        if ($request->has('electronic_systems')) {
            $electronic_systems = $request->electronic_systems;
            foreach ($electronic_systems as $system) {
                $yacht_electronic_system = new YachtElectronicSystems;
                $yacht_electronic_system->system_id = $system;
                $yacht_electronic_system->yacht_id = $yacht->id;

                if ($yacht_electronic_system->save()) {
                    // dd("Başarılı"); // Bu satır döngü içinde olmamalı
                } else {
                    dd("Başarısız: " . $yacht_electronic_system->getErrors()); // Hata mesajını göster
                }
            }
        }

        //Technical Specifications
        if ($request->has('specifications')) {
            $specifications = $request->specifications;
            $specificationIds = $request->specification_ids;

            foreach ($specifications as $key => $specification) {
                $yacht_technical_specifications = new YachtTechincalSpecifications;

                // Eğer her spesifikasyonun kendine özgü bir ID'si varsa
                $specificationId = $specificationIds[$key];
                $yacht_technical_specifications->specification_id = $specificationId;

                // Eğer her spesifikasyonun ID'si aynı ve tüm spesifikasyonlar için tek bir ID kullanılacaksa
                // $yacht_technical_specifications->specification_id = $request->specification_id;

                $yacht_technical_specifications->yacht_id = $yacht->id;
                $yacht_technical_specifications->specification_value = $specification;

                if ($yacht_technical_specifications->save()) {
                    // Başarılı kayıt durumu
                } else {
                    dd("Başarısız: " . $yacht_technical_specifications->errors());
                }
            }
        }



        return response()->json(['success' => 'Yat başarıyla eklendi.', 'redirect' => route('admin.tekneler')]);
    }

    public function update($id)
    {
        $yacht = Yacht::find($id);
        $yachtTypes = YachtTypes::all();
        $electronicSystems = ElectronicSystems::all();
        $specifications = TechnicalSpecification::all();
        return view('admin.yachts.edit', compact('yacht', 'yachtTypes', 'electronicSystems', 'specifications'));
    }

    public function edit(Request $request, $id)
    {
        $yacht = Yacht::find($id);

        $rules = [
            'title' => 'required',
            'yacht_type_id' => 'required',
            'country' => 'required',
            'price' => 'required|numeric',
            'trading_status' => 'required',
            'description' => 'required',
            'is_recommended' => 'required',
        ];

        $customMessages = [
            'title.required' => 'Bir başlık giriniz.',
            'yacht_type_id.required' => 'Tekne tipini belirleyiniz.',
            'country.required' => 'Teknenin hangi ülkede olduğunu belirtiniz.',
            'price.required' => 'Teknenin fiyatı boş olamaz.',
            'description.required' => 'Açıklama alanı boş bırakılamaz.',
            'is_recommended.required' => 'Önerilen alanı boş bırakılamaz.',
        ];

        $this->validate($request, $rules, $customMessages);

        $yacht->title = $request->title;
        $yacht->seo_title = Str::slug($request->title);
        $yacht->yacht_type_id = $request->yacht_type_id;
        $yacht->trading_status = $request->trading_status;
        $yacht->country = $request->country;
        $yacht->price = $request->price;
        $yacht->currency = $request->currency;
        $yacht->description = $request->description;
        $yacht->is_recommended = $request->is_recommended;
        $yacht->status = $request->status;

        //Banner Image Upload

        if ($request->hasFile("banner_image")) {
            $old_banner = $yacht->banner_image;
            // Formdan gelen resim dosyasını al
            $image = $request->file('banner_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/custom-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $yacht->banner_image = $imageName;
            if ($yacht->banner_image != null) {
                if (File::exists(public_path('images/custom-images/') . $old_banner)) unlink(public_path('/images/custom-images/') . $old_banner);
            }
        }

        $yacht->save();

        //Thumbnail image upload
        if ($request->hasFile("thumbnail_image")) {
            $old_thumbnail = $yacht->thumbnail_image;
            // Formdan gelen resim dosyasını al
            $image = $request->file('thumbnail_image');

            // Resmin adını benzersiz bir şekilde oluştur
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Resmi belirli bir klasöre kaydet
            $imagePath = public_path('images/custom-images/' . $imageName);
            Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

            $yacht->thumbnail_image = $imageName;
            if ($yacht->thumbnail_image != null) {
                if (File::exists(public_path('images/custom-images/') . $old_thumbnail)) unlink(public_path('images/custom-images/') . $old_thumbnail);
            }
        }


        $yacht->save();

        //Slider Images Upload
        if ($request->hasFile('slider_images')) {
            // Eski resimleri bul ve sil
            $old_images = YachtImages::where('yacht_id', $yacht->id)->get();
            if (isset($old_images)) {
                foreach ($old_images as $old_image) {
                    $imagePath = public_path('images/custom-images/' . $old_image->image);
                    unlink($imagePath); // Fiziksel dosyayı sil
                    $old_image->delete(); // Veritabanından kaydı sil
                }
            }

            // Yeni resimleri kaydet
            $slider_images = $request->file('slider_images');
            foreach ($slider_images as $image) {
                $new_slider_image = new YachtImages;
                $new_slider_image->yacht_id = $yacht->id;

                // Resim adı
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Resmi belirli bir klasöre kaydet
                $imagePath = public_path('images/custom-images/' . $imageName);
                Image::make($image->getRealPath())->resize(1280, 768)->save($imagePath);

                $new_slider_image->image = $imageName;

                if ($new_slider_image->save()) {
                    // dd("Başarılı"); // Bu satır döngü içinde olmamalı
                } else {
                    dd("Başarısız: " . implode(", ", $new_slider_image->getErrors())); // Hata mesajını göster
                }
            }
        }

        $yacht->save();

        //Electronic Systems
        if ($request->has('electronic_systems')) {
            $electronic_systems = $request->electronic_systems;
            YachtElectronicSystems::where('yacht_id', $yacht->id)->delete();
            foreach ($electronic_systems as $system) {
                $yacht_electronic_system = new YachtElectronicSystems;
                $yacht_electronic_system->system_id = $system;
                $yacht_electronic_system->yacht_id = $yacht->id;

                if ($yacht_electronic_system->save()) {
                    // dd("Başarılı"); // Bu satır döngü içinde olmamalı
                } else {
                    dd("Başarısız: " . $yacht_electronic_system->getErrors()); // Hata mesajını göster
                }
            }
        }

        //Technical Specifications
        if ($request->has('specifications')) {
            $specifications = $request->specifications;
            $specificationIds = $request->specification_ids;
            YachtTechincalSpecifications::where('yacht_id', $yacht->id)->delete();

            foreach ($specifications as $key => $specification) {
                $yacht_technical_specifications = new YachtTechincalSpecifications;

                // Eğer her spesifikasyonun kendine özgü bir ID'si varsa
                $specificationId = $specificationIds[$key];
                $yacht_technical_specifications->specification_id = $specificationId;

                // Eğer her spesifikasyonun ID'si aynı ve tüm spesifikasyonlar için tek bir ID kullanılacaksa
                // $yacht_technical_specifications->specification_id = $request->specification_id;

                $yacht_technical_specifications->yacht_id = $yacht->id;
                $yacht_technical_specifications->specification_value = $specification;

                if ($yacht_technical_specifications->save()) {
                    // Başarılı kayıt durumu
                } else {
                    dd("Başarısız: " . $yacht_technical_specifications->getErrors());
                }
            }
        }



        return response()->json(['success' => 'Yat başarıyla güncellendi.', 'redirect' => route('admin.tekneler')]);
    }

    public function destroy($id)
    {
        $yacht = Yacht::find($id);

        if (!$yacht) {
            return response()->json(['error' => 'Yat bulunamadı.'], 404);
        }

        // Elektronik sistemleri ve teknik özellikleri sil
        YachtElectronicSystems::where('yacht_id', $yacht->id)->delete();
        YachtTechincalSpecifications::where('yacht_id', $yacht->id)->delete();

        // Yat resimlerini silebilmek için öncelikle yat resimlerini al
        $yachtImages = YachtImages::where('yacht_id', $yacht->id)->get();

        // Yat resimlerini sırasıyla sil
        foreach ($yachtImages as $image) {
            $imagePath = public_path('/images/custom-image/') . $image->image;

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();
        }

        // Yatın önceki resimlerini sil
        $oldThumbnailPath = public_path('/images/custom-image/') . $yacht->thumbnail_image;
        $oldBannerPath = public_path('/images/custom-image/') . $yacht->banner_image;

        if (File::exists($oldThumbnailPath)) {
            unlink($oldThumbnailPath);
        }

        if (File::exists($oldBannerPath)) {
            unlink($oldBannerPath);
        }

        // Yatı sil
        if ($yacht->delete()) {
            return response()->json([
                'success' => 'Başarı ile silindi'
            ]);
        } else {
            return response()->json([
                'error' => 'Silinirken bir hata meydana geldi.'
            ]);
        }
    }
}
