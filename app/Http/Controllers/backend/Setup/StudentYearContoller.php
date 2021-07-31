<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearContoller extends Controller
{
    public function StudentYearView(){
        $data['alldata'] = StudentYear::all();
        return view('backend.setup.student_year.view_year',$data);
    }

    
    public function StudentYearAdd(){
     
        return view('backend.setup.student_year.add_year');
    }
    public function StudentYearStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:student_years',
       ]);

       $data = new StudentYear();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Student Year Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id){
        $editdata = StudentYear::find($id);
        return view('backend.Setup.student_year.edit_year',compact('editdata'));

    }
    public function StudentYearUpdate(Request $request,$id){
        $data = StudentYear::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id){
      $data = StudentYear::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Student Year Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('student.year.view')->with($notification);
    }
}
