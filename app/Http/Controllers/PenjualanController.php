<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrump = (object) [
            'title' => "Manajemen Transaksi Penjualan",
            'list' => ["Home", "Penjualan"]
        ];
        $page = (object) [
            'title' => "Daftar Penjualan Barang",
        ];
        $activeMenu = "penjualan";
        return view('penjualan.index', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page
        ]);
    }

    public function list()
    {
        $penjualan = PenjualanDetail::select('detail_id', 'penjualan_id', 'barang_id', 'harga', 'jumlah', DB::raw('harga * jumlah as total'))
            ->with(['barang', 'penjualan']);

        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/penjualan/' . $penjualan->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjualan/' . $penjualan->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $penjualan->penjualan_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
