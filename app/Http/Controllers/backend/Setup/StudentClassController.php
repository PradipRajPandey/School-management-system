<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentView(){
        $data['alldata'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }

    public function StudentClassAdd(){
     
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
           
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('student.class.view')->with($notification);
         
       
       
    }

    public function StudentClassEdit($id){
        $editdata = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editdata'));
    }

    public function StudentClassUpdate(Request $request,$id){
        $data = StudentClass::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
           
        ]);

       
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('student.class.view')->with($notification);
         
       
       
    }

    public function StudentClassDelete($id){
         $user = StudentClass::find($id);
         $user->delete();

         $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'error'
             );
            return Redirect()->route('student.class.view')->with($notification);
    }
}