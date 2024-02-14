<?php

namespace App\Http\Controllers\Admin\Specifications;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ElectronicSystems;
use App\Http\Controllers\Controller;

class ElectronicController extends Controller
{
    public function index()
    {
        $systems = ElectronicSystems::all();
        return view('admin.specifications.electronic-systems.index', compact('systems'));
    }

    public function updateStatus(Request $request)
    {
        $electronicId = $request->input('electronic_id');
        $status = $request->input('status');

        // Veritabanında durumu güncelle
        ElectronicSystems::where('id', $electronicId)->update(['status' => $status]);

        return response()->json([
            'success' => 'Başarı ile güncellendi',
        ]);
    }

    public function store(Request $request)
    {
        $electronicName = ucwords(strtolower($request->electronic_name));

        $request->validate([
            'electronic_name' => 'required|unique:electronic_systems,electronic_name',
        ]);

        $existingType = ElectronicSystems::where('electronic_name', $electronicName)->first();

        if ($existingType) {
            session()->flash('toastr', [
                'type'    => 'error',
                'message' => 'Bu özellik zaten mevcut.',
            ]);

            return redirect()->back();
        }

        $electronicSystem = new ElectronicSystems;
        $electronicSystem->electronic_name = $electronicName;
        $electronicSystem->status = $request->status;
        $electronicSystem->save();


        if ($electronicSystem->exists) {
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
        // Gelen isteği doğrula
        $request->validate([
            'electronic_name' => 'required|unique:electronic_systems,electronic_name',
        ]);

        // Elektronik sistem adını düzelt
        $electronicName = ucwords(strtolower($request->electronic_name));

        // Elektronik sistem adının mevcut olup olmadığını kontrol et
        $existingType = ElectronicSystems::where('electronic_name', $electronicName)->first();
        if ($existingType) {
            // Elektronik sistem adı mevcutsa ve aynı zamanda doğrulama hatası oluşmuşsa,
            // hem mevcutluğu hem de doğrulama hatasını kullanıcıya bildir
            return response()->json([
                'error' => ['Elektronik sistem adı zaten mevcut.'],
            ], 422);
        }

        // Elektronik sistem kaydını bul
        $electronicSystem = ElectronicSystems::find($request->id);
        if ($electronicSystem) {
            // Bulunan tip varsa, güncelleme işlemini gerçekleştir
            $electronicSystem->electronic_name = $electronicName;
            $electronicSystem->save();
        }

        // Başarılı yanıtı döndür
        return response()->json([
            'success' => 'Başarıyla güncellendi.',
        ]);
    }

    public function delete($id)
    {
        $electronicSystem = ElectronicSystems::find($id);

        if ($electronicSystem) {
            $electronicSystem->delete();

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
