<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
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

    //Menambahkan Role
    // auth()->user()->assignRole('admin');

    //Cek User
    // if (auth()->user()->hasRole('user')) {
    //   return 'Oke';
    // }

    //Menghapus Role
    // auth()->user()->removeRole('admin');

    // Sungkronus atau Update Roles
    // auth()->user()->assignRole('admin', 'user');
    // auth()->user()->syncRoles(['user']);

    //Permision user

    // $user = auth()->user();
    // $role = Role::find(1);
    // dd($user);
    // $user->givePermissionTo('delete post');
    // $role->revokePermissionTo('edit post');
    // $role->syncPermissions(['delete post', 'edit post', 'view post', 'add post']);
    // dd($role->hasAnyPermission(['delete post', 'edit post']));
    // dd($user->can('delete post'));
});


//Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Login Facebook
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handlefacebookCallback']);

Route::view('home', 'home')->middleware('auth');

Route::get('/admin', [AdminController::class, 'index']);

// Route::group(['middleware' => ['role:admin']], function () {
//     Route::get('/admin', [AdminController::class, 'index']);
//     //
// });
