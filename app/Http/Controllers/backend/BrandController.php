<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash; 
use App\Model\Supplier;
use App\Model\Brand;
class BrandController extends Controller
{
   public function getIndex(){
        $brands = Brand::all();
        return view('backend.brand.view-brand',compact('brands'));
    }
    
    public function getData()
    {

        $data =  Brand::all();
        return response()->json($data);
    }
    public function postStore(Request $request){
     
        $data = Brand::insert([
            'item_name' => $request->item_name,
            
        ]);
 
       return ['success'=>true,'message'=>'Data Added Successfully'];
    }
 
    public function postedit($id){

       $data = Brand::find($id);

      return response()->json($data);
    }

    public function postUpdate(Request $request,$id){
      
         $request->validate([
            'item_name' => 'required',
           
        ]);
         $data =  Brand::find($id)->update([
            'item_name' => $request->item_name,
        ]);
 
       return ['success'=>true,'message'=>'Data Updated Successfully'];


    }



    public function postdelete($id){
            $item = Brand::find($id);
            $item->delete();
          return ['success'=>true,'message'=>'Data Deleted Successfully'];
 
          } 
}
