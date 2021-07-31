<?php

namespace App\Http\Controllers\backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShfit;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentRegContoller extends Controller
{
    public function StudentRegView(){
        $data['alldata'] = AssignStudent::all();
         return view('backend.student.student_reg.view_student_reg',$data);
    }

    public function StudentRegAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shfits'] = StudentShfit::all();
        return view('backend.student.student_reg.add_student_reg',$data);
    }

    public function StudentRegStore(Request $request){
        DB::transaction(function() use($request){
            $checkyear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype','student')->orderBy('id','desc')->first();

            if ($student == null) {
                $firstreg = 0;
                $studentId = $firstreg+1;
                if ($studentId < 10 ) {
                    $id_no = '000'.$studentId;
                   
                }elseif ($studentId < 100 ) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000 ) {
                    $id_no = '0'.$studentId;
                }
               
            }else {
                $student = User::where('usertype','student')->orderBy('id','desc')->first()->id;
                $studentId = $student+1;
                if ($studentId < 10 ) {
                    $id_no = '000'.$studentId;
                   
                }elseif ($studentId < 100 ) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000 ) {
                    $id_no = '0'.$studentId;
                }

            } //end else

             //  data insert in users table
            $final_id_no = $checkyear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));


            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_image'),$filename);
                $user['image'] = $filename;
              }
              $user->save();


              //  data insert in assign_students table

              $assign_student = new AssignStudent();
              $assign_student->student_id = $user->id;
              $assign_student->year_id = $request->year_id;
              $assign_student->class_id = $request->class_id;
              $assign_student->group_id = $request->group_id;
              $assign_student->shfit_id = $request->shfit_id;
              $assign_student->save();


              //  data insert in discount_students table

              $discount_student = new DiscountStudent();
              $discount_student->assign_student_id = $assign_student->id;
              $discount_student->fee_category_id = '1';
              $discount_student->discount = $request->discount;
              $discount_student->save();



        });

        $notification = array(
            'message' => 'Student Registration  Inserted successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('student.registration.view')->with($notification);

    } //end method
}
