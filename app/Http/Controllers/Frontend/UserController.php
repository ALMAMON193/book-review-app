<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function ProfileUpdate(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            
            // Delete old image if exists
            if (!empty($data->image)) {
                @unlink(public_path('upload/user_images/' . $data->image));
            }
            
            $data->image = $filename;
        }
    
        $data->save();
        
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('user.profile')->with($notification);
    }
    public function ChangePassword($id)
    {
        $user = User::findOrFail($id);
        return view('front-end.profile.change-password', compact('user'));
    }


public function UpdatePassword(Request $request, $id)
{
    $request->validate([
        'password' => 'required|min:8|confirmed',
    ]);

    $user = User::findOrFail($id);
    $user->password = Hash::make($request->password);
    $user->save();

    // Logout the user after password update
    Auth::logout();

    return redirect()->route('login')->with('success', 'Password updated successfully. Please login with your new password.');
}

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}



