<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DetailSubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/action', [AuthController::class, 'actionLogin'])->name('login_action');

Route::post('/logout', [AuthController::class, 'actionLogout'])->name('logout');

Route::post('/kelas/masuk/action/{subject}', [DetailSubjectController::class, 'store'])->name('ambil_kelas_action');
// Route::get('/user/profile', [UserController::class, 'show'])->name('profile');
// Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('edit_profile');
// Route::post('/user/profile/edit/action/{id}', [UserController::class, 'update'])->name('update_profile_action');
Route::resource('profile', UserController::class);

Route::prefix('/kelas')->group(function () {
    Route::get('/',[SubjectController::class, 'index'])->name('index_kelas');
    Route::get('/tambah', [SubjectController::class, 'create'])->name('tambah_kelas');
    Route::post('/tambah/action/', [SubjectController::class, 'store'])->name('tambah_kelas_action');
    Route::get('/edit/{subject}', [SubjectController::class, 'edit'])->name('edit_kelas');
    Route::post('/edit/action/{subject}', [SubjectController::class, 'update'])->name('update_kelas_action');
    Route::delete('/delete/{subject}', [SubjectController::class, 'destroy'])->name('delete_kelas');
    Route::get('/show', [SubjectController::class, 'show'])->name('show_kelas');
});
Route::prefix('/mahasiswa')->group(function () {
   Route::get('/',[MahasiswaController::class, 'index'])->name('admin_mahasiswa');
   Route::get('/tambah', [MahasiswaController::class, 'create'])->name('tambah_mahasiswa');
   Route::post('/tambah/action', [MahasiswaController::class, 'store'])->name('tambah_mahasiswa_action');
   Route::get('/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('edit_mahasiswa');
   Route::post('/edit/action/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update_mahasiswa_action');
   Route::delete('/delete/{mahasiswa}', [MahasiswaController::class, 'delete'])->name('delete_mahasiswa');
});

Route::prefix('/dosen')->group(function () {
    Route::get('/',[DosenController::class, 'index'])->name('admin_dosen');
    Route::get('/tambah', [DosenController::class, 'create'])->name('tambah_dosen');
    Route::post('/tambah/action', [DosenController::class, 'store'])->name('tambah_dosen_action');
    Route::get('/edit/{dosen}', [DosenController::class, 'edit'])->name('edit_dosen');
    Route::post('/edit/action/{dosen}', [DosenController::class, 'update'])->name('update_dosen_action');
    Route::delete('/delete/{dosen}', [DosenController::class, 'delete'])->name('delete_dosen');

});



    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');
        Route::prefix('/user')->group(function () {
            Route::get('/register', [UserController::class, 'register'])->name('register');
            Route::post('/register/action', [UserController::class, 'actionRegister'])->name('register_action');
        });
    });


Route::middleware(['auth'])->group(function () {
    Route::prefix('/dosen')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dosen_dashboard');
        Route::prefix('/tugas')->group(function () {
            Route::get('/', [AssignmentController::class, 'index'])->name('dosen_tugas');
            Route::get('/tambah', [AssignmentController::class, 'create'])->name('dosen_tugas_tambah');
            Route::post('/tambah/action', [AssignmentController::class, 'store'])->name('dosen_tugas_tambah_action');
            Route::get('/edit/{id}', [AssignmentController::class, 'edit'])->name('dosen_tugas_edit');
        });
    });
});

Route::prefix('/mahasiswa')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('mahasiswa_dashboard');
});
Route::middleware(['auth', 'mahasiswa'])->group(function () {
});