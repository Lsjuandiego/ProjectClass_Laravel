<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecurityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(PermissionsController::class)->group(function () {
Route::get('permissions','index'); //Para obtener todos
Route::get('permissions/{id}', 'show'); //Para consultar especifico
Route::post('permissions', 'store'); //Para guardar
Route::put('permissions/{id}', 'update'); //Para actualizar
Route::delete('permissions/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(ProfilesController::class)->group(function () {
Route::get('profiles','index'); //Para obtener todos
Route::get('profiles/{id}', 'show'); //Para consultar especifico
Route::post('profiles', 'store'); //Para guardar
Route::put('profiles/{id}', 'update'); //Para actualizar
Route::delete('profiles/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(RoleController::class)->group(function () {
Route::get('roles','index'); //Para obtener todos
Route::get('roles/{id}', 'show'); //Para consultar especifico
Route::post('roles', 'store'); //Para guardar
Route::put('roles/{id}', 'update'); //Para actualizar
Route::delete('roles/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(PermissionRoleController::class)->group(function () {
Route::get('PermissionRole','index'); //Para obtener todos
Route::get('PermissionRole/{id}', 'show'); //Para consultar especifico
Route::post('PermissionRole', 'store'); //Para guardar
Route::put('PermissionRole/{id}', 'update'); //Para actualizar
Route::delete('PermissionRole/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(UserController::class)->group(function () {
    Route::get('users','index'); //Para obtener todos
    Route::get('users/{id}', 'show'); //Para consultar especifico
    Route::post('users', 'store'); //Para guardar
    Route::put('users/{id}', 'update'); //Para actualizar
    Route::delete('users/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(SecurityController::class)->group(function () {
    Route::post('login','login');
    Route::post('logout','logout');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});