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
use PDF;

class PurchaseController extends Controller
{
    public function view(){
	$data = Purchase::orderby('id','DESC')->latest()->orderby('purchase_date','DESC')->where('status','1')->get();
    return view('backend.purchase.view-purchase',compact('data'));
    }

   
    public function add(){
        $data['products'] = Product::where('status',1)->orderby('product_name','ASC')->get();
    	$data['suppliers'] = Supplier::where('status',1)->orderby('name','ASC')->get();
       $data['units'] = Unit::where('status',1)->orderby('item_name','ASC')->get();
      $data['categories'] = Category::where('status',1)->orderby('item_name','ASC')->get();
       $data['subcategories'] = SubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $data['subsubcategories'] = SubSubCategory::where('status',1)->orderby('item_name','ASC')->get();
        $data['brands'] = Brand::where('status',1)->orderby('item_name','ASC')->get();
        $data['date'] = date('Y-m-d');
    	return view('backend.purchase.add-purchase',$data);
    }

    public function store(Request $request){ 
 
    if($request->category_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');
    }else{
        $count_category = count($request->category_id);
        for ($i=0; $i < $count_category; $i++) { 
     $data = new Purchase();
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
     $data->purchase_date = date('Y-m-d',strtotime($request->purchase_date[$i]));
     $data->description = $request->description[$i];
     $data->warranty_time = $request->warranty_time[$i];
    
     $data->created_by = Auth::user()->id;
     $data->save();

        }
    }

      return back()->with('success','Purchase Inserted Successfully');
    }

          public function delete($id){
            $purchase = Purchase::find($id);
            $purchase->delete();
            return redirect()->route('purchases.view')->with('success','Purchase Deleted Successfully');

          } 
          
     public function inactive($id){
            $purchase = Purchase::find($id);
            $purchase->status = 0;
            $purchase->save();

           Session::flash('success','Purchase Inactive Successfully!');

    	return back();

        }
public function active($id){
            $purchase = purchase::find($id);
            $purchase->status = 1;
            $purchase->save();

           Session::flash('success','Purchase Active Successfully!');
    	return back();
        } 


    public function pendinglist(){
    $data = Purchase::orderby('id','DESC')->orderby('purchase_date','DESC')->where('status','0')->latest()->get();
    return view('backend.purchase.pending-list',compact('data'));
    }

    public function approve($id){
        $purchase = Purchase::find($id);
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

     public function dailyview(){
         return view('backend.purchase.daily-view');
    }

     public function dailyreportpdf(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Purchase::whereBetween('purchase_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('daily-purchase-report.pdf');

     }

} 
