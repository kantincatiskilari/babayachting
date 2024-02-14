<?php

namespace App\Http\Controllers\Admin\Specifications;

use App\Models\YachtTypes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $types = YachtTypes::get();

        return view('admin.specifications.types.index', compact('types'));
    }

    public function store(Request $request)
    {
        $typeName = ucfirst(strtolower($request->type_name));

        $request->validate([
            'type_name' => 'required|unique:yacht_types,type_name',
        ]);

        $existingType = YachtTypes::where('type_name', $typeName)->first();

        if ($existingType) {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Bu tip zaten mevcut.',
            ]);

            return redirect()->back();
        }

        $yachtType = new YachtTypes;
        $yachtType->type_name = $typeName;
        $yachtType->status = $request->status;
        $yachtType->type_slug = Str::slug($typeName);
        $yachtType->save();


        if ($yachtType->exists) {
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
        $typeId = $request->input('type_id');
        $status = $request->input('status');

        // Veritabanında durumu güncelle
        YachtTypes::where('id', $typeId)->update(['status' => $status]);

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function edit(Request $request)
    {
        $typeName = ucfirst(strtolower($request->type_name));

        $request->validate([
            'type_name' => 'required|unique:yacht_types,type_name',
        ]);

        $existingType = YachtTypes::where('type_name', $typeName)->first();

        if ($existingType) {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Bu tip zaten mevcut.',
            ]);

            return redirect()->back();
        }

        $yachtType = YachtTypes::find($request->id);

        if ($yachtType) {
            // Bulunan tip varsa, güncelleme işlemini gerçekleştir
            $yachtType->type_name = $typeName;
            $yachtType->type_slug = Str::slug($typeName);
            $yachtType->save();
        }

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function delete($id)
    {
        $yachtType = YachtTypes::find($id);

        if ($yachtType) {
            $yachtType->delete();

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
