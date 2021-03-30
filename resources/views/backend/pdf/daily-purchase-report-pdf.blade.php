<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> Date Wise Purchase Report</title>
  </head>
  <body>
        <table width="100%" style="border:solid;" >
          <tr>
            <td style="text-align: center;" width="20%">
              <img src="upload/usernoimage.png" style="border-radius: 50%;height: 80px;width: 80px">
            </td>
            <td style="text-align: center;" width="45%">
              <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SSB Freelancer Club</h2>
              <h3 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sherpur, Bogura</h3>
              <h4 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile : 01712411894</h4>
            </td>
            <td style="text-align: right;" width="35%">
               <div class="card-header" style="">
                <strong><u>Date Wise Purchase Report</u></strong>
                Start Date : {{date('d-m-Y',strtotime($start_date))}}<strong> &nbsp;&nbsp;</strong> 
                <br>
               End Date : {{date('d-m-Y',strtotime($end_date))}} <strong >&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>

        <div style="text-align: center;font-size: 18px;font-weight: bold;padding-top: 7px"><u><i>Date Wise Purchase Report</i></u></div>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>
            <div class="card-body">
                                   
               
                <table id="example1" class="table table-bordered table-hover table-sm" border="1" width="100%">
                  <thead>
                   <tr style="background-color: lightgreen;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Purchase No</th>
                    <th>Purchase Date</th>
                    <th>Supplier Name</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Subtotal Price</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $grand_total = '0';
                      @endphp
                    @foreach($alldata as $key => $purchase)
                    <tr>
                      
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$purchase->id}}</td>
                <td style="text-align: center;">{{$purchase->product_code}}</td>
                <td style="text-align: center;">{{date('d-m-y',strtotime($purchase->purchase_date))}}</td>
                
                <td>{{$purchase['supplier']['name']}}</td>
                 <td>{{$purchase['product']['category']['item_name']}}</td>
                <td>{{$purchase['product']['product_name']}}</td>
                <td style="text-align: center;">{{$purchase->purchase_code}}</td>
                <td>{{$purchase['product']['unit']['item_name']}}</td>
                <td style="text-align: center;">{{$purchase->buy_quantity}}</td>
                <td style="text-align: right;">{{$purchase->unit_price}}</td>
                <td style="text-align: right;">{{$purchase->buy_price}}</td>
                    </tr>

                @php
                $grand_total += $purchase->buy_price;
                @endphp

        @endforeach

        <tr>
          <th colspan="10" style="text-align: right;">Grand Total</th>
          <td style="text-align: right;background: lightgreen">{{$grand_total}}.00</td>
        </tr>

                  </tbody>
                </table>


                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 12px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td width="25%"></td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Owner Signature</td>
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