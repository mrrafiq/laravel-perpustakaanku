<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::table('members')->orderBy('id')->paginate(10);

        return view('member',
        ["title" => "Keanggotaan", 
        "head" => "Keanggotaan", 
        "message" => "Berikut merupakan daftar anggota PerpustakaanKu."
        ], compact('members'));
    }

    public function find(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);
        $search =  $request->search;
        $member = Member::where('unique_num','LIKE', '%' .$search. '%')
            ->orWhere('name','LIKE', '%' .$search. '%')
            ->orWhere('phone','LIKE', '%' .$search. '%')
            ->orWhere('address','LIKE', '%' .$search. '%')
            ->paginate(20);
    
        return view('member',['member' => $member, "title" => "Pencarian Anggota", "head" => "Daftar Anggota",
        "message" => "Berikut merupakan hasil pencarian dari '$search'."])->with('success', 'Data Anggota ditemukan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create/add-member',["title" => "Tambah Anggota"]);
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
            'unique_num' => 'required|unique:members|max:10',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $member = new Member;
        $member->unique_num = $request->input('unique_num');
        $member->name = $request->input('name');
        $member->phone = $request->input('phone');
        $member->address = $request->input('address');
        $member->save();

        return redirect('/members')->with('success', 'Anggota berhasil ditambahkan!');
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
        $member = DB::table('members')->where('id', $id)->get();
        return view('update/edit-member',['member'=>$member, "title" => "Edit Data Anggota"]);
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
        DB::table('members')->where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/members')->with('success','Data anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $member = Member::find($request->unique_num);
        $member->delete();
        return redirect('/members')->with('danger','Data berhasil dihapus!');
    }
}
