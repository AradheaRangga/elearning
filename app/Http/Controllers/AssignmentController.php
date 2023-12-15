<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Assignment;
use App\Models\DetailSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {

        if(Auth::user()->role == 'dosen'){
            $dosen_id = Auth::user()->dosen->id;
            $subject = Subject::where('dosen_id', $dosen_id)->get()->first();
            $tugas = Assignment::all();
            if($subject){
                $detailSubject = DetailSubject::where('subject_id', $subject->id)->get()->first();
                return view('dosen.tugas.index', compact( 'detailSubject','subject', 'tugas'));
            }
            return view('dosen.tugas.index', compact('subject', 'tugas'));
        } else {
            $subjectIdsTakenByMahasiswa = DetailSubject::with('subject')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->pluck('subject_id');
            $subjectsAvailable = Subject::whereNotIn('id', $subjectIdsTakenByMahasiswa)->get();
            $subjects = Subject::with('assignments')->get();
            $mahasiswaSubjects = DetailSubject::with('subject')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
            return view('mahasiswa.tugas.index', compact( 'mahasiswaSubjects', 'subjectsAvailable', 'subjects'));
        }
    }



    public function create(Subject $subject){
        return view('dosen.tugas.create', compact('subject'));    }

       public function store(Request $request, Subject $subject)
    {

        $path = $request->file('content')->store('public/soal');


            $assignment = new Assignment();
            $assignment->subject_id = $subject->id;
            $assignment->title = $request->title;

            $originalDate = $request->deadline;
            $newDate = date('Y-m-d', strtotime($originalDate));

            $assignment->deadline = $newDate;
            $assignment->description = $request->description;
            $assignment->content = $path;
            $assignment->save();

        return(redirect()->route('dosen_show_kelas')->with(['success' => 'Tugas Berhasil Dibuat!']));

    }
}
