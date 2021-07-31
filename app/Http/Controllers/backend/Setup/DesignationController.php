<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function DesignationView(){
        $data['alldata'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    
    public function DesignationAdd(){
     
        return view('backend.setup.designation.add_designation');
    }
    public function DesignationStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:designations',
       ]);

       $data = new Designation();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Designation Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('designation.view')->with($notification);
    }

    public function DesignationEdit($id){
        $editdata = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editdata'));

    }
    public function DesignationUpdate(Request $request,$id){
        $data = Designation::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('designation.view')->with($notification);
    }

    public function DesignationDelete($id){
      $data = Designation::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Designation Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('designation.view')->with($notification);
    }
}
