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
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th style="width: 15px">SL</th>
                    <th class="width 10%">Student ID</th>
                    <th class="width 10%">Name</th>
                    <th class="width 10%">Course</th>
                    <th class="width 10%">Method</th>
                    <th class="width 10%">Sender Mobile</th>
                    <th class="width 15%">TnxID</th>
                    <th class="width 5%">Amount</th>
                    <th class="width 5%">Pay Status</th>
                    <th style="width: 100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($paymentss as $key => $payment)
            <tr style="background-color:    #b9d2e8    
;border: 2px">
                      <td>{{$key+1}}</td>
                      <td>{{$payment->st_id}}</td>
                      <td>{{$payment->name}}</td>
                      <td>{{$payment->course}}</td>
                      <td>{{$payment->method}}</td>
                      <td>{{$payment->sent_mobile}}</td>
                      <td>{{$payment->tid}}</td>
                      <td>{{$payment->amount}}</td>
                       <td> @if($payment->status==1)
                    <span class="badge badge-success">Success</span>
                    @else
                    <span class="badge badge-danger">Unsuccess</span>
                    @endif</td>
                      <!--<td><img style="width: 50px;height: 60px" class="profile-payment-img img-fluid img-circle"
                       src="{{(!empty($payment->image))?url('public/upload/paymentimage/'.$payment->image):url('public/upload/usernoimage.png')}}"
                       alt="User profile picture"></td>-->
                      <td>
                    @if($payment->status==1)
                    <a href="{{route('paymentss.inactive',$payment->id)}}"class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"> </i></a>
                    @else
                    <a href="{{route('paymentss.active',$payment->id)}}"class="btn btn-success btn-sm"><i class="fa fa-arrow-up"> </i></a>
                    @endif
                    <a title="Edit" href="{{route('paymentss.edit',$payment->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('paymentss.delete',$payment->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></a>
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
  @endsection