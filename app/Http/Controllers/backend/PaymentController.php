<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use App\Model\Payment;

class PaymentController extends Controller
{
     public function view(){
     if(Auth::check()){
            $payments = Payment::where('user_id',Auth::id())->latest()->get();
       
         return view('user.payment.view-payment',compact('payments'));
        }else{
            return redirect()->route('login')->with('loginerror','At First Login Your Account');

        }
}

    public function adminview(){

    $paymentss = Payment::all();
    return view('user.payment.adminview-payment',compact('paymentss'));
     
   }

    public function add(){
    	$users = User::get();
    	return view('user.payment.add-payment',compact('users'));
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'method'=>'required',
            'course'=>'required',
            'sent_mobile'=>'required',
            'tid'=>'required|unique:payments,tid',
            'amount'=>'required',
        ]);
        
    	$data = new Payment();
        $data->user_id = Auth::user()->id;
        $data->st_id = Auth::user()->code;
        $data->name = Auth::user()->name;
    	$data->st_mobile = Auth::user()->mobile;
        $data->course = $request->course;
    	$data->method = $request->method;
    	$data->sent_mobile = $request->sent_mobile;
        $data->tid = $request->tid;
        $data->amount = $request->amount;
       // if ($request->file('image')){
       //   $file = $request->file('image');
       //   $filename =date('YmdHi').$file->getClientOriginalName();
        //  $file->move(public_path('upload/paymentimage'), $filename);
        //  $data['image'] = $filename;
        //}
    	$data->save();

    	return redirect()->route('payments.view')->with('success','Payment Successfully Done!!');

    }

    public function edit($id){
        $payment = Payment::find($id);
        return view('user.payment.edit-payment',compact('payment'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'method'=>'required',
            'course'=>'required',
            'sent_mobile'=>'required',
            'tid'=>'required',
            'amount'=>'required',
        ]);
        $data = Payment::find($id);//
        $data->course = $request->course;
        $data->method = $request->method;
        $data->sent_mobile = $request->sent_mobile;
        $data->tid = $request->tid;
        $data->amount = $request->amount;

       // if ($request->file('image')){
         // $file = $request->file('image');
         // @unlink(public_path('upload/paymentimage/'.$data->image));
         // $filename =date('YmdHi').$file->getClientOriginalName();
         // $file->move(public_path('upload/paymentimage'), $filename);
         // $data['image'] = $filename;
        //}
        $data->save();

        return redirect()->route('paymentss.adminview')->with('success','Payment Upadete Successfully Done!!');

    }



    public function inactive(Request  $request,$id){
            $payment = Payment::find($id);
             $payment->status = $request->status = 0;
            $payment->save();
            return redirect()->route('paymentss.adminview')->with('success','Payment Unsuccessfull');
          }

          public function active(Request  $request,$id){
            $payment = Payment::find($id);
            $payment->status = $request->status = 1;
            $payment->save();
            return redirect()->route('paymentss.adminview')->with('success','Payment Successfull');
          }


            public function delete($id){
            $payment = payment::find($id);

          //if (file_exists('public/upload/paymentimage/' . $payment->image) AND !
           // empty($payment->image)){
              // unlink('public/upload/paymentimage/' . $payment->image);
       //}
            $payment->delete();
            return redirect()->route('paymentss.adminview')->with('success','Payment Deleted Successfully');

          } 

//=============Payment Check=============
           public function checkview(){
           
          return view('user.payment.check-view');
     
   }
 public function Paymentcheck(Request $request){

$this->validate($request,[
            
            'st_mobile'=>'required',
            'tid'=>'required',
           
        ]);

$mobile= $_POST['st_mobile'];
$tid= $_POST['tid'];

$result = DB::select( "SELECT * FROM payments where st_mobile='$mobile' and tid='$tid' and status ='1'");




  if($result){

return redirect()->back()->with('success','Your Payment Successfully Paid');


}


 else { 
return redirect()->back()->with('error','Your Payment Not Paid!!! Please Check TnxID or Mobile Number!!');

}


    }

}