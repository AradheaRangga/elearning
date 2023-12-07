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
        $mahasiswa_id = Mahasiswa::where('id', auth()->user()->mahasiswa->id)->get()->first();
        $detailSubject = DetailSubject::where('mahasiswa_id', auth()->user()->mahasiswa->id);
        $subject = Subject::where('id', $mahasiswa_id->subject_id);
        // $dataArray = array();
        // foreach($subject as $item){
        //     $getDataDetailSubjek = DetailSubject::where('mahasiswa_id', $mahasiswa_id->id)->where('subject_id', $item->id)->first();
        //     if($getDataDetailSubjek != null){
        //         array_push($dataArray, $getDataDetailSubjek);
        //     }
        // }

        if(auth()->user()->role == 'dosen'){
            if(auth()->user()->dosen->is_admin)
                return view('admin.dashboard', compact('user'));
            else
                return view('dosen.dashboard', compact('user', 'mahasiswa'));
        }else
            return view('mahasiswa.dashboard', compact( 'subject', 'detailSubject', 'mahasiswa'));
    }
}