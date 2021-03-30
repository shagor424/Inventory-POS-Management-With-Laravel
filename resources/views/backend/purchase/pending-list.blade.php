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
              <li class="breadcrumb-item active">View Product</li>
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
                <h5>  Purchase Pending List
                  <a  href="{{route('purchases.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Purchase</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a  href="{{route('purchases.view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"> Purchase Approval List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Purchase No</th>
                    <th>Date</th>
                    <th>Pt Code</th>
                    <th>Supplier Name</th>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Sell Price</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $purchase)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$purchase->id}}</td>
                <td style="text-align: center;">{{$purchase->purchase_code}}</td>
                <td style="text-align: right;">{{date('d-m-y',strtotime($purchase->purchase_date))}}</td>
                <td style="text-align: center;">{{$purchase->product_code}}</td>
                <td>{{$purchase['supplier']['name']}}</td>
                <td>{{$purchase['product']['product_name']}}</td>
                <td>{{$purchase['product']['unit']['item_name']}}</td>
                <td style="text-align: center;">{{$purchase->buy_quantity}}</td>
                <td style="text-align: right;">{{$purchase->unit_price}}</td>
                <td style="text-align: right;">{{$purchase->sell_price}}</td>
                 
                <td style="text-align: center;">
                     @if($purchase->status==1)
                    <span style="padding: 5px" class="badge badge-success">Approved</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Pending</span>
                    @endif
                  </td>
                    
                      <td style="text-align: center;">
                          <a href="{{route('purchases.approve',$purchase->id)}}" title="Purchase Approve" class="btn btn-success btn-xs mr-2" id="approve" > <i class="fa fa-check-circle"></i></a>
                         
                          <a href="{{route('purchases.allview',$purchase->id)}}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-lg" title="Show All Data"> <i class="fa fa-eye"></i></a>
                           
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
                  <th width="50%">purchase ID</th>
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