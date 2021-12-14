<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->get();
        return view('backend.user.index', compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        echo "success";

        $notification = array(
            'message' => 'User Deleted successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')
                    ->with($notification);
    }
}
