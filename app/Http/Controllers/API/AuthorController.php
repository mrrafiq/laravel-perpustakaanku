<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function author(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if ($id == null && $name == null) {
            $category = Author::all();
        }
        elseif ($name != null) {
            $category = Author::where('name','LIKE', '%'.$name.'%')->get();
        }
        else{
            $category = Author::where('id', $request->id)->get();
        }
        return response()->json($category);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:authors|max:100'
        ]);

        $data = new Author;
        $data->name = $request->input('name');
        $data->save();

        return response()->json([
            'message' => 'Insert Data Success',
        ]);
    }

    public function update(Request $request)
    {
        DB::table('authors')->where('name', $request->name)->update([
            'name' => $request->name_new
        ]);

        return response()->json([
            'message' => 'Update Data Success',
        ]);
    }
}
