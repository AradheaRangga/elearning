<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

        public function store(Request $request)
    {
        Dosen::create([
            'nip' => $request->nip,
            'is_admin' => $request->is_admin,
            'gender' => $request->gender,
            'user_id' => $request->user_id
         ]);

         return redirect()->route('admin_dosen');

    }

    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }


    public function update(Request $request, Dosen $dosen)
    {
        $dosen->update([
            'nip' => $request->nip,
            'is_admin' => $request->is_admin,
            'gender' => $request->gender,
         ]);

         return redirect()->route('admin_dosen');
    }


    public function delete(Dosen $dosen)
    {

        $user = User::where('id', $dosen->user_id);

        if ($dosen->delete())
            $user->delete();
        else
        dd('gagal');

        return redirect()->route('admin_dosen');
    }
}
