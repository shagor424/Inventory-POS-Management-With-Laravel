@extends('backend.layouts.master') 
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">View Invoice Details</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
              <div class="card-header" style="background-color:   #f1c40f  ">
                <h5>Invoice No :<strong> {{$invoice->invoice_no}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Customer Name :<strong> {{$invoice['payment']['customer']['name']}} </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Date: <strong>{{date('d-m-Y',strtotime($invoice->invoice_date))}}</strong>
                  <a  href="{{route('invoices.pending-list')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"><strong style="font-size: 18px"> Invoice Pending List</strong></i></a>
               
               
                </h5>
              </div> 
            <div class="card-body">
                                    @php
                                     $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
                                    @endphp
                <table width="100%" class="table table-bordered table-sm" >
                  <tbody>
                    <tr><th colspan="5" class="text-center" style="font-size: 20px">Customer Information</th></tr>
                    <tr>
                      <th width="15%">Customer Name</th>
                      <th width="15%">Shope Name</th>
                      <th width="13%">Mobile</th>
                      <th width="18%">Email</th>
                      <th width="40%">Address</th>
                    </tr>
                     <tr>
                      <td width="17%">{{$invoice['payment']['customer']['name']}}</td>
                      <td width="17%">{{$invoice['payment']['customer']['shop_name']}}</td>
                      <td width="13%">{{$invoice['payment']['customer']['mobile']}}</td>
                      <td width="18%">{{$invoice['payment']['customer']['email']}}</td>
                      <td width="36%">{{$invoice['payment']['customer']['address']}}</td>
                    </tr>
                  </tbody>
                </table>
                <br>
               <form method="post" action="{{route('invoices.approve-store',$invoice->id)}}">
                @csrf
                 <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Pt Code</th>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th>Unit</th>
                      <th style="background: #ddd">Stock Qty</th>
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
                      <td style="text-align: center;background: #ddd">{{$invoicedetail['product']['quantity']}}</td>
                      <td style="text-align: center;">{{$invoicedetail->selling_quantity}}</td>
                      <td style="text-align: right;">{{$invoicedetail->unit_price}}</td>
                      <td style="text-align: right;">{{$invoicedetail->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $invoicedetail->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="10">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="10">Discount Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['discount_amount']}}</td>
                    </tr>
                     @php
                   $total_amount = $total_sum - $invoice['payment']['discount_amount'];
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="10">Total Amount</th>
                      <td style="text-align: right;background-color: #D8FDBA">{{$invoice['payment']['total_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="10">Paid Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="10">Due Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
                    </tr>
                  </tbody>
                </table>
                <button id="approve" type="submit" class="btn btn-danger float-right">Invoice Approve Store</button>
               </form>
                
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- modal -->


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div style="background: gray" class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-sm">
                <tr>
                  <th width="50%">Invoice ID</th>
                  <td width="50%">gfgf</td>
                </tr>
              </table>
            </div>
            <div style="background: gray" class="modal-footer float-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endsection