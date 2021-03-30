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
              <li class="breadcrumb-item active">Credit Or Due Customer List</li>
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
                <h5> Paid Customer List
                  <a target="_blank"  href="{{route('customers.paid-pdf')}}" class="btn btn-success btn-sm float-right mr-5"><i class="fa fa-download"> Paid Customer Download</i></a>
                  
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Invoice ID</th>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['id']}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['invoice_no']}}</td>
                <td>{{$invoice['customer']['name']}}</td>
                <td>{{$invoice['customer']['mobile']}}</td>
                <td style="text-align: center;">{{date('d-m-y',strtotime($invoice['invoice']['invoice_date']))}}</td>
                <td style="text-align: center;">{{$invoice['total_amount']}}</td>
                <td style="text-align: center;">{{$invoice['paid_amount']}}</td>
               <td style="text-align: right;color: green;font-weight: bold;">{{$invoice['due_amount']}} </td> 
               
                      <td style="text-align: center;">
                         
                           <a href="{{ route('customers.paid-invoice-details-pdf',$invoice->invoice_id) }}" class="btn btn-success btn-xs" target="_blank"  title="Customer Payment Summary"> <i class="fa fa-eye"></i></a>
                            
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


    
  @endsection