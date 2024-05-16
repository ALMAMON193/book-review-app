<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function Dashboard()
    {
        $id = Auth()->user()->id;
        $user = User::find($id);
        return view('front-end.index', compact('user'));
    }

    public function index()
    {
        $id = Auth()->user()->id;
        $user = User::find($id);
        return view('front-end.profile.profile', compact('user'));
    }
}
