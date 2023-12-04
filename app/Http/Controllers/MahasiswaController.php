<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();

        return view('admin.mahasiswa.index', compact('data'));
    }


    public function create(Request $request)
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

         return view('admin.mahasiswa.index');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $user = User::where('id', $mahasiswa->user_id)->get();

        return view('admin.mahasiswa.edit', compact('user', 'mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {

        $mahasiswa->update([
            'nim' => $request->nim,
            'tanggal_lahir' => $request->tanggal_lahir,
            'asal' => $request->asal,
            'gender' => $request->gender,
            'user_id' => $request->user_id
         ]);

         return view('admin.mahasiswa.index');
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $user = User::where('id', $mahasiswa->user_id);

        if ($mahasiswa->delete())
            $user->delete();

        return redirect()->route('admin_dashboard');
    }
}
