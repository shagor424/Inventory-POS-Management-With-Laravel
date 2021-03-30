<?php  

namespace App\Http\Controllers\Brand; 

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
class BrandController extends Controller
{

	public function view(){
		$data = BrandName::orderby('id','DESC')->get();
    	return view('backend.brand.view-brand',compact('data'));
    }

    public function add(){
    	return view('backend.brand.add-brand');
    }

    public function store(Request $request){

      $request->validate([
            'brand_name' =>'required|unique:brand_names',
      ]);

    	$brand = new BrandName();
    	$brand->brand_name = $request->brand_name;
    	$brand->brand_slug = $this->slug_generator($request->brand_name);
    	$brand->created_by = Auth::user()->id;
    	$brand->save();

    	Session::flash('success','Brand Name Inserted Successfully!');

    	return back();
    }

  public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }

     public function inactive($id){
            $brand = BrandName::find($id);
            $brand->status = 0;
            $brand->save();

           Session::flash('success','Brand Inactive Successfully!');

    	return back();

        }
public function active($id){
            $brand = BrandName::find($id);
            $brand->status = 1;
            $brand->save();

           Session::flash('success','Brand Active Successfully!');

    	return back();

        }


        

    public function edit($id){
            $editdata = BrandName::find($id);
            return view('backend.brand.edit-brand',compact('editdata'));

        }

        public function update(Request $request,$id){
            $brand = BrandName::find($id);
            $brand->brand_name =$request->brand_name;
    	      $brand->brand_slug =$this->slug_generator($request->brand_name);
            $brand->updated_by = Auth::user()->id;
       //  if ($request->file('image')){
        //  $file = $request->file('image');
        //  @unlink(public_path('upload/logoimage/'.$data->image));
        //  $filename =date('YmdHi').$file->getClientOriginalName();
        //  $file->move(public_path('upload/logoimage'), $filename);
       //   $data['image'] = $filename;
       // }
        $brand->save();

      return redirect()->route('brands.view-brand')->with('success','Brand Updated Successfully');

        }

        

          public function delete($id){
            $brand = BrandName::find($id);

         // if (file_exists('public/upload/logoimage/' . $logo->image) AND !
         //   empty($logo->image)){
          //     unlink('public/upload/logoimage/' . $logo->image);
      // }
            $brand->delete();
           return redirect()->route('brands.view-brand')->with('success','Brand Deleted Successfully');


          }  
public function brandstatus($id, $status){
            $brand = BrandName::find($id);
            $brand->status = $status;
            $brand->save();
      return response()->json(['message' =>'success']);

        }
          
}
