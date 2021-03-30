<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title>Paid Customer Invoice Wise Payment Summary</title>
  </head>
  <body>
        <table width="100%" style="border:solid;" >
          <tr>
            <td style="text-align: center;" width="20%">
              <img src="upload/usernoimage.png" style="border-radius: 50%;height: 80px;width: 80px">
            </td>
            <td style="text-align: center;padding-left: 10px;" width="50%">
             <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SSB Freelancer Club</h2>
              <h3 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sherpur, Bogura</h3>
              <h4 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile : 01712411894</h4>
            </td>
            <td style="text-align: right;" width="30%">
               <div class="card-header" style="">
                Invoice No :<strong> {{$payment['invoice']['invoice_no']}}&nbsp;&nbsp;</strong> 
                <br>
               Invoice Date: <strong >{{date('d-m-Y',strtotime($payment['invoice']['invoice_date']))}}&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>
            <div class="card-body">
                                   
                <table width="100%" class="table table-bordered table-sm" border="1" >
                  <tbody>
                    <tr><th colspan="5" class="text-center" style="font-size: 20px">Customer Information</th></tr>
                    <tr>
                      <th width="15%">Customer Name</th>
                      <th width="15%">Shope Name</th>
                      <th width="16%">Mobile</th>
                      <th width="18%">Email</th>
                      <th width="33%">Address</th>
                    </tr>
                     <tr>
                      <td width="17%">{{$payment['customer']['name']}}</td>
                      <td width="17%">{{$payment['customer']['shop_name']}}</td>
                      <td width="16%" style="text-align: center;">{{$payment['customer']['mobile']}}</td>
                      <td width="18%">{{$payment['customer']['email']}}</td>
                      <td width="33%">{{$payment['customer']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
                <br>
               
                 <table width="100%" border="1" class="table table-bordered table-sm" style="margin-bottom: 15px;padding-bottom: 0">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Pt Code</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th>Unit</th>
                      <th>Sell Qty</th>
                      <th>Unit Price</th>
                      <th>Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                    $invoicedetails = App\Model\InvoiceDetail:: where('invoice_id',$payment->invoice_id)->get();
                   @endphp
                   @foreach($invoicedetails as $key => $details)
                    <tr>
                     <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{$details['product']['product_code']}}</td>
                      <td>{{$details['category']['item_name']}}</td>
                      <td>{{$details['brand']['item_name']}}</td>
                      <td>{{$details['product']['product_name']}}</td>
                      <td style="text-align: center;">{{$details->size}}</td>
                      <td style="text-align: center;">{{$details['unit']['item_name']}}</td>
                      <td style="text-align: center;">{{$details->selling_quantity}}</td>
                      <td style="text-align: right;">{{$details->unit_price}}</td>
                      <td style="text-align: right;">{{$details->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $details->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="9">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="9">Discount Amount</th>
                      <td style="text-align: right;">{{$payment->discount_amount}}</td>
                    </tr>
                     @php
                   $total_amount = $total_sum - $payment->discount_amount;
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="9">Total Amount</th>
                      <td style="text-align: right;background-color: #D8FDBA">{{$payment->total_amount}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="9">Paid Amount</th>
                      <td style="text-align: right;">{{$payment->paid_amount}}</td>
                    </tr>
                    <tr>
                      
                      <th style="text-align: right;" colspan="9">Due Amount</th>
                      <td style="text-align: right;">{{$payment->due_amount}}</td>
                    </tr>
                  </tbody>
                </table>

                <table width="100%" border="1" class="table table-bordered table-sm" style="margin-bottom: 15px;padding-bottom: 0">

                  <tr style="height: 20px">
                    <th colspan="4" style="height: 20px;font-size: 18px;padding: 8px 0px">Invoice Wise Paid Customer Payment Summary</th>
                  </tr>
                  <thead>
                  <tr> 
                    <th>SL</th>
                    <th>Payment Date</th>
                    <th>Payment Status Type</th>
                    <th>Payment Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_pay = '0';
                    $invoice_details = App\Model\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
                   @endphp
                  @foreach($invoice_details as $key => $dtl)
                  <tr>
                    <td style="text-align: center;">{{$key+1}}</td>
                    <td style="text-align: center;">{{date('d-m-Y',strtotime($dtl->payment_date))}}</td>
                    <td style="text-align: center;">{{$dtl['payment']['paid_status']}}</td>
                    <td style="text-align: right;">{{$dtl->current_paid_amount}}</td>
                  </tr>
                    @php
                   $total_pay += $dtl->current_paid_amount;
                   @endphp
                  @endforeach
                  <tr>
                    <th colspan="3" >Total Payment</th>
                    <td style="text-align: right;background-color: lightgreen">{{$total_pay}}.00</td>
                  </tr>
                  </tbody>
                </table>
                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 10px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td style="text-align: center;border-top: solid " width="25%">Customer Signature</td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Accountant Signature</td>
          </tr>
        </table>
                

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>