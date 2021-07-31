<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShfit;
use Illuminate\Http\Request;

class StudentShfitController extends Controller
{
    public function StudentShfitView(){
        $data['alldata'] = StudentShfit::all();
        return view('backend.setup.student_shfit.view_shfit',$data);
    }

    
    public function StudentShfitAdd(){
     
        return view('backend.setup.student_shfit.add_shfit');
    }
    public function StudentShfitStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:student_shfits',
       ]);

       $data = new StudentShfit();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Student Shfit Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('student.shfit.view')->with($notification);
    }

    public function StudentShfitEdit($id){
        $editdata = StudentShfit::find($id);
        return view('backend.setup.student_shfit.edit_shfit',compact('editdata'));

    }
    public function StudentShfitUpdate(Request $request,$id){
        $data = StudentShfit::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_shfits,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shfit Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('student.shfit.view')->with($notification);
    }

    public function StudentShfitDelete($id){
      $data = StudentShfit::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Student Shfit Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('student.shfit.view')->with($notification);
    }
}
