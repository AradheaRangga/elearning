<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\DetailSubject;
use Illuminate\Support\Facades\Auth;

class DetailSubjectController extends Controller
{
    public function index()
    {

    }


    public function create()
    {

    }

    public function store(Subject $subject)
    {
        $mahasiswa_id = Auth::user()->mahasiswa->id;

        DetailSubject::create([
            'mahasiswa_id' => $mahasiswa_id,
            'subject_id' => $subject->id,
        ]);

        return redirect()->route('mahasiswa_dashboard');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update()
    {
    }

    public function destroy($id)
    {
        //
    }
}
