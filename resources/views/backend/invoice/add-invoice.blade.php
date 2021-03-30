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
              <li class="breadcrumb-item active">Add Invoice</li>
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
                <h5 style="color: white">Add Invoice
                  <a  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Invoice List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:     #d9dad6   ">
                
            
   
  
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="invoice_date" class="col-sm-12 control-label">Invoice Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
             <input type="date" name="invoice_date" class="form-control"    placeholder="YYYY-MM-DD" data-validation="requierd"   id="invoice_date">
            @error('invoice_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="col-md-2">
   <div class="form-group">
        <label for="unit_id" class="col-sm-12 control-label">Unit Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-md-4">
             <input type="text" name="unit_id" class="form-control text-center" value="{{old('unit_id')}}" id="unit_id" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
            @error('unit_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

     <div class="col-md-2">
   <div class="form-group">
        <label for="invoice_no" class="col-sm-12 control-label"> Invoice No <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-md-4">
          <input type="text"  name="invoice_no" class="form-control text-center" value="{{$invoice_no}}" id="invoice_no" data-validation="requierd" readonly style="background-color:  #d3de23 ">
          @error('invoice_no')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

     <div class="col-md-2">
    <div class="form-group"> 
        <label for="model" class="col-sm-12 control-label">Model </label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="model" class="form-control text-center" value="{{old('model')}}" id="model" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
            @error('model')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
       
   
  <div class="col-md-2">
   <div class="form-group">
        <label for="category_id" class="col-sm-12 control-label"> Category Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <select  name="category_id" class="form-control select2bs4" id="category_id">
          <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->item_name}}</option>
                @endforeach
            </select>
          @error('category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    
   
   <div class="col-md-2">
    <div class="form-group"> 
        <label for="size" class="col-sm-12 control-label">Size/Weight <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="size" class="form-control text-center" value="{{old('size')}}" id="size" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
            @error('size')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
  

 <div class="col-md-2">
    <div class="form-group">
        <label for="sub_category_id" class="col-sm-12 control-label">Sub Cat Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="sub_category_id" class="form-control select2bs4" id="sub_category_id">
                <option value="">Select Sub Category</option>
                @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->item_name}}</option>
                @endforeach
            </select>
            @error('sub_category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

 
<div class="col-md-2">
      <div class="form-group"> 
        <label for="color" class="col-sm-12 control-label">Product Color</label>
      </div>
    </div>
        <div class="col-sm-4">
           <input type="text" name="color" class="form-control text-center" value="{{old('color')}}" id="color" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
            @error('color')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
   

<div class="col-md-2">
    <div class="form-group">
        <label for="sub_category_id" class="col-sm-12 control-label">Sub Sub Cat Name </label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="sub_sub_category_id" class="form-control select2bs4" id="sub_sub_category_id">
                <option value="">Select Sub Sub Category</option>
                @foreach($subsubcategories as $subsubcategory)
                <option value="{{$subsubcategory->id}}">{{$subsubcategory->item_name}}</option>
                @endforeach
            </select>
            @error('sub_sub_category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
   
<div class="col-md-2">
      <div class="form-group"> 
        <label for="warranty_time" class="col-sm-12 control-label">Warranty Time <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="warranty_time" class="form-control text-center" value="{{old('warranty_time')}}" id="warranty_time" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
              @error('warranty_time')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

   <div class="col-md-2">
   <div class="form-group">
        <label for="brand_id" class="col-sm-12 control-label">Brand Name </label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="brand_id" class="form-control select2bs4" id="brand_id">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->item_name}}</option>
                @endforeach
            </select>
            @error('brand_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
 
   <div class="col-md-2">
    <div class="form-group"> 
        <label for="product_name" class="col-sm-12 control-label">Product Code <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="product_code" class="form-control text-center" value="{{old('product_code')}}" id="product_code" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
            @error('product_code')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
 
      <div class="col-md-2">
    <div class="form-group"> 
        <label for="product_name" class="col-sm-12 control-label">Product Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <select  name="product_id" class="form-control select2bs4" id="product_id">
          <option value="">Select Product Name</option>
              
            </select>
            @error('product_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

            <div class="col-md-2">
    <div class="form-group"> 
        <label for="stock_quantity" class="col-sm-12 control-label">Stock Quanitty <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="stock_quantity" class="form-control text-center" value="{{old('stock_quantity')}}" id="stock_quantity" ata-validation="requierd" readonly  style="background-color:   #32e5c7  " >
            @error('stock_quantity')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
        <div class="col-sm-12">
            <a style="font-size: 14px;font-weight: bold;margin: 0;width: 150px"class="btn btn-danger btn-block pull-right"><i  style="font-size: 30px;color: white" class="fa fa-plus-circle addeventmore"> <strong style="color: white;font-size: 16px;margin: 0">Add More</strong></i></a>
        </div></i>
      
         </div>
</div>

<!-- Strat Card Body 2 -->

<div class="card-body"> 
  <form method="POST" action="{{route('invoices.store')}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
    @csrf
    <table class="table table-bordered table-sm" width="100%">
      <thead>
        <tr>
          <th width="15%">Category</th>
          <th width="20%">Product Name</th>
          <th width="10%">Quantity</th>
          <th width="13%">Unit Price</th>
          <th width="15%">SubTotal</th>
          <th width="8%">Action</th>
        </tr>
      </thead>
      <tbody id="addrow" class="addrow">
        
      </tbody>
      <tbody>
        <tr>
          <td colspan="4">Discount</td>
          <td class="text-right"><input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm discount_amount text-right" placeholder="Enter Discount Amount"></td>
        </tr>
        <tr>
          <td colspan="2"></td>
         
          <td></td>
          <td></td>
           <td>
            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly="" style="background-color: #D8FDBA">
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
<br>
 <!-- <div class="form-row">
    <div class="form-group col-md-12">
      <textarea class="form-control" name="description" id="description" placeholder="Write Here Your Description"></textarea>
    </div>
  </div>-->

  <div class="form-row">
    <div class="form-group col-md-3">
      <select class="form-control form-control-sm select2bs4" name="paid_status" id="paid_status">
        <option value="">Select Paid Status</option>
        <option value="full_paid">Full Paid</option>
        <option value="full_due">Full Due</option>
        <option value="some_paid">Some Paid</option>
      </select>
      <input type="text" name="paid_amount" class="form-control form-control-sm  paid_amount" id="paid_amount" placeholder="Enter Paid Amount" style="display: none">
    </div>

     <div class="form-group col-md-9">
      <select class="form-control form-control-sm select2bs4" name="customer_id" id="customer_id">
        <option value="">Select Customer</option>
        @foreach($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->id }}--- {{ $customer->name }} ---{{ $customer->mobile }}--- {{ $customer->address }}</option>
        @endforeach
        <option value="0">New Customer</option>
      </select>
    </div>
  </div>

  <div class="form-row new_customer" style="display: none">

     <div class="form-group col-sm-3">
      <input type="text" name="shop_name" id="shop_name" class="form-control form-control-sm" placeholder="Enter Shop Name">
    </div>

     <div class="form-group col-sm-3">
      <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Customer Name">
    </div>
    
     <div class="form-group col-sm-3">
        <input type="text" name="mobile" id="mobile" class="form-control form-control-sm" placeholder="Enter Mobile">
    </div>
    <div class="form-group col-sm-3">
      <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Enter Address">
    </div>
  </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-success btn-block pull-right" id="storebutton">Sales Customer</button>
        </div>
         </div>
      </form>
   </div>

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
<!-- store -->

<script type="text/x-handlebars-template" id="document-template">
<tr class="delete_add-more_item" id="delete_add-more_item">
    <input type="hidden" name="invoice_date" value="@{{invoice_date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    <input type="hidden" name="product_code[]" value="@{{product_code}}">
    <input type="hidden" name="sub_category_id[]" value="@{{sub_category_id}}">
    <input type="hidden" name="sub_sub_category_id[]" value="@{{sub_sub_category_id}}">
    <input type="hidden" name="brand_id[]" value="@{{brand_id}}">
    <input type="hidden" name="unit_id[]" value="@{{unit_id}}">
    <input type="hidden" name="size[]" value="@{{size}}">
    <input type="hidden" name="color[]" value="@{{color}}">
    <input type="hidden" name="model[]" value="@{{model}}">
    <input type="hidden" name="warranty_time[]" value="@{{warranty_time}}">

    <td>
         <input  type="hidden" name="category_id[]" value="@{{category_id}}">
         @{{item_name}}
      </td>
     <td>
         <input type="hidden" name="product_id[]" value="@{{product_id}}">
         @{{product_name}}

    </td>
  
    <td>
         <input type="number" min="1" name="selling_quantity[]" value="1" class="form-control form-control-sm text-center selling_quantity">
    </td>
     <td>
         <input type="text"  name="unit_price[]"  class="form-control form-control-sm text-center unit_price">
    </td>
     
     
     <td>
         <input type="text" name="selling_price[]" value="0.00" class="form-control form-control-sm text-right selling_price">
    </td>
     <td class="float-center">
         <i class="btn btn-danger  btn-sm fa fa-window-close removeeventmore"></i>
    </td>
  </tr>
</script>
<!-- add purchase -->
<script type="text/javascript">
  $(document).ready(function () {
  $(document).on("click",".addeventmore", function (){
    var invoice_date = $('#invoice_date').val();
    var invoice_no = $('#invoice_no').val();
    var product_code = $('#product_code').val();
    var category_id = $('#category_id').val();
    var item_name = $('#category_id').find('option:selected').text();
    var product_id = $('#product_id').val();
    var product_name = $('#product_id').find('option:selected').text();
    var brand_id = $('#brand_id').val();
    var sub_category_id = $('#sub_category_id').val();
    var sub_sub_category_id = $('#sub_sub_category_id').val();
    var unit_id = $('#unit_id').val();
    var model = $('#model').val();
    var size = $('#size').val();
    var color = $('#color').val();
    var warranty_time = $('#warranty_time').val();



    $('.notifyjs-corner').html('');

    if(invoice_date == ''){
      $.notify("Invoice Date Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
     if(invoice_no == ''){
      $.notify("Invoice No Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
 
     if(category_id == ''){
      $.notify("Invoice Date Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
     if(product_id == ''){
      $.notify("Product_Name Required",{globalPosition:'top right}',className:'error'});
      return false;
    }

     if(unit_id == ''){
      $.notify("Unit Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
     
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var data = {
        invoice_date:invoice_date,
        invoice_no:invoice_no,
        product_code:product_code,
        category_id:category_id,
        item_name:item_name,
        product_id:product_id,
        product_name:product_name,
        brand_id:brand_id,
        sub_category_id:sub_category_id,
        sub_sub_category_id:sub_sub_category_id,
        unit_id:unit_id,
        model:model,
        size:size,
        color:color,
        warranty_time:warranty_time
      };
      var html = template(data);
      $('#addrow').append(html);
      

  });
  $(document).on("click",".removeeventmore",function(event){
    $(this).closest(".delete_add-more_item").remove();
    totalAmountPrice();
  });
  $(document).on('keyup click','.unit_price,.selling_quantity',function(){
    var unit_price = $(this).closest("tr").find("input.unit_price").val();
    var qty = $(this).closest("tr").find("input.selling_quantity").val();
    var total = unit_price * qty;
    $(this).closest("tr").find("input.selling_price").val(total);
    $('#discount_amount').trigger('keyup');
  });

  $(document).on('keyup','#discount_amount',function(){
    totalAmountPrice();
  });
    function totalAmountPrice(){
      var sum =0;
      $(".selling_price").each(function(){
        var value = $(this).val();
        if(!isNaN(value) && value.length != 0){
          sum += parseFloat(value);
        }
      });
      var discount_amount = parseFloat($('#discount_amount').val());
      if(!isNaN(discount_amount) && discount_amount.length != 0){
        sum -= parseFloat(discount_amount);
      }
      $('#estimated_amount').val(sum);
    }
});
</script>
  <!-- dropdown category -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#supplier_id',function(){
      var supplier_id =$('#supplier_id').val();

      $.ajax({
        url:"{{route('get-category')}}",
        type:"GET",
        data:{supplier_id:supplier_id},
        success:function(data){
          var html = '<option value="">Select Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.category_id+'">'+v.category.item_name+'</option>';
          });
          $('#category_id').html(html);
        }

      });
    });
  });
</script>

 <!-- dropdown sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-subcategory')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_category_id+'">'+v.subcategory.item_name+'</option>';
          });
          $('#sub_category_id').html(html);
        }

      });
    });
  });
</script>

 <!-- dropdown sub sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_category_id',function(){
      var sub_category_id =$('#sub_category_id').val();

      $.ajax({
        url:"{{route('get-subsubcategory')}}",
        type:"GET",
        data:{sub_category_id:sub_category_id},
        success:function(data){
          var html = '<option value="">Select Sub Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_sub_category_id+'">'+v.subsubcategory.item_name+'</option>';
          });
          $('#sub_sub_category_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown brand -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_sub_category_id',function(){
      var sub_sub_category_id =$('#sub_sub_category_id').val();

      $.ajax({
        url:"{{route('get-brand')}}",
        type:"GET",
        data:{sub_sub_category_id:sub_sub_category_id},
        success:function(data){
          var html = '<option value="">Select Brand</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.brand_id+'">'+v.brand.item_name+'</option>';
          });
          $('#brand_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#brand_id',function(){
      var brand_id =$('#brand_id').val();

      $.ajax({
        url:"{{route('get-productname')}}",
        type:"GET",
        data:{brand_id:brand_id},
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

<!-- dropdown unit -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-unit')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#unit_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown model -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-model')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#model').val(data);
        }

      });
    });
  });
</script>
<!-- dropdown size -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-size')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
          $('#size').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown color -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-color')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#color').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown product code -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-product-code')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#product_code').val(data);
        
        }

      });
    });
  });
</script>


<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-warranty-time')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#warranty_time').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-stock')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#stock_quantity').val(data);
        }

      });
    });
  });
</script>

<!-- End dropdown  -->

<!-- paid status  -->
<script type="text/javascript">
  $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'some_paid'){
      $('.paid_amount').show();
    }else{
       $('.paid_amount').hide();
    }
  });
</script>
<!-- customer  -->
<script type="text/javascript">
  $(document).on('change','#customer_id', function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_customer').show();
    }else{
       $('.new_customer').hide();
    }
  });
</script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      selling_quantity: {
      required: true,
        
      },

      category_id: {
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

       paid_status: {
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

 <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection
