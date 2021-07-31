<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FeeAmountController extends Controller
{
   public function FeeAmountView(){
    //    $data['alldata'] = FeeCategoryAmount::all();
       $data['alldata'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
       return view('backend.setup.fee_amount.view_fee_amount',$data);
   }

   public function FeeAmountAdd(){
       $data['fee_categories'] = FeeCategory::all();
       $data['classes'] = StudentClass::all();
       return view('backend.setup.fee_amount.add_fee_amount',$data);
   }

   public function FeeAmountStore(Request $request){
     
       $countclass = count($request->class_id);
       if($countclass !=NULL){
           for ($i=0; $i <$countclass ; $i++) { 
              $fee_amount = new FeeCategoryAmount();
              $fee_amount->fee_category_id = $request->fee_category_id;
              $fee_amount->class_id = $request->class_id[$i];
              $fee_amount->amount = $request->amount[$i];
              $fee_amount->save();
           } //end for


       } //end if 
       
       $notification = array(
        'message' => 'Fee  Amount Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('fee.amount.view')->with($notification);

   }

   public function FeeAmountEdit($fee_category_id){
    $data['fee_categories'] = FeeCategory::all();
    $data['classes'] = StudentClass::all();

       $data['editdata'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)
       ->orderBy('class_id','asc')->get();
        // dd($data['editdata']->toarray());
    return view('backend.setup.fee_amount.edit_fee_amount',$data);

   }

   public function FeeAmountUpdate(Request $request,$fee_category_id){
       if ($request->class_id == Null) {
        //    dd('error');
        $notification = array(
            'message' => ' You donot select any class amount',
            'alert-type' => 'error'
             );

             return Redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
           
       }else {
        //    dd('perfect');
        $countclass = count($request->class_id);
           FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
           for ($i=0; $i <$countclass ; $i++) { 
              $fee_amount = new FeeCategoryAmount();
              $fee_amount->fee_category_id = $request->fee_category_id;
              $fee_amount->class_id = $request->class_id[$i];
              $fee_amount->amount = $request->amount[$i];
              $fee_amount->save();
           } //end for
  
       } //end else
       $notification = array(
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('fee.amount.view')->with($notification);

   }

   public function FeeAmountDetails($fee_category_id){
    $data['detailsdata'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)
    ->orderBy('class_id','asc')->get();
    return view('backend.setup.fee_amount.details_fee_amount',$data);

   }
}
