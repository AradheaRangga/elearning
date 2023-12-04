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

         return redirect()->route('mahasiswa_index');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required',
            'nim' => 'required|min:10',
            'name' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $mahasiswa->update([
            'user_id' => $request->user_id,
            'nim' => $request->nim,
            'name' => $request->nama,
            'asal' => $request->asal,
            'gender' => $request->gender,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $user = User::where('id', $mahasiswa->user_id);

        if ($mahasiswa->delete())
            $user->delete();

        return redirect()->route('mahasiswa_index');
    }
}