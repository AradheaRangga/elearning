<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    public function index(Assignment $assignment){
        return view('mahasiswa.tugas.jawaban', compact('assignment'));
    }

    public function store(Request $request, Assignment $assignment){
        // dd($request);
        $mahasiswa_id = Auth::User()->mahasiswa->id;
        $assignment_id = $assignment->id;
        $path = $request->file('file')->store('public/jawaban');

            $jawaban = new Jawaban();
            $jawaban -> assignment_id = $assignment_id;
            $jawaban -> mahasiswa_id = $mahasiswa_id;
            $jawaban -> file = $path;
            $jawaban -> save();

        return redirect()->route('mahasiswa_upload_tugas', $assignment)->with('success', 'Jawaban Berhasil Tersimpan');
    }
}