<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with(['category','author','publisher'])->paginate(10);
        return view('book',
        ["title" => "Buku",
        "head" => "Daftar Buku",
        "message" => "Berikut merupakan daftar buku dari perpustakaan ini."], compact('books'));
    }

    public function find(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);

        $search = $request->search;

        $books = Book::with('category', 'author', 'publisher')
            ->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('year', 'LIKE','%'.$search.'%')
            ->orWhere('stock', 'LIKE', '%'.$search.'%')
            ->orWhereHas('category', function (Builder $query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orWhereHas('author', function (Builder $query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orWhereHas('publisher', function (Builder $query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(10);

        return view('book', ['books' => $books, "title" => "Pencarian Buku", "head" => "Daftar Buku", "message" => "Berikut merupakan hasil pencarian dari '$search'."]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $authors = Author::get();
        $publishers = Publisher::get();
        return view('create/add-book',["title" => "Tambah Buku", "categories" => $categories, "authors" => $authors, "publishers" => $publishers]);
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
            'title' => 'required|unique:books|max:100',
            'category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'year' => 'required',
            'stock' =>'required'
        ]);
        
        $book = new Book;
        $book->title = $request->input('title');
        $book->category_id = $request->input('category_id');
        $book->author_id = $request->input('author_id');
        $book->publisher_id = $request->input('publisher_id');
        $book->year = $request->input('year');
        $book->stock = $request->input('stock');
        $book->save();
        return redirect('/book')-> with('success', 'Buku berhasil ditambahkan!');
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
        $categories = Category::all();
        $book =Book::with('author','publisher')->where('id', $id)->first();
        return view('update/edit-book',['book' => $book, "title" => "Edit Buku", 'categories' => $categories]);
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
        $author = Author::select('id')->where('name', $request->author)->first();
        $publisher = Publisher::select('id')->where('name', $request->publisher)->first();

        DB::table('books')->where('id', $request->id)->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
            'year' => $request->year,
            'stock' => $request->stock
        ]);
        return redirect('/book')-> with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('book')->where('id', $id)->delete();
        $book = Book::find($id);
        $book->delete();
        return redirect('/book')->with('danger','Data berhasil dihapus!');
    }

    // public function delete($id)
    // {
    //     DB::table('book')->where('id', $id)->delete();
    //     return redirect('/buku')->with('danger','Data berhasil dihapus!');
    // }
}
