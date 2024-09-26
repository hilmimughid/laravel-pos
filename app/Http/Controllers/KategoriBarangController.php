<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $breadcrump = (object) [
            'title' => "Manajemen Kategori Barang",
            'list' => ["Home", "Level"]
        ];
        $page = (object) [
            'title' => "Daftar Kategori",
        ];
        $activeMenu = "kategori";
        return view('kategori.index', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page
        ]);
    }

    public function list()
    {
        $kategori = KategoriBarang::select('kategori_id', 'kategori_kode', 'kategori_nama');
        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrump = (object) [
            'title' => "Tambah Kategori Barang",
            'list' => ["Home", "Kategori"]
        ];
        $page = (object) [
            'title' => "Tambah",
        ];
        $activeMenu = "kategori";
        return view('kategori.create', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|unique:m_kategori|max:10',
            'kategori_nama' => 'required|max:100',
        ]);
        $data = $request->all();
        KategoriBarang::create($data);
        return redirect('/kategori')->with('success', 'Data Kategori Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $breadcrump = (object) [
            'title' => "Edit Kategori",
            'list' => ["Home", "Kategori"]
        ];
        $page = (object) [
            'title' => "Edit Kategori",
        ];
        $activeMenu = "kategori";
        $kategori = KategoriBarang::find($id);
        return view('kategori.edit', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_kode' => 'required|unique:m_kategori,kategori_kode,' . $id . ',kategori_id|max:10',
            'kategori_nama' => 'required|max:100',
        ]);

        $data = $request->all();
        KategoriBarang::find($id)->update($data);
        return redirect('/kategori')->with('success', 'Data Kategori Berhasil Diubah');
    }

    public function destroy($id)
    {
        $kategori = KategoriBarang::where('kategori_id', $id)->firstOrFail();
        $kategori->delete();
        return redirect('/kategori')->with('success', 'Data Kategori Berhasil Dihapus');
    }

    public function show($id)
    {
        $breadcrump = (object) [
            'title' => "Detail Kategori",
            'list' => ["Home", "Kategori"]
        ];
        $page = (object) [
            'title' => "Detail Kategori",
        ];
        $activeMenu = "kategori";
        $kategori = KategoriBarang::find($id);
        return view('kategori.show', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'kategori' => $kategori
        ]);
    }
}
