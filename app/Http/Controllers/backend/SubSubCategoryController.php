<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\SubSubCategory;
use App\Model\Unit;
class SubSubCategoryController extends Controller
{
   public function getIndex(){
        $subsubcategories = SubSubCategory::all();
        return view('backend.subsubcategory.view-subsubcategory',compact('subsubcategories'));
    }
    
    public function getData()
    {

        $data =  SubSubCategory::all();
        return response()->json($data);
    }
    public function postStore(Request $request){
     
        $data = SubSubCategory::insert([
            'item_name' => $request->item_name,
            
        ]);
 
       return ['success'=>true,'message'=>'Data Added Successfully'];
    }
 
    public function postedit($id){

       $data = SubSubCategory::find($id);

      return response()->json($data);
    }

    public function postUpdate(Request $request,$id){
      
         $request->validate([
            'item_name' => 'required',
           
        ]);
         $data =  SubSubCategory::find($id)->update([
            'item_name' => $request->item_name,
        ]);
 
       return ['success'=>true,'message'=>'Data Updated Successfully'];


    }



    public function postdelete($id){
            $item = SubSubCategory::find($id);
            $item->delete();
          return ['success'=>true,'message'=>'Data Deleted Successfully'];
 
          } 
}
