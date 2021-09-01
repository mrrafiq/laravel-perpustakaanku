<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MemberController;



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
Route::post('/login',[AuthController::class,'login']);
Route::group(['middleware' => 'auth:sanctum'], function()
{
    //CRUD untuk Member
    Route::post('/member/create', [MemberController::class, 'createMember']);
    Route::post('/member/update', [MemberController::class, 'updateMember']);
    Route::post('/member/delete', [MemberController::class, 'deleteMember']);
    Route::get('/member',[MemberController::class,'member']);

    //CRUD untuk Kategori
    

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/chart',[ChartController::class,'index']);
Route::get('/chart2',[ChartController::class,'chart']);

