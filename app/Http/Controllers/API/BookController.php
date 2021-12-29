<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function book(Request $request)
    {
        $id = $request->id;
        $category = $request->category_id;
        $author = $request->author_id;
        $publisher = $request->publisher_id;
        $title = $request->title;

        if ($id == null && $category == null && $title == null && $author == null && $author == null && $publisher == null) {
            $books = Book::all();
        } elseif ($id != null) {
            $books = Book::where('id', $id)->get();
        } elseif ($category != null) {
            $books = Book::where('category_id', $category)->get();
        } elseif ($author != null) {
            $books = Book::where('author_id', 'LIKE', '%' . $author . '%')->get();
        } elseif ($publisher != null) {
            $books = Book::where('publisher_id', 'LIKE', '%' . $publisher . '%')->get();
        } elseif ($title != null) {
            $books = Book::where('title', 'LIKE', '%' . $title . '%')->get();
        } elseif ($author != null && $publisher != null) {
            $borrow = Borrow::where('author', $id)->orWhere('publisher', $book_id)->get();
        }

        return response()->json($books);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:books|max:100',
            'category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'year' => 'required',
            'stock' => 'required'
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->category_id = $request->input('category_id');
        $book->author_id = $request->input('author_id');
        $book->publisher_id = $request->input('publisher_id');
        $book->year = $request->input('year');
        $book->stock = $request->input('stock');

        $book->save();

        return response()->json([
            'message' => 'Insert Data Success!'
        ], 200);
    }

    public function update(Request $request)
    {
        $request->validateWithBag($request, [
            'id' => ['required', 'exists:books,id'],
            'title' => ['required', 'max:100'],
            'category_id' => ['required'],
            'author_id' => ['required'],
            'publisher_id' => ['required'],
            'year' => ['required'],
            'stock' => ['required'],
        ]);

        DB::table('books')->where('id', $request->id)->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'year' => $request->year,
            'stock' => $request->stock
        ]);

        return response()->json([
            'message' => 'Update Data Success!'
        ], 200);
    }

    public function delete(Request $request)
    {
        $book = Book::where('id', $request->id)->first();
        $book->delete();
        return response()->json([
            'message' => 'Delete Data Success',

        ], 200);
    }
}
