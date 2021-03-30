<?php
 
namespace App\Http\Controllers\SubSubCatagory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BrandName;
use Auth; 
use DB;
use Session;
use App\Model\Catagory;
use App\Model\SubCatagory;
use App\Model\SubSubCatagory;
use App\User;

class SubSubCatagoryController extends Controller
{
    public function view(){
      $aubdata = SubCatagory::get();
      $catdata = Catagory::get();
		$data = SubSubCatagory::orderby('id','DESC')->get();
    	return view('backend.subsubcatagory.view-subsubcatagory',compact('data','subdata','catdata'));
    }

    public function add(){
       $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
        $subcatagories = SubCatagory::where('status',1)->orderby('sub_catagory_name','ASC')->get();
    	return view('backend.subsubcatagory.add-subsubcatagory',compact('catagories','subcatagories'));
    }

    public function store(Request $request){

      $request->validate([
            'sub_sub_catagory_name' =>'required|unique:sub_sub_catagories',
            'catagory_id' =>'required',
            'sub_catagory_id' =>'required',
      ]);

    	$subsubcatagory = new SubSubCatagory();
      $subsubcatagory->sub_sub_catagory_name =$request->sub_sub_catagory_name;
      $subsubcatagory->catagory_id = $request->catagory_id;
    	$subsubcatagory->sub_catagory_id = $request->sub_catagory_id;
    	$subsubcatagory->sub_sub_catagory_slug = $this->slug_generator($request->sub_sub_catagory_name);
    	$subsubcatagory->created_by = Auth::user()->id;
    	$subsubcatagory->save();

    	Session::flash('success','Sub Sub Catagory Name Inserted Successfully!');

    	return back();
    }

  public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }

     public function inactive($id){
            $subsubcatagory = SubSubCatagory::find($id);
            $subsubcatagory->status = 0;
            $subsubcatagory->save();

           Session::flash('success','Sub Sub Catagory Inactive Successfully!');

    	return back();

        }
public function active($id){
            $subsubcatagory = SubSubCatagory::find($id);
            $subsubcatagory->status = 1;
            $subsubcatagory->save();

           Session::flash('success','Sub Sub Catagory Active Successfully!');

    	     return back();

        }


        

    public function edit($id){
            $editdata = SubSubCatagory::find($id);
              $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
        $subcatagories = SubCatagory::where('status',1)->orderby('sub_catagory_name','ASC')->get();
      return view('backend.subsubcatagory.edit-subsubcatagory',compact('editdata','catagories','subcatagories'));

        }

        public function update(Request $request,$id){
            $subsubcatagory = SubSubCatagory::find($id);
            $subsubcatagory->catagory_id = $request->catagory_id;
            $subsubcatagory->sub_catagory_id = $request->sub_catagory_id;
            $subsubcatagory->sub_sub_catagory_name =$request->sub_sub_catagory_name;
    	      $subsubcatagory->sub_sub_catagory_slug =$this->slug_generator($request->sub_sub_catagory_name);
            $subsubcatagory->updated_by = Auth::user()->id;
       //  if ($request->file('image')){
        //  $file = $request->file('image');
        //  @unlink(public_path('upload/logoimage/'.$data->image));
        //  $filename =date('YmdHi').$file->getClientOriginalName();
        //  $file->move(public_path('upload/logoimage'), $filename);
       //   $data['image'] = $filename;
       // }
        $subsubcatagory->save();

          return redirect()->route('subsubcatagories.view-subsubcatagory')->with('success','Sub Sub Catagory Updated Successfully');

        }

        

          public function delete($id){
            $subsubcatagory = SubSubCatagory::find($id);

         // if (file_exists('public/upload/logoimage/' . $logo->image) AND !
         //   empty($logo->image)){
          //     unlink('public/upload/logoimage/' . $logo->image);
      // }
            $subsubcatagory->delete();
            Session::flash('success','Sub Sub Catagory Deleted Successfully!');

      return back();


          }  
public function subsubcatagorystatus($id, $status){
            $subsubcatagory = SubSubCatagory::find($id);
            $subsubcatagory->status = $status;
            $subsubcatagory->save();
      return response()->json(['message' =>'success']);

}
}
