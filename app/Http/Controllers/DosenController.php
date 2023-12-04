<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return view('admin.dosen.index');
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

         return view('admin.dosen.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
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
            'user_id' => $request->user_id
         ]);

         return view('admin.dosen.index');
    }


    public function delete(Dosen $dosen)
    {

        $user = User::where('id', $dosen->user_id);

        if ($dosen->delete())
            $user->delete();
        else
        dd('gagal');

        return view('admin.dashboard');
    }
}