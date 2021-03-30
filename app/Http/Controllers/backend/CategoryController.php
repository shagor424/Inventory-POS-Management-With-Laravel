<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\Category;
use App\Model\Unit;
class CategoryController extends Controller
{
    public function getIndex(){
        $categories = Category::all();
        return view('backend.category.view-category',compact('categories'));
    }
    
    public function getData()
    {

        $data =  Category::all();
        return response()->json($data);
    }
    public function postStore(Request $request){
     
        $data = Category::insert([
            'item_name' => $request->item_name,
            
        ]);
 
       return ['success'=>true,'message'=>'Data Added Successfully'];
    }
 
    public function postedit($id){

       $data = Category::find($id);

      return response()->json($data);
    }

    public function postUpdate(Request $request,$id){
      
         $request->validate([
            'item_name' => 'required',
           
        ]);
         $data =  Category::find($id)->update([
            'item_name' => $request->item_name,
        ]);
 
       return ['success'=>true,'message'=>'Data Updated Successfully'];


    }



    public function postdelete($id){
            $item = Category::find($id);
            $item->delete();
          return ['success'=>true,'message'=>'Data Deleted Successfully'];
 
          } 
}
