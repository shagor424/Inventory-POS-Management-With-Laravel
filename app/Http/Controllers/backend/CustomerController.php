<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Model\Supplier;
use App\Model\Customer;
use PDF;
use App\Model\Payment;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\PaymentDetail;
class CustomerController extends Controller
{
    public function view(){
     $customers = Customer::get();
    	return view('backend.customer.view-customer',compact('customers'));
    }

    public function add(){
    	return view('backend.customer.add-customer');
    }

    
     public function store(Request $request){

      $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:customers,email',
            'mobile'=>'required',
            'address'=>'required',
            'shop_name'=>'required',
            

        ]);
        
    	$data = new Customer();
      $data->name = $request->name;
      $data->shop_name = $request->shop_name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;
    	$data->save();

    	return redirect()->route('customers.view')->with('success','Data Inserted Successfully');
    }


     public function edit($id){
     $editdata = Customer::find($id);
    	return view('backend.customer.edit-customer',compact('editdata'));
    }

      public function update(Request $request , $id){
        
         $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'shop_name'=>'required',
       
        ]);

      $data = Customer::find($id);
      $data->name = $request->name;
      $data->shop_name = $request->shop_name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->updated_by = Auth::user()->id;
    	$data->save();

    	return redirect()->route('customers.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
            $customer = Customer::find($id);
            $customer->delete();
           return redirect()->route('customers.view')->with('success','Customer Deleted Successfully');

    }

    public function creditcustomer(){
     $data = Payment::whereIn('paid_status',['full_due','some_paid'])->get();
      return view('backend.customer.credit-customer',compact('data'));
    }  

     public function creditcustomerpdf(){
     $data['alldata'] = Payment::whereIn('paid_status',['full_due','some_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.credit-customer-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-credit-report.pdf');
    }

     public function paidcustomer(){
     $data = Payment::whereIn('paid_status',['full_paid'])->get();
      return view('backend.customer.paid-customer',compact('data'));
    }  

     public function paidcustomerpdf(){
     $data['alldata'] = Payment::whereIn('paid_status',['full_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.paid-customer-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-paid-report.pdf');
    }




    public function invoicecustomeredit($invoice_id){
      $payment = Payment::where('invoice_id',$invoice_id)->first();
       $invoicedetails = InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
      return view('backend.customer.edit-customer-invoice',compact('payment','invoicedetails'));
    } 


     public function invoicecustomerupdate(Request $request,$invoice_id){

      if($request->new_paid_amount < $request->paid_amount){
        return redirect()->back()->with('error', 'Sorry! you have paid maximum value');
      }else{
         $payment = Payment::where('invoice_id',$invoice_id)->first();
         $payment_details = new PaymentDetail();
         $payment->paid_status = $request->paid_status;
         if($request->paid_status == 'full_paid'){
          $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
          $payment->due_amount = '0';
          $payment_details->current_paid_amount = $request->new_paid_amount;
         }elseif ($request->paid_status == 'some_paid') {
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
            $payment_details->current_paid_amount = $request->paid_amount;
         
          }
         $payment->save();
         $payment_details->invoice_id = $invoice_id;
         $payment_details->payment_date = date('Y-m-d',strtotime($request->payment_date));
         $payment_details->updated_by = Auth::user()->id;
         $payment_details->save();
       
     
      return redirect()->route('customers.credit')->with('success','Customer Invoice Payment Update Successfully');
      }

    }
     
    public function invoicecustomerdetailspdf($invoice_id){
     $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
      $pdf = PDF::loadView('backend.pdf.all-credit-customer-details-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-credit-report.pdf');
    }


     public function invoicecPaidustomerdetailspdf($invoice_id){
     $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
      $pdf = PDF::loadView('backend.pdf.all-paid-customer-details-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-credit-report.pdf');
    }


     public function customerwisereport(){
    $customers = Customer::all();
    return view('backend.customer.customer-wise-report',compact('customers'));
    }


      public function customerwiseProductreport(Request $request){
      $data['invoicedetails'] = InvoiceDetail::where('customer_id',$request->customer_id)->get();
       $data['payment'] = Payment::where('customer_id',$request->customer_id)->get();
      $pdf = PDF::loadView('backend.pdf.customer-wise-product-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-wise-product-report.pdf');
      
    }

     public function customerwisecreditreport(Request $request){
       $data['alldata'] = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','some_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.customer-wise-credit-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-by-stock-report.pdf');
      
    }

     public function customerwisepaidreport(Request $request){
       $data['alldata'] = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.customer-wise-paid-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-by-stock-report.pdf');
      
    }

}
