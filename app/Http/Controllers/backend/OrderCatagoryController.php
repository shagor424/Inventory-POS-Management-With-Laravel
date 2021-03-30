<?php

namespace App\Http\Controllers\backend; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderCatagory; 
use Auth;
use App\user;
class OrderCatagoryController extends Controller

    {
    public function getIndex(){
        $items = OrderCatagory::all();
        return view('backend.item.item-view',compact('items'));
    }
    
    public function getData()
    {

        $data =  OrderCatagory::all();
        return response()->json($data);
    }
    public function postStore(Request $request){
        $request->validate([
            'item_name' => 'required|unique:order_catagories,item_name',
            
        ]);
        $data = OrderCatagory::insert([
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,
        ]);
 
       return ['success'=>true,'message'=>'Data Added Successfully'];
    }
 
    public function postedit($id){

       $data = OrderCatagory::find($id);

      return response()->json($data);
    }

    public function postUpdate(Request $request,$id){
      
         $request->validate([
            'item_name' => 'required',
            'item_price' => 'required',
        ]);
         $data =  OrderCatagory::find($id)->update([
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,
        ]);
 
       return ['success'=>true,'message'=>'Data Updated Successfully'];


    }



    public function postdelete($id){
            $item = OrderCatagory::find($id);
            $item->delete();
          return ['success'=>true,'message'=>'Data Deleted Successfully'];
 
          } 
}
