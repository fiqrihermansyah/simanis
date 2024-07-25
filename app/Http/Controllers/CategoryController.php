<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\DetailCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.master.barang.jenis');
    }

    public function list(Request $request): JsonResponse
    {
        $category = Category::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($category)
                ->addColumn('tindakan', function($data) {
                    $button = "<button class='ubah btn btn-success m-1' id='".$data->id."'>Ubah</button>";
                    $button .= "<button class='hapus btn btn-danger m-1' id='".$data->id."'>Hapus</button>";
                    return $button;
                })
                ->rawColumns(['tindakan'])
                ->make(true);
        }
    }

    public function save(CreateCategoryRequest $request): JsonResponse
    {
        $category = new Category();
        $jenisBarang = $request->input('jenis_barang');

        if ($jenisBarang === 'pc') {
            $category->fill([
                'kode_inventaris' => $request->input('kode_inventaris'),
                'jenis_barang' => $request->input('jenis_barang'),
                'serial_number' => $request->input('serial_number'),
                'merk_type' => $request->input('merk_type'),
                'tanggal_registrasi' => $request->input('tanggal_registrasi'),
                'processor' => $request->input('processor'),
                'ram' => $request->input('ram'),
                'disk' => $request->input('disk'),
                'os' => $request->input('os'),
                'vga' => $request->input('vga'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'pengguna' => $request->input('pengguna'),
                'divisi' => $request->input('divisi'),
                'lokasi' => $request->input('lokasi')
            ]);
        } else {
            $category->fill([
                'kode_inventaris' => $request->input('kode_inventaris'),
                'jenis_barang' => $request->input('jenis_barang'),
                'serial_number' => $request->input('serial_number'),
                'merk_type' => $request->input('merk_type'),
                'tanggal_registrasi' => $request->input('tanggal_registrasi'),
                'tipe_barang' => $request->input('tipe_barang'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'pengguna' => $request->input('pengguna'),
                'divisi' => $request->input('divisi'),
                'lokasi' => $request->input('lokasi')
            ]);
        }

        $status = $category->save();

        if (!$status) {
            return response()->json(
                ["message" => "Data Gagal Disimpan"]
            )->setStatusCode(400);
        }

        return response()->json([
            "message" => "Data Berhasil Disimpan"
        ])->setStatusCode(200);
    }

    public function detail(DetailCategoryRequest $request): JsonResponse
    {  
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(
            ["data" => $data]
        )->setStatusCode(200);
    }

    public function update(UpdateCategoryRequest $request): JsonResponse
    {
        $id = $request->id;
        $data = Category::find($id);
        $data->fill($request->all());
        $status = $data->save();
        if (!$status) {
            return response()->json(
                ["message" => "Data Gagal Diubah"]
            )->setStatusCode(400);
        }
        return response()->json([
            "message" => "Data Berhasil Diubah"
        ])->setStatusCode(200);
    }

    public function delete(DeleteCategoryRequest $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $status = $category->delete();
        if (!$status) {
            return response()->json(
                ["message" => "Data Gagal Dihapus"]
            )->setStatusCode(400);
        }
        return response()->json([
            "message" => "Data Berhasil Dihapus"
        ])->setStatusCode(200);
    }
}
