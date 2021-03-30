<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\Supplier;
class SupplierController extends Controller
{
    public function view(){
     $suppliers = Supplier::get();
    	return view('backend.supplier.view-supplier',compact('suppliers'));
    }

    public function add(){
    	return view('backend.supplier.add-supplier');
    }

    
     public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:suppliers,email',
            'mobile'=>'required',
            'address'=>'required',
       
        ]);

    	$data = new Supplier();
        $data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;
    	$data->save();

    	return redirect()->route('suppliers.view')->with('success','Data Inserted Successfully');
    }


     public function edit($id){
     $editdata = Supplier::find($id);
    	return view('backend.supplier.edit-supplier',compact('editdata'));
    }

      public function update(Request $request , $id){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'address'=>'required',
       
        ]);

      	$data = Supplier::find($id);
        $data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->updated_by = Auth::user()->id;
    	$data->save();

    	return redirect()->route('suppliers.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
            $supplier = Supplier::find($id);
            $supplier->delete();
           return redirect()->route('suppliers.view')->with('success','Supplier Deleted Successfully');

          }  
}
