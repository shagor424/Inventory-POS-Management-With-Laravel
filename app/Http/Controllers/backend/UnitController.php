<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\Supplier;
use App\Model\Unit;
class UnitController extends Controller
{
  public function getIndex(){
        $units = Unit::all();
        return view('backend.unit.view-unit',compact('units'));
    }
    
    public function getData()
    {

        $data =  Unit::all();
        return response()->json($data);
    }
    public function postStore(Request $request){
     
        $data = Unit::insert([
            'item_name' => $request->item_name,
            
        ]);
 
       return ['success'=>true,'message'=>'Data Added Successfully'];
    }
 
    public function postedit($id){

       $data = Unit::find($id);

      return response()->json($data);
    }

    public function postUpdate(Request $request,$id){
      
         $request->validate([
            'item_name' => 'required',
           
        ]);
         $data =  Unit::find($id)->update([
            'item_name' => $request->item_name,
        ]);
 
       return ['success'=>true,'message'=>'Data Updated Successfully'];


    }



    public function postdelete($id){
            $item = Unit::find($id);
            $item->delete();
          return ['success'=>true,'message'=>'Data Deleted Successfully'];
 
          } 
}
