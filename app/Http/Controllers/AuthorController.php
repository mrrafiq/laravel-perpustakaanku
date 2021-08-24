<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Author::all();
        return view('author',['title' => 'Pengarang Buku',
        "head" => "Pengarang Buku",
        "message" =>"Berikut merupakan kategori buku dari perpustakaan ini."], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/add-author',['title' => 'Tambah Pengarang']);
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
            'name' => 'required|max:100',
            'born_date' => 'required'
        ]);

        $data = new Author;
        $data->name = $request->input('name');
        $data->born_date = $request->input('born_date');
        $data->save();

        return redirect('/book/author')->with('succes','Pengarang berhasil ditambahkan!');
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
    public function edit(Request $request)
    {
        $data = DB::table('authors')->where('id', $request->id)->first();
        return view('update/edit-author',['data' => $data, "title" => "Edit Pengarang"]);
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
        DB::table('authors')->where('id', $request->id)->update([
            'name' => $request->name,
            'born_date' => $request->born_date
        ]);

        return redirect('book/author')->with('success','Pengarang berhasil diperbarui!');
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
