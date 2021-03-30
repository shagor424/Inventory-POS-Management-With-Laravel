<?php 

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 
use DB;
use App\User;
use Session;
use App\Model\Catagory;
use App\Model\Product;
use App\Model\SubCatagory;
use App\Model\SubSubCatagory; 
use App\Model\BrandName;
use Image;
class ProductController extends Controller
{
     public function view(){
    $catagory = Catagory::all();
    $subcatagory = SubCatagory::all();
    $subsubcatagory = SubSubCatagory::all();
    $brand = BrandName::all();
	$data = Product::orderby('id','DESC')->latest()->get();
    return view('backend.product.view-product',compact('data','catagory','subcatagory','subsubcatagory','brand'));
    }

    public function add(){
      $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
       $subcatagories = SubCatagory::where('status',1)->orderby('sub_catagory_name','ASC')->get();
        $subsubcatagories = SubSubCatagory::where('status',1)->orderby('sub_sub_catagory_name','ASC')->get();
        $brands = BrandName::where('status',1)->orderby('brand_name','ASC')->get();
    	return view('backend.product.add-product',compact('catagories','subcatagories','subsubcatagories','brands'));
    }

    public function store(Request $request){ 

          $request->validate([
           'product_name' =>'required|unique:products,product_name',
          
          
      ]);

 
          
          
      

        $thumbails = [];

        if ($request->hasFile('thumbail')){
          $sl = 0;
         foreach($request->file('thumbail') as $thumbail) {
          $fileExa =$thumbail->getClientOriginalExtension();
          $fileNamea= date('YmdHis'.$sl.'.'). $fileExa;
          
          Image::make($thumbail)->resize(50,50)->save(public_path('upload/productthumbail/') . $fileNamea);
          $thumbails[] = $fileNamea;
          $sl++;
          }
       }


         $videos = [];

        if ($request->hasFile('video')){
          $sl = 0;
         foreach($request->file('video') as $video) {
          $fileExb =$video->getClientOriginalExtension();
          $fileNameb= date('YmdHis'.$sl.'.'). $fileExb;
          
          Image::make($video)->resize(700,500)->save(public_path('upload/productvideo/') . $fileNameb);
          $videos[] = $fileNameb;
          $sl++;
          }
       }
        $image = $request->file('image');
          $fileEx = $image->getClientOriginalExtension();
          $fileName= date('YmdHis.'). $fileEx;
          
          Image::make($image)->resize(700,700)->save(public_path('upload/productimage/') . $fileName);
         


     $data = new Product();
     $data->brand_id = $request->brand_id;
     $data->catagory_id = $request->catagory_id;
     $data->sub_catagory_id = $request->sub_catagory_id;
     $data->sub_sub_catagory_id = $request->sub_sub_catagory_id;
     $data->product_name = $request->product_name;
     $data->model = $request->model; 
      $data->size = $request->size;
       $data->color = $request->color;
      $data->quantity = $request->quantity;
      $data->buy_price = $request->buy_price;
      $data->sell_price = $request->sell_price;
      $data->special_price = $request->special_price;
      $data->special_start = $request->special_start;
      $data->special_end = $request->special_end;
      $data->warrenty = $request->warrenty;
      $data->warrenty_time = $request->warrenty_time;
      $data->warrenty_condition = $request->warrenty_condition;
      $data->short_des = $request->short_des;
      $data->long_des = $request->long_des;

      $data->image =$fileName;
      $data->thumbail =json_encode($thumbails);
      $data->video =json_encode($videos);
      $data->product_slug = $this->slug_generator($request->product_name);
      $data->created_by = Auth::user()->id;
     $data->save();

      return back()->with('success','Product Inserted Successfully');
    }


    public function edit($id){
     $editdata = Product::find($id);
       $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
       $subcatagories = SubCatagory::where('status',1)->orderby('sub_catagory_name','ASC')->get();
        $subsubcatagories = SubSubCatagory::where('status',1)->orderby('sub_sub_catagory_name','ASC')->get();
        $brands = BrandName::where('status',1)->orderby('brand_name','ASC')->get();

    	return view('backend.product.edit-product',compact('editdata','catagories','subcatagories','subsubcatagories','brands'));

        }

        public function update(Request $request,$id){
      $product = Product::find($id);
      $product->brand_id = $request->brand_id;
      $product->catagory_id = $request->catagory_id;
    	$product->sub_catagory_id = $request->sub_catagory_id;
    	$product->sub_sub_catagory_id = $request->sub_sub_catagory_id;
    	$product->product_name = $request->product_name;
    	$product->model = $request->model;
    	$product->size = $request->size;
      $product->color = $request->color;
    	$product->quantity = $request->quantity;
    	$product->buy_price = $request->buy_price;
    	$product->sell_price = $request->sell_price;
    	$product->special_price = $request->special_price;
    	$product->special_start = $request->special_start;
    	$product->special_end = $request->special_end;
    	$product->warrenty = $request->warrenty;
    	$product->warrenty_time = $request->warrenty_time;
    	$product->warrenty_condition = $request->warrenty_condition;
    	$product->short_des = $request->short_des;
    	$product->long_des = $request->long_des;
    	$product->brand_id = $request->brand_id;
    	$product->product_slug =$this->slug_generator($request->product_name);
      $product->updated_by = Auth::user()->id;
      
      $product->save();

         

       return redirect()->route('products.view-product')->with('success','Product Inserted Successfully');

        }

        

          public function delete($id){
            $product = product::find($id);
            $images = json_decode($product->image);
            foreach($images as $file) {
               unlink(public_path('upload/productimage/') . $file);
           }
        
      
            $product->delete();
            return redirect()->route('products.view-product')->with('success','Product Deleted Successfully');

          } 
          
public function productstatus($id, $status){
            $product = Product::find($id);
            $product->status = $status;
            $product->save();
      return response()->json(['message' =>'success']);

        }

        public function slug_generator($string){
         	$string = str_replace(' ', '-', $string);
          	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
          	return strtolower(preg_replace('/-+/', '-', $string));
          }

     public function inactive($id){
            $product = Product::find($id);
            $product->status = 0;
            $product->save();

           Session::flash('success','Product Inactive Successfully!');

    	return back();

        }
public function active($id){
            $product = product::find($id);
            $product->status = 1;
            $product->save();

           Session::flash('success','Product Active Successfully!');

    	return back();

        }
}
