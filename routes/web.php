<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Nombre;
use App\Models\User;
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

Route::get('/', function () {
    return view('test');
});

Route::post('/', function (Request $request) {
    // dd($request->input());
    $nombre = (int) $request->input('number');
    // dd($nombre);
    // return view('test');
    $estPremier = Nombre::estPremier($nombre);
    return view('test', ['estPremier' => $estPremier, 'nombre' => $nombre]);
});

Route::get('/crud/{id?}', function(?int $id = null) {
    if(!$id){
    $users = User::all();
    return view('crud', ['users' => $users]);
    } else{
        $users = User::all();
        $userUpdate = User::findOrFail($id);
        return view('crud', ['users' => $users, 'userUpdate' => $userUpdate]);
    }
})->name('crud');


Route::post('/crud', function(Request $request) {
    $id = null;
    $url = $request->session()->get('_previous')['url'];
    $name = $request->input('name');
    $email = $request->input('email');
    if(ctype_digit(substr($url, -1))) $id = explode('crud/', $url);
    if(!$id){
    $password = $request->input('password');
    $password = password_hash($password, null);
    $user = new User();
    $user->name = $name;
    $user->email = $email;
    $user->password = $password;
    $user->save();
    } else {
        $user = User::findOrFail((int) $id[1]);
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return redirect('/crud', 301);
    }
    $users = User::all();
    return view('crud', ['users' => $users]);
});

Route::get('/crud/delete/{id}', function (?int $id = null) {
    $user = User::findOrFail((int) $id);
    $user->delete();
    return redirect('/crud', 301);
})->name('crud.delete');