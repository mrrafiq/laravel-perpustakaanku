<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PublisherController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BorrowController;



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
    Route::get('/category',[CategoryController::class,'category']);
    Route::post('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/update', [CategoryController::class, 'update']);

    //CRUD untuk Penerbit
    Route::get('/publisher',[PublisherController::class,'publisher']);
    Route::post('/publisher/create', [PublisherController::class, 'create']);
    Route::post('/publisher/update', [PublisherController::class, 'update']);

    //CRUD untuk Penulis
    Route::get('/author',[AuthorController::class,'author']);
    Route::post('/author/create', [AuthorController::class, 'create']);
    Route::post('/author/update', [AuthorController::class, 'update']);

    //CRUD untuk Buku
    Route::get('/book',[BookController::class,'book']); 
    Route::post('/book/create', [BookController::class, 'create']);
    Route::post('/book/update', [BookController::class, 'update']);
    Route::post('/book/delete', [BookController::class, 'delete']);

    //CRUD untuk Peminjaman
    Route::get('/borrow',[BorrowController::class,'borrow']); 
    Route::post('/borrow/create', [BorrowController::class, 'create']);
    Route::post('/borrow/update', [BorrowController::class, 'update']);


    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/chart',[ChartController::class,'index']);
Route::get('/chart2',[ChartController::class,'chart']);

