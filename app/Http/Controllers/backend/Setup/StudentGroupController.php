<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function StudentGroupView(){
        $data['alldata'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group',$data);
    }

    
    public function StudentGroupAdd(){
     
        return view('backend.setup.student_group.add_group');
    }
    public function StudentGroupStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:student_groups',
       ]);

       $data = new StudentGroup();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Student Group Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id){
        $editdata = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group',compact('editdata'));

    }
    public function StudentGroupUpdate(Request $request,$id){
        $data = StudentGroup::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id){
      $data = StudentGroup::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Student Group Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('student.group.view')->with($notification);
    }
}
