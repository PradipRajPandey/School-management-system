<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ExamTypeView(){
        $data['alldata'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }

    
    public function ExamTypeAdd(){
     
        return view('backend.setup.exam_type.add_exam_type');
    }
    public function ExamTypeStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:exam_types',
       ]);

       $data = new ExamType();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Exam Type Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeEdit($id){
        $editdata = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('editdata'));

    }
    public function ExamTypeUpdate(Request $request,$id){
        $data = ExamType::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeDelete($id){
      $data = ExamType::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Exam type Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('exam.type.view')->with($notification);
    }
}
