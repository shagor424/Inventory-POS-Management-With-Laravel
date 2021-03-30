<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title>Customer Invoice</title>
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
                Invoice No :<strong> {{$invoice->invoice_no}}&nbsp;&nbsp;</strong> 
                <br>
               Invoice Date: <strong >{{date('d-m-Y',strtotime($invoice->invoice_date))}}&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>
            <div class="card-body">
                                    @php
                                     $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
                                    @endphp
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
                      <td width="17%">{{$invoice['payment']['customer']['name']}}</td>
                      <td width="17%">{{$invoice['payment']['customer']['shop_name']}}</td>
                      <td width="16%" style="text-align: center;">{{$invoice['payment']['customer']['mobile']}}</td>
                      <td width="18%">{{$invoice['payment']['customer']['email']}}</td>
                      <td width="33%">{{$invoice['payment']['customer']['address']}}</td>
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
                   @endphp
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                      <input type="hidden" name="category_id[]" value="{{$invoicedetail->category_id}}">
                      <input type="hidden" name="product_id[]" value="{{$invoicedetail->product_id}}">
                      <input type="hidden" name="selling_quantity[{{$invoicedetail->id}}]" value="{{$invoicedetail->selling_quantity}}">
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $invoicedetail->product_code }}</td>
                      <td>{{$invoicedetail['category']['item_name']}}</td>
                      <td>{{$invoicedetail['brand']['item_name']}}</td>
                      <td>{{$invoicedetail['product']['product_name']}}</td>
                      <td style="text-align: center;">{{$invoicedetail->size}}</td>
                      <td style="text-align: center;">{{$invoicedetail['unit']['item_name']}}</td>
                     
                      <td style="text-align: center;">{{$invoicedetail->selling_quantity}}</td>
                      <td style="text-align: right;" width="10%">{{$invoicedetail->unit_price}}</td>
                      <td style="text-align: right;" width="13%">{{$invoicedetail->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $invoicedetail->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="9">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="9">Discount Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['discount_amount']}}</td>
                    </tr>
                     @php
                   $total_amount = $total_sum - $invoice['payment']['discount_amount'];
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="9">Total Amount</th>
                      <td style="text-align: right;background-color: #D8FDBA">{{$invoice['payment']['total_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="9">Paid Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="9">Due Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
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