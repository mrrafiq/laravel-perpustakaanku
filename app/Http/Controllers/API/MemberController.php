<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function member(Request $request)
    {
        $id = $request->id;
        $unique_num = $request->unique_num;
        $name = $request->name;

        if ($id == null && $unique_num == null && $name == null) {
            $members = Member::all();
        }
        elseif ($id != null) {
            $members = Member::where('id', $id)->get();
        }
        elseif ($unique_num != null) {
            $members = Member::where('unique_num', $unique_num)->get();
        }
        elseif ($name != null) {
            $members = Member::where('name','LIKE', '%'.$name.'%')->get();
        }

        return response()->json($members);
    }
    
    public function createMember(Request $request)
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

        return response()->json([
            'message' => 'Insert Data Success',

        ], 200);
    }

    public function updateMember(Request $request)
    {

        $request->validateWithBag($request,[
            'id' => ['required','exists:members,id'],
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        DB::table('members')->where('unique_num', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return response()->json([
            'message' => 'Update Data Success',

        ], 200);
    }

    public function deleteMember(Request $request)
    {
        $request->validateWithBag($request,[
            'id' => ['required','exists:members,id'],
        ]);
        $member = Member::where('id',$request->id);
        $member->delete();
        return response()->json([
            'message' => 'Delete Data Success',

        ], 200);
    }
}
