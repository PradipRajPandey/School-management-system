<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.profile.view_profile',compact('user'));
    }

    public function ProfileEdit(){
        $id = Auth::user()->id;
        $editdata = User::find($id);
        return view('backend.user.profile.edit_profile',compact('editdata'));
    }

    public function ProfileStore(Request $request){
        $data = User::find( Auth::user()->id);
     
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;


        if($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/user_image/'.$data->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/user_image'),$filename);
          $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User profile  Updated successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('profile.view')->with($notification);
    }



    public function PasswordView(){
        $id = Auth::user()->id;
        $userpassword = User::find($id);
        return view('backend.user.password.edit_password',compact('userpassword'));
    }

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);


        $hashedpassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedpassword )){
           $user = User::find(Auth::id());
           $user->password = Hash::make($request->password);
           $user->save();
           Auth::logout();
           return redirect()->route('login');
        }else{
            return redirect()->back();
        }
        
    }

}
