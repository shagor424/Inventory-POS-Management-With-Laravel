<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> Individual Customer Paid Report</title>
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
                <strong></strong>
                <strong> &nbsp;&nbsp;</strong> 
                <br>
                <strong >&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>

        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual Customer Paid Report</i></u></div>
           <br>

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
                      <td width="17%">{{$alldata['0']['customer']['name']}}</td>
                      <td width="17%">{{$alldata['0']['customer']['shop_name']}}</td>
                      <td width="16%" style="text-align: center;">{{$alldata['0']['customer']['mobile']}}</td>
                      <td width="18%">{{$alldata['0']['customer']['email']}}</td>
                      <td width="33%">{{$alldata['0']['customer']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
             
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm" border="1" width="100%">
                  <thead>
                   <tr style="background-color:lightgreen">
                    <th>SL</th>
                    <th>Invoice ID</th>
                    <th>Invoice No</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                  $total_total_sum = '0';
                  $total_paid_sum = '0';
                  $total_due_sum = '0';
                  @endphp
                    @foreach($alldata as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['id']}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['invoice_no']}}</td>
                
                <td style="text-align: center;">{{date('d-m-y',strtotime($invoice['invoice']['invoice_date']))}}</td>
                <td style="text-align: right;">{{$invoice['total_amount']}}</td>
                <td style="text-align: right;">{{$invoice['paid_amount']}}</td>
                <td style="text-align: right;">{{$invoice['due_amount']}}</td>
                
                    </tr>
                     @php
                $total_total_sum += $invoice['total_amount'];
                 $total_paid_sum += $invoice['paid_amount'];
                  $total_due_sum =+ $invoice['due_amount'];
                @endphp
                    @endforeach 
                     <tr>
                      <th colspan="4" style="text-align: right;">Grand Total</th>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_total_sum}}.00</td>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_paid_sum}}.00</td>
                      <td style="background-color: red;text-align: right;color: ">{{$total_due_sum}}.00</td>
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