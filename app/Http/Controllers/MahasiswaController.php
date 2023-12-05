<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }


    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create([
            'nim' => $request->nim,
            'tanggal_lahir' => $request->tanggal_lahir,
            'asal' => $request->asal,
            'gender' => $request->gender,
            'user_id' => $request->user_id
         ]);

         return redirect()->route('admin_mahasiswa');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update([
            'nim' => $request->nim,
            'tanggal_lahir' => $request->tanggal_lahir,
            'asal' => $request->asal,
            'gender' => $request->gender,
         ]);

         return redirect()->route('admin_mahasiswa');
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $user = User::where('id', $mahasiswa->user_id);

        if ($mahasiswa->delete())
            $user->delete();

        return redirect()->route('admin_dashboard');
    }
}