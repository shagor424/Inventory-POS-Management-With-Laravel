<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\SubCategory;
use App\Model\Unit;
class SubCategoryController extends Controller
{
   public function getIndex(){
        $subcategories = SubCategory::all();
        return view('backend.subcategory.view-subcategory',compact('subcategories'));
    }
    
    public function getData()
    {

        $data =  SubCategory::all();
        return response()->json($data);
    }
    public function postStore(Request $request){
     
        $data = SubCategory::insert([
            'item_name' => $request->item_name,
            
        ]);
 
       return ['success'=>true,'message'=>'Data Added Successfully'];
    }
 
    public function postedit($id){

       $data = SubCategory::find($id);

      return response()->json($data);
    }

    public function postUpdate(Request $request,$id){
      
         $request->validate([
            'item_name' => 'required',
           
        ]);
         $data =  SubCategory::find($id)->update([
            'item_name' => $request->item_name,
        ]);
 
       return ['success'=>true,'message'=>'Data Updated Successfully'];


    }



    public function postdelete($id){
            $item = SubCategory::find($id);
            $item->delete();
          return ['success'=>true,'message'=>'Data Deleted Successfully'];
 
          } 
}
