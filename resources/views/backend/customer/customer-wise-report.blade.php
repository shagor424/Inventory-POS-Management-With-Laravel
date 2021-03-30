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
              <li class="breadcrumb-item active">Customer Wise Report</li>
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
                <h5 style="color: white">Customer Wise Report
                  <a  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Invoice List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
             <div class="row">
               <div class="col-md-12 text-center">
                 <strong style="color: green">Cudtomer Wise Product Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="customer_wise" value="product_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Customer Wise Credit Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="customer_wise" value="credit_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Customer Wise Paid Report</strong> &nbsp;&nbsp;&nbsp;
                 <input type="radio" name="customer_wise" value="paid_wise" class="search_value">
               </div>
             </div>
<hr>
             <div class="show_product_wise" style="display: none;">
               <form action="{{ route('customers.wise-product-report') }}" method="GET" id="productwise" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Customer Name</label>
                     <select name="customer_id" class="form-control select2bs4">
                      <option value="">Select Customer</option>
                         @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}} --- {{$customer->mobile}}----{{$customer->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">Search</button>
                   </div>
                 </div>
               </form>
             </div>

             <div class="show_credit_wise" style="display: none;">
               <form action="{{ route('customers.wise-credit-report') }}" method="GET" id="creditwise" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Customer Name</label>
                     <select name="customer_id" class="form-control select2bs4">
                      <option value="">Select Customer</option>
                         @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}--- {{$customer->mobile}}----{{$customer->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">Search</button>
                   </div>
                 </div>
               </form>
             </div>

             <div class="show_paid_wise" style="display: none;">
               <form action="{{ route('customers.wise-paid-report') }}" method="GET" id="paidwise" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Customer Name</label>
                     <select name="customer_id" class="form-control select2bs4">
                      <option value="">Select Customer</option>
                         @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}--- {{$customer->mobile}}----{{$customer->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">Search</button>
                   </div>
                 </div>
               </form>
             </div>


            

            
   
  
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

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-product')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Product Name</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.id+'">'+v.product_name+'</option>';
          });
          $('#product_id').html(html);
        }

      });
    });
  });
</script>


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

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'product_wise'){
      $('.show_product_wise').show();
    }else{
       $('.show_product_wise').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'credit_wise'){
      $('.show_credit_wise').show();
    }else{
       $('.show_credit_wise').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'paid_wise'){
      $('.show_paid_wise').show();
    }else{
       $('.show_paid_wise').hide();
    }
  });
</script>

<script>
$(function () {
  
  $('#productwise').validate({
    rules: {

    
      customer_id: {
      required: true,
        
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

<script>
$(function () {
  
  $('#creditwise').validate({
    rules: {

    
      category_id: {
      required: true,
        
      },

      product_id: {
      required: true,
        
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
<script>
$(function () {
  
  $('#paidwise').validate({
    rules: {

    
      customer_id: {
      required: true,
        
      },

      product_id: {
      required: true,
        
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
