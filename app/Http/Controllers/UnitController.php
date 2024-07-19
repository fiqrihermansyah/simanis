<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use Illuminate\View\View;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index(): View
    {
        return view('admin.master.barang.satuan');
    }

    public function list(Request $request): JsonResponse
    {
        $units = Unit::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($units)
                ->addColumn('tindakan', function ($data) {
                    $button = "<button class='ubah btn btn-success m-1' id='" . $data->id . "'>Ubah</button>";
                    $button .= "<button class='hapus btn btn-danger m-1' id='" . $data->id . "'>Hapus</button>";
                    return $button;
                })
                ->rawColumns(['tindakan'])
                ->make(true);
        }
    }

    public function save(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'inventory_code' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'hard_disk' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'vga' => 'required|string|max:255',
            'user' => 'nullable|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $units = new Unit($validated);
        $status = $units->save();

        if (!$status) {
            return response()->json(
                ["message" => "Data Gagal Di Simpan"],
                400
            );
        }
        return response()->json([
            "message" => "Data Berhasil Di Simpan"
        ], 200);
    }

    public function detail(Request $request): JsonResponse
    {
        $id = $request->id;
        $data = Unit::find($id);

        if (!$data) {
            return response()->json(["message" => "Data Tidak Ditemukan"], 404);
        }

        return response()->json(["data" => $data], 200);
    }

    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'inventory_code' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'hard_disk' => 'required|string|max:255',
            'os' => 'required|string|max:255',
            'vga' => 'required|string|max:255',
            'user' => 'nullable|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $id = $request->id;
        $data = Unit::find($id);

        if (!$data) {
            return response()->json(["message" => "Data Tidak Ditemukan"], 404);
        }

        $data->fill($validated);
        $status = $data->save();

        if (!$status) {
            return response()->json(
                ["message" => "Data Gagal Di Ubah"],
                400
            );
        }
        return response()->json([
            "message" => "Data Berhasil Di Ubah"
        ], 200);
    }


    public function delete(Request $request): JsonResponse
    {
        $id = $request->id;
        $units = Unit::find($id);

        if (!$units) {
            return response()->json(["message" => "Data Tidak Ditemukan"], 404);
        }

        $status = $units->delete();

        if (!$status) {
            return response()->json(
                ["message" => "Data Gagal Di Hapus"],
                400
            );
        }
        return response()->json([
            "message" => "Data Berhasil Di Hapus"
        ], 200);
    }
}
