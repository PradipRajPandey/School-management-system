<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function FeeCategoryView(){
        $data['alldata'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat',$data);
    }

    
    public function FeeCategoryAdd(){
     
        return view('backend.setup.fee_category.add_fee_cat');
    }
    public function FeeCategoryStore(Request $request){
       $validateData = $request->validate([
        'name' => 'required|unique:fee_categories',
       ]);

       $data = new FeeCategory();
       $data->name = $request->name;
       $data->save();

       
       $notification = array(
        'message' => 'Fee Category Inserted Successfully',
        'alert-type' => 'success'
         );
        return Redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCategoryEdit($id){
        $editdata = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat',compact('editdata'));

    }
    public function FeeCategoryUpdate(Request $request,$id){
        $data = FeeCategory::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id
        ]);  

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'success'
             );
            return Redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCategoryDelete($id){
      $data = FeeCategory::find($id);
      $data->delete();

      
      $notification = array(
        'message' => 'Fee Category Deleted Successfully',
        'alert-type' => 'error'
         );
        return Redirect()->route('fee.category.view')->with($notification);
    }
}
