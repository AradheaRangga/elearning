<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function register(){
        return view('admin.register');
    }
    public function actionRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
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

    public function index(){
        // $user_id = Auth::user()->id;
        // $user = User::find($user_id);

        // return view('profile', compact('user'));
    }

    public function edit(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return view('editUser', compact('user'));
    }

    public function show(){
        $user_id = Auth::user()->id;
        $user= User::find($user_id);
        $userAll = $user::all();

        return view('profile', compact('user', 'userAll'));
    }
    public function update(Request $request){

        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        // $file = $request->file('photo');
        $path = $request->file('photo')->store('public/profile');

        $coba = $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'photo' => $path,
        ]);



        return redirect()->route('profile');
    }
}
