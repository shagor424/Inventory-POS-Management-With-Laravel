<?php
 
namespace App\Http\Controllers\SubCatagory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BrandName;
use Auth; 
use DB;
use User;
use Session;
use App\Model\Catagory;
use App\Model\SubCatagory;
use App\Model\SubSubCatagory;

class SubCatagoryController extends Controller
{
    public function view(){
    $catagory = Catagory::all();
    
		$data = SubCatagory::orderby('id','DESC')->get();
    	return view('backend.subcatagory.view-subcatagory',compact('data','catagory'));
    }

    public function add(){
      $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
    	return view('backend.subcatagory.add-subcatagory',compact('catagories'));
    }

    public function store(Request $request){

      $request->validate([
            'sub_catagory_name' =>'required|unique:sub_catagories',
            'catagory_id' =>'required',
      ]);

    	$subcatagory = new SubCatagory();
      $subcatagory->catagory_id = $request->catagory_id;
    	$subcatagory->sub_catagory_name = $request->sub_catagory_name;
    	$subcatagory->sub_catagory_slug = $this->slug_generator($request->sub_catagory_name);
    	$subcatagory->created_by = Auth::user()->id;
    	$subcatagory->save();

    	Session::flash('success','Sub Catagory Name Inserted Successfully!');

    	return back();
    }

  public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }

     public function inactive($id){
            $subcatagory = SubCatagory::find($id);
            $subcatagory->status = 0;
            $subcatagory->save();

           Session::flash('success','Sub Catagory Inactive Successfully!');

    	return back();

        }
public function active($id){
            $subcatagory = SubCatagory::find($id);
            $subcatagory->status = 1;
            $subcatagory->save();

           Session::flash('success','Sub Catagory Active Successfully!');

    	return back();

        }


        

    public function edit($id){
            $editdata = SubCatagory::find($id);
             $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
            return view('backend.subcatagory.edit-subcatagory',compact('editdata','catagories'));

        }

        public function update(Request $request,$id){
            $subcatagory = SubCatagory::find($id);
            $subcatagory->catagory_id = $request->catagory_id;
            $subcatagory->sub_catagory_name =$request->sub_catagory_name;
    	      $subcatagory->sub_catagory_slug =$this->slug_generator($request->sub_catagory_name);
            $subcatagory->updated_by = Auth::user()->id;
       //  if ($request->file('image')){
        //  $file = $request->file('image');
        //  @unlink(public_path('upload/logoimage/'.$data->image));
        //  $filename =date('YmdHi').$file->getClientOriginalName();
        //  $file->move(public_path('upload/logoimage'), $filename);
       //   $data['image'] = $filename;
       // }
        $subcatagory->save();

          Session::flash('success','Sub Catagory Updated Successfully!');

       return redirect()->route('subcatagories.view-subcatagory')->with('success','Sub Catagory Inserted Successfully');

        }

        

          public function delete($id){
            $subcatagory = SubCatagory::find($id);

         // if (file_exists('public/upload/logoimage/' . $logo->image) AND !
         //   empty($logo->image)){
          //     unlink('public/upload/logoimage/' . $logo->image);
      // }
            $subcatagory->delete();
            Session::flash('success','Sub Catagory Deleted Successfully!');

      return back();


          }  
public function subcatagorystatus($id, $status){
            $subcatagory = SubCatagory::find($id);
            $subcatagory->status = $status;
            $subcatagory->save();
      return response()->json(['message' =>'success']);

        }
}
