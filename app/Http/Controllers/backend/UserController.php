<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
   public function UserView(){
      //  $data['allData'] = User::all();
       $data['allData'] = User::where('usertype','Admin')->get();
       return view('backend.user.view_user',$data);
   }
   public function UserAdd(){
      return view('backend.user.add_user');
   }

   public function UserStore(Request $request){
      $validatedData = $request->validate([
       'email' => 'required|unique:users',
       'name' => 'required'
      ]);

      $data = new User();
      $code = rand(0000,9999);
      $data->usertype = 'Admin';
      $data->role = $request->role;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->password = bcrypt($code);
      $data->code = $code;
      $data->save();
        
      $notification = array(
      'message' => 'User  Add successfully',
      'alert-type' => 'success'
       );
      return Redirect()->route('user.view')->with($notification);
   }

   public function UserEdit($id){
    $usereditdata = User::find($id);
    return  view('backend.user.edit_user',compact('usereditdata'));
   }
   public function UserUpdate(Request $request, $id){
      $data = User::find($id);
      $data->name = $request->name;
      $data->email = $request->email;
      $data->role = $request->role;
      $data->save();
        
      $notification = array(
      'message' => 'User  Updated successfully',
      'alert-type' => 'info'
       );
      return Redirect()->route('user.view')->with($notification);
   }

   public function UserDelete($id){
      $user =User::find($id);
      $user->delete();

      $notification = array(
         'message' => 'User  deleted successfully',
         'alert-type' => 'warning'
          );
         return Redirect()->route('user.view')->with($notification);
    
   }

   
}
