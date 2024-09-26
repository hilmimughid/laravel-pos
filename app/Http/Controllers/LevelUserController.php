<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelUserController extends Controller
{
    public function index()
    {
        $breadcrump = (object) [
            'title' => "Manajemen Level User",
            'list' => ["Home", "Level"]
        ];
        $page = (object) [
            'title' => "Daftar Level",
        ];
        $activeMenu = "level";
        return view('level.index', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page
        ]);
    }

    public function list()
    {
        $level = LevelModel::select('level_id', 'level_kode', 'level_nama');
        return DataTables::of($level)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrump = (object) [
            'title' => "Tambah Level",
            'list' => ["Home", "Level", "Tambah"]
        ];

        $activeMenu = "level";

        $page = (object) [
            'title' => "Tambah Level Baru",
        ];

        return view('level.create', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|unique:m_level|max:10|alpha',
            'level_nama' => 'required|max:100',
        ]);

        LevelModel::create($request->all());

        return redirect('/level')->with('success', 'Level baru ditambahkan');
    }

    public function edit($id)
    {
        $breadcrump = (object) [
            'title' => "Edit Level",
            'list' => ["Home", "Level", "Edit"]
        ];

        $activeMenu = "level";
        $level = LevelModel::find($id);

        $page = (object) [
            'title' => "Edit Level",
        ];

        return view('level.edit', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'level' => $level
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_kode' => 'required|unique:m_level,level_kode,' . $id . ',level_id|max:10|alpha',
            'level_nama' => 'required|max:100',
        ]);
        LevelModel::find($id)->update($request->all());

        return redirect('/level')->with('success', 'Level berhasil diupdate');
    }

    public function destroy($id)
    {
        $level = LevelModel::where('level_id', $id)->firstOrFail();
        $level->delete();
        return redirect('/level')->with('success', 'Level berhasil dihapus');
    }

    public function show($id)
    {
        $breadcrump = (object) [
            'title' => "Detail Level",
            'list' => ["Home", "Level", "Detail"]
        ];
        $activeMenu = "level";
        $level = LevelModel::find($id);
        $page = (object) [
            'title' => "Detail Level",
        ];
        return view('level.show', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'level' => $level
        ]);
    }
}
