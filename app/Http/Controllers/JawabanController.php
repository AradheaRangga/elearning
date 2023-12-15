<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index(Assignment $assignment){
        return view('mahasiswa.tugas.jawaban', compact('assignment'));
    }
}