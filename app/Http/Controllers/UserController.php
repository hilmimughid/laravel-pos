<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $breadcrump = (object) [
            'title' => "Manajemen User",
            'list' => ["Home", "User"]
        ];
        $page = (object) [
            'title' => "Daftar User",
        ];
        $activeMenu = "user";
        $level = LevelModel::all();
        return view('user.index', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'level' => $level
        ]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }
        return DataTables::of($users)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrump = (object) [
            'title' => "Tambah User",
            'list' => ["Home", "User", "Tambah"]
        ];

        $activeMenu = "user";

        $level = LevelModel::all();

        $page = (object) [
            'title' => "Tambah User Baru",
        ];

        return view('user.create', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'level' => $level
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
        ]);

        UserModel::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user baru telah ditambahkan');
    }

    public function show(string $id)
    {
        $breadcrump = (object) [
            'title' => "Manajemen User",
            'list' => ["Home", "User", "Detail"]
        ];
        $page = (object) [
            'title' => "Detail User",
        ];
        $activeMenu = "user";
        $user = UserModel::with('level')->find($id);
        return view('user.show', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'user' => $user
        ]);
    }

    public function edit(string $id)
    {
        $breadcrump = (object) [
            'title' => "Edit User",
            'list' => ["Home", "User", "Edit"]
        ];
        $page = (object) [
            'title' => "Edit User",
        ];
        $activeMenu = "user";
        $user = UserModel::with('level')->find($id);
        $level = LevelModel::all();
        return view('user.edit', [
            'breadcrump' => $breadcrump,
            'activeMenu' => $activeMenu,
            'page' => $page,
            'user' => $user,
            'level' => $level
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer',
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'nama' => $request->nama,
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user telah diupdate');
    }

    public function destroy(string $id)
    {
        $check = UserModel::find($id);

        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::find($id)->delete();
            return redirect('/user')->with('success', 'Data user telah dihapus');
        } catch (\Throwable $th) {
            return redirect('/user')->with('error', 'Data user gagal dihapus');
        }
    }
}
