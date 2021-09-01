<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function member(Member $member)
    {
        $members = Member::all();
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
        DB::table('members')->where('unique_num', $request->unique_num)->update([
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
        $member = Member::where('unique_num',$request->unique_num);
        $member->delete();
        return response()->json([
            'message' => 'Delete Data Success',

        ], 200);
    }
}
