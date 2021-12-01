<?php

use App\Http\Livewire\Member\Auth\Login;
use App\Http\Livewire\Member\Auth\Register;
use App\Http\Livewire\Member\Dashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/member/login', Login::class)->name('member.auth.login');
Route::get('/member/register', Register::class)->name('member.auth.register');

Route::middleware(['member'])->group(function () {

    Route::get('/member/dashboard', Dashboard::class)->name('member.dashboard');
});