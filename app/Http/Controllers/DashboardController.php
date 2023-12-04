<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = User::all();

        if(auth()->user()->dosen->is_admin){
            return view('admin.dashboard', compact('user'));
        }else{
            if(auth()->user()->role=='mahasiswa')
                return view('mahasiswa.dashboard');
            else
                return view('dosen.dashboard');
        }
    }
}
