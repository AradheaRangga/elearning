<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\DetailSubject;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::with(['dosen'])->get();

        return view('admin.kelas.index', compact('subject'));
    }

    public function create()
    {
        $dosen = Dosen::all();

        return view('admin.kelas.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $subject = new Subject();
        $subject->subject_name = $request->subject_name;
        $subject->dosen_id = $request->dosen_id;
        $subject->save();

        DetailSubject::create([
            'subject_id' => $subject->id,
        ]);
        return redirect()->route('index_kelas');
    }

    public function show(Subject $subject)
    {
        $detailSubject = DetailSubject::where('subject_id', $subject->id)->get();
        $dosen = Dosen::all();

        return view('dosen.kelas.show', compact('subject', 'dosen', 'detailSubject'));
    }

    public function edit(Subject $subject)
    {
        $dosen = Dosen::all();

        return view('admin.kelas.edit', compact('subject', 'dosen'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update([
            'subject_name' => $request->subject_name,
            'dosen_id' => $request->dosen_id,
        ]);


        return redirect()->route('index_kelas');
    }

}