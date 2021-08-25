<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Member;
use Carbon\Carbon;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::with(['member','book'])->paginate(10);

        return view('borrow',[
            "title" => "Peminjaman",
            "head" => "Peminjaman",
            "message" => "Berikut merupakan daftar peminjaman buku oleh anggota.",
            
        ], compact("borrows"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/add-borrow',['title' => "Pinjam Buku"]);
    }

    public function autoCompleteBook(Request $request)
    {
        $book = Book::select('title')->where('name', 'LIKE',"%{$request->terms}%")->get();
        return response()->json($book);
    }

    public function autoCompleteUniqueNum(Request $request)
    {
        $member = Member::select('unique_num')->where('unique_num', 'LIKE', "%{$request->terms}%")->get();
        return response()->json($member);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'unique_num' => 'required|exists:members,unique_num',
            'title' => 'required|exists:books,title',
        ]);

        $member = Member::select('id')->where('unique_num', $request->unique_num)->first();
        $book = Book::select('id')->where('title', $request->title)->first();

        Borrow::create([
            'member_id' => $member->id,
            'book_id' => $book->id,
            'borrow_date' => now(),
            'return_date' => Carbon::now()->add(7,'days'),
            'fine' => 0,
            'status' => 0
        ]);

        $stock = Book::select('stock')->where('id', $book->id)->first();

        DB::table('books')->where('id', $book->id)->update([
            'stock' => ($stock->stock) - 1,
        ]);

        return redirect('/borrow')->with('success', 'Buku berhasil ditambahkan!');
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
        $borrow =  Borrow::with(['member','book'])->where('id',$id)->first();
        // $member = Member::select('unique_num')->where('id',$borrow->member_id)->get();
        // $book = Book::select('title')->where('id',$borrow->book_id)->get();
        return view('update/edit-borrow',['borrow' => $borrow, "title" => "Edit Peminjaman"]);
    }

    public function find(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string'
        ]);

        $search = $request->search;
        $borrows = Borrow::with('member','book')
        ->where('borrow_date','LIKE', '%'.$search.'%')
        ->orWhere('return_date','LIKE', '%'.$search.'%')
        ->orWhereHas('book', function (Builder $query) use ($search) {
            $query->where('title', 'LIKE', '%'.$search.'%');
        })
        ->orWhereHas('member', function (Builder $query) use ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%');
        })
        ->paginate(10);

        return view('borrow',[
            "title" => "Pencarian Peminjaman", 
            "head" => "Peminjaman", 
            "message" => "Berikut merupakan hasil pencarian dari '$search'."], 
            compact('borrows'));
    }

    public function hasReturned(){
        $borrows = Borrow::where('status',1)->paginate(10);
        return view('borrow',[
            "title" => "Peminjaman",
            "head" => "Peminjaman",
            "message" => "Berikut merupakan daftar peminjaman buku yang sudah dikembalikan oleh anggota.",
        ], compact('borrows'));
    }

    public function hasNotReturned(){
        $borrows = Borrow::where('status',0)->paginate(10);
        return view('borrow',[
            "title" => "Peminjaman",
            "head" => "Peminjaman",
            "message" => "Berikut merupakan daftar peminjaman buku yang belum dikembalikan oleh anggota.",
        ], compact('borrows'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'unique_num' => 'required|exists:members,unique_num',
            'title' => 'required|exists:books,title',
        ]);
        $member = Member::select('id')->where('unique_num', $request->unique_num)->first();
        $book = Book::select('id')->where('title', $request->title)->first();
        $borrow = Borrow::where('id', $request->id)->first();

        if ($request->return_date < $borrow->borrow_date) {
            return redirect('borrow/edit-borrow/'.$borrow->id)->with('danger', 'Pastikan tanggal kembali benar atau cek kembali nomor unik dan judul buku dengan benar!');
        }else {
            DB::table('borrows')->where('id', $request->id)->update([
                'member_id' => $member->id,
                'book_id'=> $book->id,
                'return_date' => $request->return_date,
            ]);
    
            return redirect('/borrow')->with('success', 'Data berhasil diperbarui!');
        }
        
    }

    public function bookReturn($id){
        $borrow = Borrow::find($id);
        $borrow->status = '1';
        $stock = Book::select('stock')->where('id', $borrow->book_id)->first();
        Book::where('id',$borrow->book_id)->update(['stock' => ($stock->stock) +1 ]);
        $return_date = $borrow->return_date;
        $now = Carbon::now();
        $fine = (int)($now->diffInDays($return_date, false));
        if($fine < 0){
            $total = abs(($fine)*500);
        }elseif($fine >= 0) {
            $total = 0;
        }
        $borrow->fine = $total;
        $borrow->save();
        return redirect('/borrow')->with('success', 'Data berhasil diperbarui!');
        
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
