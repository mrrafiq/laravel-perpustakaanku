<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

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
        $book_favorite = DB::table('borrows')
                        ->select('books.title')
                        ->join('books', 'borrows.book_id' , '=', 'books.id')
                        ->groupBy('books.title')
                        ->orderBy(DB::raw('count(borrows.id)'), 'desc')
                        ->first();
                        
        $book_favorite_total = DB::table('borrows')
                        ->select(DB::raw('count("book_id") as total'))
                        ->join('books', 'borrows.book_id' , '=', 'books.id')
                        ->groupBy('books.title')
                        ->orderBy(DB::raw('count(borrows.id)'), 'desc')
                        ->first();
        $now = Carbon::now();
        
        $year_now = $now->year;
        $month_now = $now->month;
        $result = DB::table('borrows')
                    ->whereYear('borrow_date', $year_now)
                    ->get();
        return view('dashboard',[
            'member_total' => $member_total,
            'book_total' => $book_total,
            'borrow_total' => $borrow_total,
            'book_favorite' => $book_favorite,
            'book_favorite_total' => $book_favorite_total,
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
