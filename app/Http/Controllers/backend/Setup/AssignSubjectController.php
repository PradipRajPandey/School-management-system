<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
            // $data['alldata'] = AssignSubject::all();
            $data['alldata'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
       return view('backend.setup.assign_subject.view_assign_subject',$data);
    }

    public function AssignSubjectAdd(){
       
        $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }

    public function AssignSubjectStore(Request $request){
     
        $subjectcount = count($request->subject_id);
        if($subjectcount  !=NULL){
            for ($i=0; $i <$subjectcount  ; $i++) { 
               $assign_subject = new AssignSubject();
               $assign_subject->class_id = $request->class_id;
               $assign_subject->subject_id = $request->subject_id[$i];
               $assign_subject->full_mark = $request->full_mark[$i];
               $assign_subject->pass_mark = $request->pass_mark[$i];
               $assign_subject->subjective_mark = $request->subjective_mark[$i];
               $assign_subject->save();
            } //end for
 
 
        } //end if 
        
        $notification = array(
         'message' => 'Assign Subject Inserted Successfully',
         'alert-type' => 'success'
          );
         return Redirect()->route('assign.subject.view')->with($notification);
 
    }

    public function AssignSubjectEdit($class_id){
        $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();
    
           $data['editdata'] = AssignSubject::where('class_id',$class_id)
           ->orderBy('subject_id','asc')->get();
            // dd($data['editdata']->toarray());
        return view('backend.setup.assign_subject.edit_assign_subject',$data);
    
       }


       public function AssignSubjectUpdate(Request $request,$class_id){
        if ($request->subject_id == Null) {
         //    dd('error');
         $notification = array(
             'message' => ' You donot select any subject',
             'alert-type' => 'error'
              );
 
              return Redirect()->route('assign.subject.edit',$class_id)->with($notification);
            
        }else {
         //    dd('perfect');
         $subjectcount = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();
            for ($i=0; $i <$subjectcount ; $i++) { 
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            } //end for
   
        } //end else
        $notification = array(
         'message' => 'Data Updated Successfully',
         'alert-type' => 'success'
          );
         return Redirect()->route('assign.subject.view')->with($notification);
 
    }

    public function AssignSubjectDetails($class_id){
        $data['detailsdata'] = AssignSubject::where('class_id',$class_id)
        ->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',$data);
        
       }
}
