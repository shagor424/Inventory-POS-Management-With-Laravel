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
              <li class="breadcrumb-item active">View Invoice Pending List</li>
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
                <h5>  Invoice Pending List
                  <a   href="{{route('invoices.add')}}" class="btn btn-success btn-sm float-right mr-5"><i class="fa fa-plus-circle"> Add Invoice</i></a>
                  <a  href="{{route('invoices.view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"> Invoice Approved List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->id}}</td>
                <td style="text-align: center;">{{$invoice->invoice_no}}</td>
                <td>{{$invoice['payment']['customer']['name']}}</td>
                <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->invoice_date))}}</td>
                <td style="text-align: center;">{{$invoice['payment']['total_amount']}}</td>
                <td style="text-align: center;">{{$invoice['payment']['paid_amount']}}</td>
                <td style="text-align: center;">{{$invoice['payment']['due_amount']}}</td>
                <td style="text-align: center;">
                     @if($invoice->status==1)
                    <span style="padding: 8px" class="badge badge-success">Approved</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Pending</span>
                    @endif
                  </td>
                      <td style="text-align: center;">
                         <a href="{{route('invoices.approve',$invoice->id)}}" title="Purchase Approve" class="btn btn-success btn-xs mr-2" > <i class="fa fa-check-circle"></i></a>

                          <a href="{{route('invoices.allview',$invoice->id)}}" class="btn btn-primary btn-xs"  title="Show All Data"> <i class="fa fa-eye"></i></a>

                           <a href="{{route('invoices.delete',$invoice->id)}}" class="btn btn-danger btn-xs" id="delete" style="Delete Data"> <i class="fa fa-trash"></i></a>
                           
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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

@php
$payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
@endphp
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl ">
          <div class="modal-content ">
            <div  class="modal-header bg-danger">
            
               <h4>Invoice Details</h4><h5> &nbsp;&nbsp; &nbsp;&nbsp; Invoice No :<strong> {{$invoice->invoice_no}}</strong> &nbsp;&nbsp; &nbsp;&nbsp;Customer Name :<strong> {{$invoice['payment']['customer']['name']}} </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Date: <strong>{{date('d-m-Y',strtotime($invoice->invoice_date))}}</strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <table width="100%" class="table table-bordered table-sm">
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
                <button type="submit" class="btn btn-primary float-right">Invoice Approve Store</button>
               </form>
            </div>
            <div  class="modal-footer float-right bg-danger">
             {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endsection