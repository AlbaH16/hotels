<?php

use App\Models\User;
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


Route::middleware('auth')->group(function(){

    Route::get('/',function(){
        return view('welcome');
    })->name('home');

    Route::get('registrar-visitas/{user}',function($user){
        return view('layouts.stays.create',['user_id'=>$user]);
    })->name('stay.create');

    Route::get('perfil-usuario/{user}',function($user){
        $user_email = User::select('email')->where('id',$user)->first();
        return view('layouts.users.profile',['user_id'=>$user,'user_email'=>$user_email]);
    })->name('user.profile');
});
