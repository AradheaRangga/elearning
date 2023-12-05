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
        $subject = Subject::all();
        $subjectfirst = $subject->first();
        $dosen = Dosen::with(['user'])->where('user_id', $subjectfirst->dosen_id);

        return view('admin.kelas.index', compact('subject', 'dosen'));
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
        //
    }

    public function edit(Subject $subject)
    {
        // $detailSubject = DetailSubject::where('subject_id', $subject->id)->get();
        $dosen = Dosen::all();

        return view('admin.kelas.edit', compact('subject', 'dosen'));
    }

    public function update(Request $request, Subject $subject)
    {
        $detailSubject = DetailSubject::where('subject_id', $subject->id);

        $subject->update([
            'subject_name' => $request->subject_name,
            'dosen_id' => $request->dosen_id,
        ]);


        return redirect()->route('index_kelas');
    }

    public function destroy(Subject $subject)
    {
        //
    }
}
