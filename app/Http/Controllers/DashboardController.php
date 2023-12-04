<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->dosen->is_admin){
            return view('admin.dashboard');
        }else{
            if(auth()->user()->role=='mahasiswa')
                return view('mahasiswa.dashboard');
            else
                return view('dosen.dashboard');
        }
    }
}