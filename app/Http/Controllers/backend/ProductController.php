<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 
use DB;
use App\User;
use Session;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\SubSubCategory; 
use App\Model\Brand;
use App\Model\Unit;
class ProductController extends Controller
{
    public function view(){
    $unit = Unit::all();
    $supplier = Supplier::all();
    $category = Category::all();
    $subcategory = SubCategory::all();
    $subsubcategory = SubSubCategory::all();
    $brand = Brand::all();
	$data = Product::orderby('id','DESC')->latest()->get();
    return view('backend.product.view-product',compact('data','category','subcategory','subsubcategory','brand','supplier','unit'));
    }

   

   


    public function add(){
    	$suppliers = Supplier::where('status',1)->orderby('name','ASC')->get();
       $units = Unit::where('status',1)->orderby('item_name','ASC')->get();
      $categories = Category::where('status',1)->orderby('item_name','ASC')->get();
       $subcategories = SubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $subsubcategories = SubSubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $brands = Brand::where('status',1)->orderby('item_name','ASC')->get();
    	return view('backend.product.add-product',compact('categories','subcategories','subsubcategories','brands','units','suppliers'));
    }

    public function store(Request $request){ 

          $request->validate([
           'product_name' =>'required|unique:products,product_name',
         
      ]);

 
     $data = new Product();
     $data->product_name = $request->product_name;
     $data->product_code = $request->product_code;
     $data->supplier_id = $request->supplier_id;
     $data->unit_id = $request->unit_id;
     $data->brand_id = $request->brand_id;
     $data->category_id = $request->category_id;
     $data->sub_category_id = $request->sub_category_id;
     $data->sub_sub_category_id = $request->sub_sub_category_id;
     $data->model = $request->model;
     $data->color = $request->color;
     $data->size = $request->size;
     $data->created_by = Auth::user()->id;
     
     $data->save();

      return back()->with('success','Product Inserted Successfully');
    }


    public function edit($id){
     $editdata = Product::find($id);
     $suppliers = Supplier::where('status',1)->orderby('name','ASC')->get();
    $units = Unit::where('status',1)->orderby('item_name','ASC')->get();
       $categories = Category::where('status',1)->orderby('item_name','ASC')->get();
       $subcategories = SubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $subsubcategories = SubSubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $brands = Brand::where('status',1)->orderby('item_name','ASC')->get();

    	return view('backend.product.edit-product',compact('editdata','categories','subcategories','subsubcategories','brands','units','suppliers'));

        }

        public function update(Request $request,$id){
     $product = Product::find($id);
     $product->product_name = $request->product_name;
     $product->product_code = $request->product_code;
     $product->supplier_id = $request->supplier_id;
     $product->unit_id = $request->unit_id;
     $product->brand_id = $request->brand_id;
     $product->category_id = $request->category_id;
     $product->sub_category_id = $request->sub_category_id;
     $product->sub_sub_category_id = $request->sub_sub_category_id;
     $product->model = $request->model; 
     $product->color = $request->color;
     $product->size = $request->size;
     $product->updated_by = Auth::user()->id;
      
      $product->save();
       return redirect()->route('products.view-product')->with('success','Product Inserted Successfully');

        }

        

          public function delete($id){
            $product = product::find($id);
            $product->delete();
            return redirect()->route('products.view-product')->with('success','Product Deleted Successfully');

          } 
          
public function productstatus($id, $status){
            $product = Product::find($id);
            $product->status = $status;
            $product->save();
      return response()->json(['message' =>'success']);

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
