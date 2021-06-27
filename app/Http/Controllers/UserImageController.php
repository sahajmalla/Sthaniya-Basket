<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserImageController extends Controller
{
    public function userImageUploadPost(Request $request)
    {
        $request->validate([
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->user_image->extension();  
     
        $request->user_image->move(public_path('images/users'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        $user= User::find(auth()->user()->id);
        $user->user_image =$imageName;
        $user->save();

        return back()->with('success','Success.'); 
    }
}
