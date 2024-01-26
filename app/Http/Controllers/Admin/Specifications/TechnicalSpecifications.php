<?php

namespace App\Http\Controllers\Admin\Specifications;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TechnicalSpecification;

class TechnicalSpecifications extends Controller
{
    public function index()
    {
        $specifications = TechnicalSpecification::all();
        return view('admin.specifications.techincal-specifications.index', compact('specifications'));
    }

    public function updateStatus(Request $request)
    {
        $specificationId = $request->input('specification_id');
        $status = $request->input('status');

        // Veritabanında durumu güncelle
        TechnicalSpecification::where('id', $specificationId)->update(['status' => $status]);

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function store(Request $request)
    {
        $specificationName = ucwords(strtolower($request->specification_name));

        $request->validate([
            'specification_name' => 'required|unique:technical_specifications,specification_name',
        ]);

        $existingType = TechnicalSpecification::where('specification_name', $specificationName)->first();

        if ($existingType) {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Bu özellik zaten mevcut.',
            ]);

            return redirect()->back();
        }

        $technicalSpecification = new TechnicalSpecification;
        $technicalSpecification->specification_name = $specificationName;
        $technicalSpecification->status = $request->status;
        $technicalSpecification->specification_slug = Str::slug($specificationName);
        $technicalSpecification->save();


        if ($technicalSpecification->exists) {
            return response()->json([
                'success' => 'Başarı ile eklendi.',
            ]);
        } else {
            return response()->json([
                'error' => 'Bir hata meydana geldi.',
            ]);
        }
    }

    public function edit(Request $request)
    {
        $specificationName = ucwords(strtolower($request->specification_name));


        $request->validate([
            'specification_name' => 'required|unique:technical_specifications,specification_name',
        ]);

        $existingType = TechnicalSpecification::where('specification_name', $specificationName)->first();

        if ($existingType) {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Bu özellik zaten mevcut.',
            ]);

            return redirect()->back();
        }

        $technicalSpecification = TechnicalSpecification::find($request->id);

        if ($technicalSpecification) {
            // Bulunan tip varsa, güncelleme işlemini gerçekleştir
            $technicalSpecification->specification_name = $specificationName;
            $technicalSpecification->specification_slug = Str::slug($specificationName);
            $technicalSpecification->save();
        }

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function delete($id)
    {
        $technicalSpecification = TechnicalSpecification::find($id);

        if ($technicalSpecification) {
            $technicalSpecification->delete();

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
