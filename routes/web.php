<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SubjectController;
use App\Models\Assignment;

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
Route::get('/editMahasiswa/{mahasiswa}',[MahasiswaController::class, 'edit'])->name('edit_mahasiswa');



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/action', [AuthController::class, 'actionLogin'])->name('login_action');

Route::post('/logout', [AuthController::class, 'actionLogout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');
        Route::prefix('/user')->group(function () {
            Route::get('/register', [UserController::class, 'register'])->name('register');
            Route::post('/register/action', [UserController::class, 'actionRegister'])->name('register_action');
            Route::get('/Dosen', [DosenController::class, 'index'])->name('admin_dosen');
            Route::get('/editDosen/{dosen}', [DosenController::class, 'edit'])->name('edit_dosen');
            // Route::get('/editMahasiswa/{mahasiswa}',[MahasiswaController::class, 'edit'])->name('edit_mahasiswa');
            Route::patch('/editDosen/action', [DosenController::class, 'update'])->name('update_dosen_action');
            Route::patch('/editMahasiswa/action', [MahasiswaController::class, 'update'])->name('update_mahasiswa_action');
            Route::delete('/{dosen}/deleteDosen', [DosenController::class, 'delete'])->name('delete_dosen');
            Route::delete('/{mahasiswa}/deleteMahasiswa', [MahasiswaController::class, 'delete'])->name('delete_mahasiswa');
            Route::get('/tambahDosen', [DosenController::class, 'create'])->name('tambah_dosen');
            Route::post('/tambahDosen/action', [DosenController::class, 'store'])->name('tambah_dosen_action');
            Route::get('/Mahasiswa', [MahasiswaController::class, 'index'])->name('admin_mahasiswa');
            Route::get('/tambahMahasiswa', [MahasiswaController::class, 'create'])->name('tambah_mahasiswa');
            Route::post('/tambahMahasiswa/action', [MahasiswaController::class, 'store'])->name('tambah_mahasiswa_action');
        });
        Route::get('/Kelas',[AssignmentController::class, 'index'])->name('admin_kelas');
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
        Route::get('/kelas', [SubjectController::class, 'index'])->name('dosen_kelas');
    });
});

Route::middleware(['auth', 'mahasiswa'])->group(function () {

});