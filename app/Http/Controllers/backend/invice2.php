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
use App\Model\Purchase;
use App\Model\Invoice;
use App\Model\InvoiceDetail; 
use App\Model\Payment;
use App\Model\PaymentDetail;
class InvoiceController extends Controller
{
   public function view(){
	$data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->get();
    return view('backend.invoice.view-invoice',compact('data'));
    }

   
    public function add(){
        $data['products'] = Product::where('status',1)->orderby('product_name','ASC')->get();
    	$data['suppliers'] = Supplier::where('status',1)->orderby('name','ASC')->get();
       $data['units'] = Unit::where('status',1)->orderby('item_name','ASC')->get();
      $data['categories'] = Category::where('status',1)->orderby('item_name','ASC')->get();
       $data['subcategories'] = SubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $data['subsubcategories'] = SubSubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $data['brands'] = Brand::where('status',1)->orderby('item_name','ASC')->get();

        $invoice_data = Invoice::orderby('id','desc')->first();
        if($invoice_data == null){
            $firstReg = '1000';
            $data['invoice_no'] = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderby('id','desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data+1;
        }

    	return view('backend.invoice.add-invoice',$data);
    }

    public function store(Request $request){ 
 
    if($request->category_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');
    }else{
        $count_category = count($request->category_id);
        for ($i=0; $i < $count_category; $i++) { 
     $data = new Invoice();
     $data->product_id = $request->product_id[$i];
     $data->purchase_code = $request->purchase_code[$i];
     $data->product_code = $request->product_code[$i];
     $data->supplier_id = $request->supplier_id[$i];
     $data->unit_id = $request->unit_id[$i];
     $data->brand_id = $request->brand_id[$i];
     $data->category_id = $request->category_id[$i];
     $data->sub_category_id = $request->sub_category_id[$i];
     $data->sub_sub_category_id = $request->sub_sub_category_id[$i];
     $data->buy_quantity = $request->buy_quantity[$i];
     $data->size = $request->size[$i];
     $data->model = $request->model[$i];
     $data->color = $request->color[$i];
     $data->buy_price = $request->buy_price[$i];
     $data->unit_price = $request->unit_price[$i];
     $data->sell_price = $request->sell_price[$i];
     $data->purchase_date = date('d-m-y',strtotime($request->purchase_date[$i]));
     $data->description = $request->description[$i];
     $data->warranty_time = $request->warranty_time[$i];
    
     $data->created_by = Auth::user()->id;
     $data->save();

        }
    }

      return back()->with('success','Invoice Inserted Successfully');
    }

          public function delete($id){
            $purchase = Invoice::find($id);
            $purchase->delete();
            return redirect()->route('purchases.view')->with('success','Purchase Deleted Successfully');

          } 
          
     public function inactive($id){
            $purchase = Invoice::find($id);
            $purchase->status = 0;
            $purchase->save();

           Session::flash('success','Purchase Inactive Successfully!');

    	return back();

        }
public function active($id){
            $purchase = Invoice::find($id);
            $purchase->status = 1;
            $purchase->save();

           Session::flash('success','Purchase Active Successfully!');
    	return back();
        } 


    public function pendinglist(){
    $data = Invoice::orderby('id','DESC')->orderby('purchase_date','DESC')->where('status','0')->latest()->get();
    return view('backend.purchase.pending-list',compact('data'));
    }

    public function approve($id){
        $purchase = Invoice::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buy_quantity))+((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->save()){
            DB::table('purchases')
            ->where('id',$id)
            ->update(['status' => 1]);
        }

         return redirect()->route('purchases.pending-list')->with('success','Purchase Approved Successfully');
    }

}
