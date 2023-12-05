<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function actionLogin(Request $request){

       $data = $request->validate([
           'email' => 'required',
           'password' => 'required'
       ]);

        if(Auth::attempt($data)){
            if(Auth::user()->role == 'dosen'){
                if(Auth::user()->dosen->is_admin)
                    return redirect()->route('admin_dashboard');
                else
                    return redirect()->route('dosen_dashboard');
            }else
                return redirect()->route('mahasiswa_dashboard');
        }else{
            return redirect('/login');
        }
    }
    public function actionLogout(){
        Auth::logout();
        return redirect('/login');
    }
}