<?php

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

// Route::get('/users', function () {
//    return view('users');
//    return "Laravel basics";
//    return ["Name"=>"priya","Age"=>10];
// });

//Required parms and optinal parameters

// Route::get('/users/{id?}/{name}', function ($id=null,$name) {
//     return view('users',['ID'=>$id,'Name'=>$name]);
// });

//routing with query string
Route::get('/users', function () {
    $name = request('name');
    $exp = request('exp');
    return view('users', ['Name' => $name, 'Exp' => $exp]);
});
