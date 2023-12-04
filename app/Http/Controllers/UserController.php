<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        return view('admin.register');
    }
    public function actionRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:6',
        ]);

         $user = new User();
         $user->name = $request->name;
         $user->role = $request->role;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->save();


         if($user->role == 'mahasiswa'){
            return view('admin.mahasiswa.create', compact('user'));
         }else{
            return view('admin.dosen.create', compact('user'));
         }
    }
}