<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        $tugas = Assignment::all();

        return view('dosen.tugas.index', compact('tugas'));
    }


    public function create(){
        return view('dosen.tugas.create');
    }

       public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'content' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('photo');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalName();
        Storage::disk('local')->put('public/'.$path,  file_get_contents($file));

        Assignment::create([
           'title' => $request->title,
           'description' => $request->description,
           'deadline' => $request->deadline,
           'content' => $path,
        ]);
        return(redirect('/admin/assignment')->with(['success' => 'Tugas Berhasil Dibuat!']));
    }
}