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
              <li class="breadcrumb-item active">Add Payment</li>
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
       <section class="col-md-8 offset-md-2">
           
           <div class="card">
              <div class="card-header">
                <h5>Add Payment
                  <a  href="{{route('payments.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Payment List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="POST" action="{{ route('payments.store') }}" id="myform">
                        @csrf


                         <div class="row justify-content-center">

                          <div class="form-group col-md-7">
                            <label for="course" >Course Name<font class="text-danger">*</font></label>
                                <select name="course" id="course" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" >
                                    <option value=""> Select Course Name</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Web Design and Development">Web Design and Development</option>
                                    <option value="Graphics Design">Graphics Design</option>
                                    <option value="SEO">SEO</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Microsft Office Application">Microsft Office Application</option>
                                </select>

                                @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                         <div class="form-group col-md-7">
                            <label for="method">Payment Method Name<font class="text-danger">*</font></label>
                           
                                <select id="method" name="method" class="form-control @error('method') is-invalid @enderror"  value="{{ old('method') }}" >
                                    <option value=""> Select Payment Method Name</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Nogod">Nogod</option>
                                    <option value="Sure Cash">Sure Cash</option>
                                    <option value="Bank Account">Bank Account</option>
                                </select>

                                @error('method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                         

                        <div class="form-group col-md-7">
                            <label for="sent_mobile">Payment Sender Mobile<font class="text-danger">*</font></label>
                                <input id="sent_mobile" name="sent_mobile" type="text" class="form-control @error('sent_mobile') is-invalid @enderror" sent_mobile="sent_mobile" value="{{ old('sent_mobile') }}"placeholder="Payment Sender Mobile" >

                                @error('sent_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-7">
                            <label for="tid" >Transaction No<font class="text-danger">*</font></label>

                            
                                <input id="tid" type="text" class="form-control @error('tid') is-invalid @enderror" name="tid" value="{{ old('tid') }}" placeholder="Transaction No">

                                @error('tid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                          <div class="form-group col-md-7">
                            <label for="amount">Amount<font class="text-danger">*</font></label>

                           
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="Enter Amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group col-md-7">
                            
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            
                        </div>
                        </div>
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
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

      method: {
      required: true,
        
      },
      sent_mobile: {
        required: true,
        
      },
      amount: {
        required: true,
        
      },
      tid: {
        required: true,
        unique:true,
      },
       
      course: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
    
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      }
      
      
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  @endsection