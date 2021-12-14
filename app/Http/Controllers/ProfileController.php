<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::where('id',Auth::user()->id)
                       ->orderBy('id','DESC')
                       ->get();
        return view('frontend.profile.index',compact('data'));
    }
}
