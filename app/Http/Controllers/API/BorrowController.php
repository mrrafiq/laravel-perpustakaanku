<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    public function borrow(Request $request)
    {
        $id = $request->id;
        $book_id = $request->book_id;
        $status = $request->status;
        $member_id = $request->member_id;

        if ($id == null && $book_id == null && $status == null) {
            $borrow = Borrow::all();
        }
        elseif ($id != null) {
            $borrow = Borrow::where('id', $id)->get();
        }
        elseif ($book_id != null) {
            $borrow = Borrow::where('book_id', $book_id)->get();
        }
        elseif ($status != null) {
            $borrow = Borrow::where('status', $status)->get();
        }
        elseif ($member_id != null) {
            $borrow = Borrow::where('member_id', $member_id)->get();
        }

        return response()->json($borrow);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'member_id' => 'required|exists:members,id|max:100',
            'book_id' => 'required|exists:books,id',
        ]);

        Borrow::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'borrow_date' => now(),
            'return_date' => Carbon::now()->add(7,'days'),
            'fine' => 0,
            'status' => 0
        ]);

        $book = Book::select('id')->where('id', $request->book_id)->first();
        $stock = Book::select('stock')->where('id', $request->book_id)->first();

        DB::table('books')->where('id', $book->id)->update([
            'stock' => ($stock->stock) - 1,
        ]);

        return response()->json([
            'message' => 'Insert Data Success!'
        ],200);
    }

    public function update(Request $request)
    {
        $request->validateWithBag($request,[
            'id' => ['required','exists:borrows,id'],
            'member_id' => ['required','exists:members,id','max:100'],
            'book_id' => ['required','exists:books,id'],
        ]);

        $book = Book::select('id')->where('id', $request->book_id)->first();
        $stock = Book::select('stock')->where('id', $request->book_id)->first();
        $borrow = Borrow::where('id', $request->id)->first();

        if ($request->return_date < $borrow->borrow_date) {
            return response()->json([
                'message' => 'Tanggal Pengembalian tidak boleh sebelum tanggal peminjaman!'
            ],401);

        }
        else{
            DB::table('borrows')->where('id', $request->id)->update([
                'member_id' => $request->member_id,
                'book_id'=> $request->book_id,
                'return_date' => $request->return_date,
            ]);
            return response()->json([
                'message' => 'Update Data Success!'
            ],200);
        }
    }
}
