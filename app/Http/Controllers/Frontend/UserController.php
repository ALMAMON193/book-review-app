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
}



