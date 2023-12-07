<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Mahasiswa;
use App\Models\DetailSubject;


class DashboardController extends Controller
{
    public function index(){
        $user = User::all();
        $mahasiswa = Mahasiswa::all();
        if(auth()->user()->role == 'dosen'){
            if(auth()->user()->dosen->is_admin)
                $admin = auth()->user()->dosen->is_admin;
            else
            $dosen = auth()->user()->dosen;
        }else{
        $subjectIdsTakenByMahasiswa = DetailSubject::where('mahasiswa_id', auth()->user()->mahasiswa->id)->pluck('subject_id');
        $subjectsAvailable = Subject::whereNotIn('id', $subjectIdsTakenByMahasiswa)->get();
        }

        if(auth()->user()->role == 'dosen'){
            if(auth()->user()->dosen->is_admin)
                return view('admin.dashboard', compact('user'));
            else
                return view('dosen.dashboard', compact('user', 'mahasiswa'));
        }else
            return view('mahasiswa.dashboard', compact( 'subjectsAvailable'));
    }
}