<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Publisher::all();
        return view('publisher',[
            'title' => 'Penerbit Buku',
            'head' => 'Penerbit Buku',
            'message' => "Berikut merupakan penerbit dari buku perpustakaan!"], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/add-publisher',['title' => 'Tambah Penerbit']);
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
            'name' => 'required|max:100|unique:publishers',
            'address' => 'required|max:100',
            'email' => 'required'
        ]);

        $data = new Publisher;
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->email = $request->input('email');
        $data->save();

        return redirect('/book/publisher')->with('succes','Pengarang berhasil ditambahkan!');
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
        $data = DB::table('publishers')->where('id', $request->id)->first();
        return view('update/edit-publisher',['data' => $data, "title" => "Edit Penerbit"]);
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
        DB::table('publishers')->where('id', $request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email
        ]);

        return redirect('book/publisher')->with('success','Pengarang berhasil diperbarui!');
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
