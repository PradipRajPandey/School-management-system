<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function SchoolSubjectView(){
        $data['alldata'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);
    }

    
    public function SchoolSubjectAdd(){
     
        return view('backend.setup.school_subject.add_school_subject');
    }
    public function SchoolSubjectStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:school_subjects',
       ]);

       $data = new SchoolSubject();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Subject Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectEdit($id){
        $editdata = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('editdata'));

    }
    public function SchoolSubjectUpdate(Request $request,$id){
        $data = SchoolSubject::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectDelete($id){
      $data = SchoolSubject::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Subject Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('school.subject.view')->with($notification);
    }
}
