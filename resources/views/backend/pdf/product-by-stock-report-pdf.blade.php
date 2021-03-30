<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> All Product Wise Stock Report</title>
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

        <div style="text-align: center;font-size: 20px;margin-top: 7px;font-weight: bold;"><u ><i>All Product Wise Stock Report</i></u></div>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>
            <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-sm" border="1" width="100%">
                  <thead>
                   <tr style="background-color: lightgreen">
                    <th>SL</th>
                    <th>Supplier Name</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Unit</th>
                    <th>In Stock</th>
                    <th>Out Stock</th>
                    <th>Current Stock</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $product)
                      @php
                    $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buy_quantity');
                   
                    $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_quantity');
                    @endphp
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td>{{$product['supplier']['name']}}</td>
                <td>{{$product['category']['item_name']}}</td>
                <td>{{$product->product_name}}</td>
                <td style="text-align: center;">{{$product->product_code}}</td>
                <td>{{$product['unit']['item_name']}}</td>
                <td style="text-align: center;">{{ $buying_total }}</td>
                <td style="text-align: center;">{{ $selling_total }}</td>
                <td style="text-align: center;">{{$product->quantity}}</td>
                      
                    </tr>
                    @endforeach
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