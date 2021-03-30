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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Payment List</li>
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

              <div class="card-header">
                <h5>Payment List
                  <a  href="{{route('payments.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Payment</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Student ID</th>
                    <th>Course</th>
                    <th>Method</th>
                    <th>Sender Mobile</th>
                    <th>TnxID</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <!--<th>Image</th>
                    <th>Action</th>-->
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($payments as $key => $payment)
            <tr style="background-color:    #b9d2e8    
;border: 2px">
                      <td>{{$key+1}}</td>
                      <td>{{$payment->st_id}}</td>
                      <td>{{$payment->course}}</td>
                      <td>{{$payment->method}}</td>
                      <td>{{$payment->sent_mobile}}</td>
                      <td>{{$payment->tid}}</td>
                      <td>{{$payment->amount}}</td>
                      <td> @if($payment->status==1)
                    <span class="badge badge-success">Payment Success</span>
                    @else
                    <span class="badge badge-danger">Payment Unsuccess</span>
                    @endif</td>
                     
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
  @endsection