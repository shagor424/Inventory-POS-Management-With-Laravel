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
              <li class="breadcrumb-item active">Supplier Wise Stock Report</li>
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
                <h5 style="color: white">Supplier Wise Stock Report
                  <a  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Invoice List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
             <div class="row">
               <div class="col-md-12 text-center">
                 <strong style="color: green">Supplier Wise Stock Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="supplier_wise_product" value="supplier_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Product Wise Stock Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="supplier_wise_product" value="product_wise" class="search_value">
               </div>
             </div>
<hr>
             <div class="show_supplier" style="display: none;">
               <form action="{{ route('stocks.supplier-stock-report-pdf') }}" method="GET" id="supplierwisestock" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Supplier Name</label>
                     <select name="supplier_id" class="form-control select2bs4">
                      <option value="">Select Supplier</option>
                         @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}---{{$supplier->mobile}}---{{$supplier->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">Search</button>
                   </div>
                 </div>
               </form>
             </div>


             <div class="show_product" style="display: none;">
               <form action="{{ route('stocks.product-stock-report-pdf') }}" method="GET" id="porductwisestock" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-4">
                     <label>Category Name</label>
                     <select name="category_id" class="form-control select2bs4" id="category_id">
                      <option value="">Select Category Name</option>
                         @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->item_name}}</option>
                        @endforeach 
                     </select>
                   </div>
                  
                   <div class="col-sm-4">
                     <label>Product Name</label>
                     <select name="product_id" class="form-control select2bs4" id="product_id">
                      <option value="">Select Product Name</option>
                         @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name}}</option>
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
    if(search_value == 'supplier_wise'){
      $('.show_supplier').show();
    }else{
       $('.show_supplier').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'product_wise'){
      $('.show_product').show();
    }else{
       $('.show_product').hide();
    }
  });
</script>

<script>
$(function () {
  
  $('#supplierwisestock').validate({
    rules: {

    
      supplier_id: {
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
  
  $('#porductwisestock').validate({
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


  @endsection
