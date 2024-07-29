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

        $tipeBarang = $request->input('tipe_barang');
        $tanggalRegistrasi = $request->input('tanggal_registrasi');
        $date = new \DateTime($tanggalRegistrasi);
        $month = $date->format('m');
        $year = $date->format('Y');
        
        // Get the latest ID
        $lastId = Category::max('id') + 1;
        $idBarang = str_pad($lastId, 4, '0', STR_PAD_LEFT);

        $kodeInventaris = $this->generateKodeInventaris($tipeBarang, $month, $year, $idBarang);

        $category->fill([
            'kode_inventaris' => $kodeInventaris,
            'jenis_barang' => $request->input('jenis_barang'),
            'serial_number' => $request->input('serial_number'),
            'merk_type' => $request->input('merk_type'),
            'tanggal_registrasi' => $request->input('tanggal_registrasi'),
            'tipe_barang' => $request->input('tipe_barang'),
            'description' => $request->input('description'),
            'pengguna' => $request->input('pengguna'),
            'divisi' => $request->input('divisi'),
            'lokasi' => $request->input('lokasi')
        ]);

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

    private function generateKodeInventaris($tipeBarang, $month, $year, $idBarang)
    {
        $kodeTipe = '';
        switch ($tipeBarang) {
            case 'Printer':
                $kodeTipe = 'PN';
                break;
            case 'Switch':
                $kodeTipe = 'SW';
                break;
            case 'Proyektor':
                $kodeTipe = 'INF';
                break;
            case 'Access Point':
                $kodeTipe = 'AP';
                break;
            case 'CCTV':
                $kodeTipe = 'CCTV';
                break;
            case 'NVR':
                $kodeTipe = 'NVR';
                break;
        }

        return $kodeTipe . $month . $year . $idBarang;
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
