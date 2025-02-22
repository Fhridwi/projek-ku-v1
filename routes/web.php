<?php

use App\Http\Controllers\Admin\Akun\AkunController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\tahunAjaran\tahunAjaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\Jenjang\JenjangPendidikanController;
use App\Http\Controllers\admin\Status\StatusPendaftaranController;
use App\Http\Controllers\admin\Pendaftar\PendaftarController;
use App\Http\Controllers\WaliController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('store.login');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
   return 'Berhasil login';
})->name('home');

// Route untuk Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //Tahun Ajaran\
    Route::get('/tahunAjaran', [tahunAjaranController::class, 'index'])->name('admin.tahunAjaran');
    Route::get('/tahunAjaran/create', [tahunAjaranController::class, 'create'])->name('admin.tahunAjaran.create');
    Route::post('/tahunAjaran', [tahunAjaranController::class,'store'])->name('admin.tahunAjaran.store');
    Route::get('/tahunAjaran/edit/{tahunAjaran}', [tahunAjaranController::class, 'edit'])->name('admin.tahunAjaran.edit');
    Route::put('/tahunAjaran/edit/{tahunAjaran}', [tahunAjaranController::class, 'update'])->name('admin.tahunAjaran.update');
    Route::delete('/tahunAjaran/{tahunAjaran}', [tahunAjaranController::class, 'destroy'])->name('admin.tahunAjaran.destroy');

    //jenjang pendidikan
    Route::resource('jenjang', JenjangPendidikanController::class);    
    //status
    Route::resource('status', StatusPendaftaranController::class);
    //pendaftar
    Route::resource('pendaftar', PendaftarController::class);
    //Akun Pengguna
    Route::resource('akun', AkunController::class);

});

// Route untuk Wali Santri
Route::prefix('wali')->middleware(['auth', 'role:wali_santri'])->group(function() {
    Route::get('/dashboard', [WaliController::class, 'index'])->name('wali.dashboard');
});
