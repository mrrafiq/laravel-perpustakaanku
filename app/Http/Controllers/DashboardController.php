<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_total = Member::count();
        $book_total = Book::count();
        $borrow_total = Borrow::count('id');
        // $per_book = DB::table('borrows')->count('id')->groupBy('borrows.book_id');
        // // $book_favorite = Borrow::with('book')->orderBy($borrow_total)->groupBy('book_id')->first();
        // // $book_favorite = DB::table('borrows')
        // //                     ->join('books', 'borrows.book_id', '=', 'books.id')
        // //                     ->select('books.title')->orderBy('borrows.id')->groupBy('books.title')->limit(1);
        // dd($per_book);
        // $book_favorite_data = json_encode($book_favorite);
        return view('dashboard',[
            'member_total' => $member_total,
            'book_total' => $book_total,
            'borrow_total' => $borrow_total,
            'book_favorite' => $book_favorite,
            "title" => "Dashboard",
            "head" => "Dashboard",
            "message" => "Selamat Datang",
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
