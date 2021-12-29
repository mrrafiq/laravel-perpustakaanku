<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;
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

Route::get('/login', [LoginController::class, 'halamanLogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postLogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


route::group(['middleware' => ['auth']], function () {
    //Route Dashboard
    Route::get('/', [DashboardController::class, 'index']);


    //CRUD untuk Buku
    Route::get('/book', [BookController::class, 'index']);
    Route::get('/book/search', [BookController::class, 'find'])->name('findBook');
    Route::get('/book/edit-book/{id}', [BookController::class, 'edit'])->name('editBook');
    Route::post('book/update', [BookController::class, 'update'])->name('updateBook');
    Route::get('/book/add-book', [BookController::class, 'create'])->name('addBook');
    Route::post('/book/postbook', [BookController::class, 'store'])->name('postBook');
    Route::delete('/book/delete-book/{id}', [BookController::class, 'destroy']);

    //CRUD untuk Keanggotaan
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/members/add-member', [MemberController::class, 'create'])->name('addMember');
    Route::post('/members/postmember', [MemberController::class, 'store'])->name('postMember');
    Route::get('/members/find', [MemberController::class, 'find'])->name('findMember');
    Route::delete('/members/delete-member/{id}', [MemberController::class, 'destroy']);
    Route::get('/members/edit-member/{id}', [MemberController::class, 'edit'])->name('editMember');
    Route::post('/members/update', [MemberController::class, 'update'])->name('updateMember');

    //CRUD untuk Peminjaman
    Route::get('/borrow', [BorrowController::class, 'index']);
    Route::get('/borrow/add-borrow', [BorrowController::class, 'create'])->name('addBorrow');
    Route::post('/borrow/postborrow', [BorrowController::class, 'store'])->name('postBorrow');
    Route::get('/borrow/edit-borrow/{id}', [BorrowController::class, 'edit'])->name('editBorrow');
    Route::post('/borrow/update', [BorrowController::class, 'update'])->name('updateBorrow');
    Route::post('/borrow/book-return/{id}', [BorrowController::class, 'bookReturn'])->name('bookReturn');
    Route::get('/borrow/find', [BorrowController::class, 'find'])->name('findBorrow');
    Route::get('/borrow/add-borrow/autocompletebook', [BorrowController::class, 'autoCompleteBook'])->name('autoCompleteBook');
    Route::get('/borrow/add-borrow/autocompletemember', [BorrowController::class, 'autoCompleteUniqueNum'])->name('autoCompleteUniqueNum');
    Route::get('/borrow/has-returned', [BorrowController::class, 'hasReturned'])->name('hasReturned');
    Route::get('/borrow/has-not-returned', [BorrowController::class, 'hasNotReturned'])->name('hasNotReturned');

    //CRUD untuk Kategori
    Route::get('/book/book-category', [CategoryController::class, 'index']);
    Route::get('/book/add-category', [CategoryController::class, 'create'])->name('addCategory');
    Route::post('/book/add-category/postkategori', [CategoryController::class, 'store'])->name('postCategory');
    Route::get('/book/book-category/edit-category/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::post('/buku/book-category/update', [CategoryController::class, 'update'])->name('updateCategory');

    //CRUD untuk Pengarang
    Route::get('/book/author', [AuthorController::class, 'index']);
    Route::get('/book/add-author', [AuthorController::class, 'create'])->name('addAuthor');
    Route::post('/book/add-author/postauthor', [AuthorController::class, 'store'])->name('postAuthor');
    Route::get('/book/author/edit-author/{id}', [AuthorController::class, 'edit'])->name('editAuthor');
    Route::post('/buku/author/update', [AuthorController::class, 'update'])->name('updateAuthor');

    //CRUD untuk Penerbit
    Route::get('/book/publisher', [PublisherController::class, 'index']);
    Route::get('/book/add-publisher', [PublisherController::class, 'create'])->name('addPublisher');
    Route::post('/book/add-publisher/postpublisher', [PublisherController::class, 'store'])->name('postPublisher');
    Route::get('/book/publisher/edit-publisher/{id}', [PublisherController::class, 'edit'])->name('editPublisher');
    Route::post('/buku/publisher/update', [PublisherController::class, 'update'])->name('updatePublisher');
});
