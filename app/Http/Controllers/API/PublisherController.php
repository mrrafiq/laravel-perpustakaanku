<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function publisher(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if ($id == null && $name == null) {
            $publisher = Publisher::all();
        }
        elseif ($name != null) {
            $publisher = Publisher::where('name','LIKE', '%'.$name.'%')->get();
        }
        else{
            $publisher = Publisher::where('id', $request->id)->get();
        }
        return response()->json($publisher);
    }

    public function create(Request $request)
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

        return response()->json([
            'message' => 'Insert Data Success',
        ]);
    }

    public function update(Request $request)
    {
        $request->validateWithBag($request,[
            'id' => ['required','exists:publishers,id'],
        ]);

        DB::table('publishers')->where('id', $request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'Update Data Success',
        ]);
    }
}
