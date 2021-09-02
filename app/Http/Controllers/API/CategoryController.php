<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if ($id == null && $name == null) {
            $category = Category::all();
        }
        elseif ($name != null) {
            $category = Category::where('name','LIKE', '%'.$request->name.'%')->get();
        }
        else{
            $category = Category::where('id', $request->id)->get();
        }
        return response()->json($category);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories|max:100'
        ]);

        $data = new Category;
        $data->name = $request->input('name');
        $data->save();

        return response()->json([
            'message' => 'Insert Data Success',
        ]);
    }

    public function update(Request $request)
    {
        $this->validateWithBag($request,[
            'id' => ['required','exists:categories,id'],
        ]);

        DB::table('categories')->where('id', $request->id)->update([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Update Data Success',
        ]);
    }

}
