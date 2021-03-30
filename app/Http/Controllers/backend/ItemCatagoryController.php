<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderCatagory; 
use Auth;
use App\user;
class ItemCatagoryController extends Controller
{
   public function getIndex()
    {
        return view('backend.item.item-index');
    }
    public function getData()
    {
        return OrderCatagory::all();
    }
    public function postStore(Request $r)
    {
       OrderCatagory::create($r->all());
        return ['success'=>true,'message'=>'Inserted Successfully'];
    }
    public function postUpdate(Request $r)
    {
        if($r->has('id')){
            OrderCatagory::find($r->input('id'))->update($r->all());
            return ['success'=>true,'message'=>'Updated Successfully'];
        }
    }
    public function postDelete(Request $r)
    {
        if($r->has('id')){
           OrderCatagory::find($r->input('id'))->delete();
            return ['success'=>true,'message'=>'Deleted Successfully'];
        }
    }

    public function modalview()
    {
        $alldata = OrderCatagory::all();
        return view('backend.item.item-index',compact('alldata'));
    }
}
