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
use App\Model\Customer;
use PDF;
class InvoiceController extends Controller
{
   public function view(){
	$data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','1')->get();
    
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
        $data['customers'] = Customer::orderby('name','ASC')->get();
         $data['date'] = date('Y-m-d');
    	return view('backend.invoice.add-invoice',$data);
    }

    public function store(Request $request){ 
 
    if($request->category_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');

    }else{
        if($request->paid_amount>$request->estimated_amount){

    }else
        {

     $invoice = new Invoice();
     $invoice->invoice_no = $request->invoice_no;
     $invoice->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice->description = $request->description;
     $invoice->status = '0';
     $invoice->created_by = Auth::user()->id;
     
     DB::transaction(function() use($request,$invoice){
        if($invoice->save()){
            $count_category = count($request->category_id);
        for ($i=0; $i < $count_category; $i++){

            if($request->customer_id == '0'){
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->mobile = $request->mobile;
                $customer->shop_name = $request->shop_name;
                $customer->address = $request->address;
                $customer->save();
                $customer_id = $customer->id;
            }else{
                 $customer_id = $request->customer_id;
            }


     $invoice_details = new InvoiceDetail();
     $invoice_details->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice_details->invoice_id = $invoice->id;
     $invoice_details->product_code = $request->product_code[$i];
     $invoice_details->unit_id = $request->unit_id[$i];
     $invoice_details->product_id = $request->product_id[$i];
     $invoice_details->brand_id = $request->brand_id[$i];
     $invoice_details->category_id = $request->category_id[$i];
     $invoice_details->sub_category_id = $request->sub_category_id[$i];
     $invoice_details->sub_sub_category_id = $request->sub_sub_category_id[$i];
     $invoice_details->selling_quantity = $request->selling_quantity[$i];
     $invoice_details->size = $request->size[$i];
     $invoice_details->model = $request->model[$i];
     $invoice_details->color = $request->color[$i];
     $invoice_details->unit_price = $request->unit_price[$i];
     $invoice_details->selling_price = $request->selling_price[$i];
     $invoice_details->warranty_time = $request->warranty_time[$i];
     $invoice_details->status= '0';
     $invoice_details->customer_id = $customer_id;
     $invoice_details->save();

        }
            

            $payment = new Payment();
            $payment_details = new PaymentDetail();
            $payment->invoice_id = $invoice->id;
            $payment->customer_id = $customer_id;
            $payment->paid_status =$request->paid_status; 
            $payment->discount_amount =$request->discount_amount;
            $payment->total_amount =$request->estimated_amount;

            if($request->paid_status == 'full_paid'){
                $payment->paid_amount = $request->estimated_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->estimated_amount;
            }elseif($request->paid_status == 'full_due') {
                $payment->paid_amount = '0';
                $payment->due_amount = $request->estimated_amount;
                $payment_details->current_paid_amount = '0';

            } elseif ($request->paid_status == 'some_paid') {
                $payment->paid_amount = $request->paid_amount;
                $payment->due_amount = $request->estimated_amount-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
                }   

                $payment->save();
                $payment_details->invoice_id =  $invoice->id;
                $payment_details->payment_date = date('Y-m-d',strtotime($request->invoice_date));
                $payment_details->customer_id = $customer_id;
                $payment_details->save();

        }
        
     });


        }
    }

      return redirect()->route('invoices.pending-list')->with('success','Invoice Created Successfully');

    }

          public function delete($id){
            $invoice = Invoice::find($id);
            $invoice->delete();
            InvoiceDetail::where('invoice_id',$invoice->id)->delete();
            Payment::where('invoice_id',$invoice->id)->delete();
            PaymentDetail::where('invoice_id',$invoice->id)->delete();
            return redirect()->route('invoices.view')->with('success','Invoice Deleted Successfully');

          } 
          
//      public function inactive($id){
//             $invoice = Invoice::find($id);
//             $invoice->status = 0;
//             $invoice->save();

//            Session::flash('success','Invoice Inactive Successfully!');

//     	return back();

//         }
// public function active($id){
//             $invoice = Invoice::find($id);
//             $invoice->status = 1;
//             $invoice->save();

//            Session::flash('success','Invoice Active Successfully!');
//     	return back();
//         } 


    public function pendinglist(){
   $data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','0')->get();
    return view('backend.invoice.pending-list',compact('data'));
    }


  public function allview($id){
        $invoice = Invoice::with(['invoicedetails'])->find($id);
         return view('backend.invoice.show-alldata',compact('invoice'));
    }

    public function approve($id){
        $invoice = Invoice::with(['invoicedetails'])->find($id);
         return view('backend.invoice.approve-view',compact('invoice'));
    }


public function customerinvoice($id){
        $data['invoice'] = Invoice::with(['invoicedetails'])->find($id);
        $pdf = PDF::loadView('backend.pdf.invoice-customer-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('customer-invoice.pdf');

    }
    public function approvestore(Request $request, $id){
            foreach ($request->selling_quantity as $key => $value) {
               $invoice_details = InvoiceDetail::where('id',$key)->first();
               $product = Product::where('id',$invoice_details->product_id)->first();
               if($product->quantity < $request->selling_quantity[$key]){
                return redirect()->back()->with('error','Sorry! You Approve Maximum Value');
               }
            }

            $invoice = Invoice::find($id);
            $invoice->approved_by =Auth::user()->id;
            $invoice->status = '1';
            DB::transaction(function() use ($request, $invoice, $id){
                 foreach ($request->selling_quantity as $key => $value) {
               $invoice_details = InvoiceDetail::where('id',$key)->first();
               $invoice_details->status = '1';
               $invoice_details->save();
               $product = Product::where('id',$invoice_details->product_id)->first();
               $product->quantity = ((float)($product->quantity))-((float)$request->selling_quantity[$key]);
               $product->save();

           }

            $invoice->save();
            });
           
      return redirect()->route('invoices.view')->with('success','Invoice Approved Successfully');

   } 


     public function dailyview(Request $request){
       $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
       
         return view('backend.invoice.daily-view',$data);
    }


    public function dailyreportpdf(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         $pdf = PDF::loadView('backend.pdf.daily-invoice-report-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('daily-invoice-report.pdf');

     }

      public function dailyreport(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.invoice.daily-view',$data);

     }

}
