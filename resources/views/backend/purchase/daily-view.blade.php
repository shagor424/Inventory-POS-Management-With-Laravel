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
              <li class="breadcrumb-item active">Date Wise Search Purchase</li>
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

          <section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Date By Search Purchase
                  <a  href="{{route('purchases.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> purchase List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
                
            
   
  <form method="GET" action="{{ route('purchases.daily-report-pdf') }}" id="myform" target="_blank">
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="start_date" class="col-sm-12 control-label">Start Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-3">
            <input type="text" name="start_date" class="form-control-sm"  id="datepicker" placeholder="YYYY-MM-DD" data-validation="requierd" readonly="" id="start_date">
            @error('start_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        
        <div class="col-sm-3">
            <input type="text" name="end_date" class="form-control form-control-sm"  id="datepicker1" placeholder="YYYY-MM-DD" data-validation="requierd"readonly="" id="end_date">
            @error('end_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
        <div class="col-md-2">
    <div class="form-group"> 
        <label for="end_date" class="col-sm-12 control-label">End Date <span class="text-danger">*</span></label>
      </div>
    </div>

        <div class="col-md-2">
        <input type="submit" name="" class="btn btn-success" target="_blank" value="Date By Search">
    </div>

      
         </div>
         </form>
</div>

<!-- Strat Card Body 2 -->


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
<!-- store -->


  <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

     <script>
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      start_date: {
      required: true,
        
      },

      end_date: {
      required: true,
        
      },
     
      selling_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      unit_price: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword: {
        
        equalTo:"Confirm password Does Not Match",
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
