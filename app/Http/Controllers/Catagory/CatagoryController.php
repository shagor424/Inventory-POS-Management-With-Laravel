<?php

namespace App\Http\Controllers\Catagory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BrandName;
use Auth;
use DB;
use App\User;
use Session;
use App\Model\Catagory;

class CatagoryController extends Controller
{
    public function view(){
		$data = Catagory::orderby('id','DESC')->get();
    	return view('backend.catagory.view-catagory',compact('data'));
    }

    public function add(){
    	return view('backend.catagory.add-catagory');
    }

    public function store(Request $request){

      $request->validate([
            'catagory_name' =>'required|unique:catagories,catagory_name',
      ]);

    	$catagory = new Catagory();
    	$catagory->catagory_name = $request->catagory_name;
    	$catagory->catagory_slug = $this->slug_generator($request->catagory_name);
    	$catagory->created_by = Auth::user()->id;
    	$catagory->save();

    	Session::flash('success','Catagory Name Inserted Successfully!');

    	return back();
    }

  public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }

     public function inactive($id){
            $catagory = Catagory::find($id);
            $catagory->status = 0;
            $catagory->save();

           Session::flash('success','Catagory Inactive Successfully!');

    	return back();

        }
public function active($id){
            $catagory = Catagory::find($id);
            $catagory->status = 1;
            $catagory->save();

           Session::flash('success','Catagory Active Successfully!');

    	return back();

        }


        

    public function edit($id){
            $editdata = Catagory::find($id);
            return view('backend.catagory.edit-catagory',compact('editdata'));

        }

        public function update(Request $request,$id){
            $catagory = Catagory::find($id);
            $catagory->catagory_name =$request->catagory_name;
    	     $catagory->catagory_slug =$this->slug_generator($request->catagory_name);
            $catagory->updated_by = Auth::user()->id;
       //  if ($request->file('image')){
        //  $file = $request->file('image');
        //  @unlink(public_path('upload/logoimage/'.$data->image));
        //  $filename =date('YmdHi').$file->getClientOriginalName();
        //  $file->move(public_path('upload/logoimage'), $filename);
       //   $data['image'] = $filename;
       // }
        $catagory->save();

          return redirect()->route('catagories.view-catagory')->with('success','Category Updated Successfully');
        }

        

          public function delete($id){
            $brand = Catagory::find($id);

         // if (file_exists('public/upload/logoimage/' . $logo->image) AND !
         //   empty($logo->image)){
          //     unlink('public/upload/logoimage/' . $logo->image);
      // }
            $brand->delete();
           return redirect()->route('catagories.view-catagory')->with('success','Brand Deleted Successfully');

          }  
public function catagorystatus($id, $status){
            $brand = Catagory::find($id);
            $brand->status = $status;
            $brand->save();
      return response()->json(['message' =>'success']);

        }
}
