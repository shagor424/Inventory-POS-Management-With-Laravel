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
              <li class="breadcrumb-item active">Update Product</li>
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
                <h5 style="color: white">Update Product
                  <a  href="{{route('products.view-product')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Product List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:     #d9dad6   ">
                
            <form method="POST" action="{{route('products.update-product',$editdata->id)}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
    @csrf
   
  
   <div class="row"> 

     <div class="col-md-2">
    <div class="form-group"> 
        <label for="product_name" class="col-sm-12 control-label">Product Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-10">
            <input type="text" name="product_name" class="form-control" value="{{$editdata->product_name}}" id="product_name" placeholder="Product Name" data-validation="requierd">
            @error('product_name')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

      <div class="col-md-2">
   <div class="form-group">
        <label for="category_id" class="col-sm-12 control-label"> Supplier Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-md-4">
          <select  name="supplier_id" class="form-control select2bs4" id="supplier_id">
          <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
              <option value="{{$supplier->id}}" {{ $supplier->id == $editdata->supplier_id ?" selected":""}}>{{$supplier->name}}</option>
              @endforeach 
            </select>
          @error('supplier_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
   
  

   <div class="col-md-2">
   <div class="form-group">
        <label for="unit_id" class="col-sm-12 control-label">Unit Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="unit_id" class="form-control select2bs4" id="unit_id">
                <option value="">Select Unit</option>
                @foreach($units as $unit)
              <option value="{{$unit->id}}" {{ $unit->id == $editdata->unit_id ?" selected":""}}>{{$unit->item_name}}</option>
              @endforeach 
            </select>
            @error('unit_id')
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
              <option value="{{$category->id}}" {{ $category->id == $editdata->category_id ?" selected":""}}>{{$category->item_name}}</option>
              @endforeach 
            </select>
          @error('category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
  

<div class="col-md-2">
    <div class="form-group"> 
        <label for="size" class="col-sm-12 control-label">Size/Weight</label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="size" class="form-control" value="{{$editdata->size}}" id="size" placeholder="Size/Weight" data-validation="requierd">
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
              <option value="{{$subcategory->id}}" {{ $subcategory->id == $editdata->sub_category_id ?" selected":""}}>{{$subcategory->item_name}}</option>
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
            <input type="text" name="color" class="form-control" value="{{$editdata->color}}" id="color" placeholder="Product Color" data-validation="requierd">
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
              <option value="{{$subsubcategory->id}}" {{ $subsubcategory->id == $editdata->sub_sub_category_id ?" selected":""}}>{{$subsubcategory->item_name}}</option>
              @endforeach 
            </select>
            @error('sub_sub_category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

 <div class="col-md-2">
    <div class="form-group"> 
        <label for="quantity" class="col-sm-12 control-label">Product Quantity <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="quantity" class="form-control" value="{{$editdata->quantity}}" id="quantity" placeholder="Quantity" data-validation="requierd">
            @error('quantity')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
   

   <div class="col-md-2">
   <div class="form-group">
        <label for="brand_id" class="col-sm-12 control-label">Brand Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="brand_id" class="form-control select2bs4" id="brand_id">
                <option value="">Select Brand</option>
               @foreach($brands as $brand)
              <option value="{{$brand->id}}" {{ $brand->id == $editdata->brand_id ?" selected":""}}>{{$brand->item_name}}</option>
              @endforeach 
            </select>
            @error('brand_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
 

  <div class="col-md-2">
      <div class="form-group"> 
        <label for="buy_price" class="col-sm-12 control-label">Buying Price <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="buy_price" class="form-control" value="{{$editdata->buy_price}}" id="buy_price" placeholder="Buying Price" data-validation="requierd">
            @error('buy_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
   
    



  <div class="col-md-2">
    <div class="form-group"> 
        <label for="product_code" class="col-sm-12 control-label">Product Code</label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="product_code" class="form-control" value="{{$editdata->product_code}}" id="product_code" placeholder="Product Code" data-validation="requierd">
            @error('product_code')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="col-md-2">
    <div class="form-group"> 
        <label for="sell_price" class="col-sm-12 control-label">Sell Price <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="sell_price" class="form-control" value="{{$editdata->sell_price}}" id="sell_price" placeholder="Sell Price" data-validation="requierd">
            @error('sell_price')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

       <div class="col-md-2">
      <div class="form-group"> 
        <label for="model" class="col-sm-12 control-label">Product Model</label>
      </div>
    </div>
        <div class="col-sm-4">
            <input type="text" name="model" class="form-control" value="{{$editdata->model}}" id="model" placeholder="Product Model" data-validation="requierd">
            @error('model')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    

 <div class="col-md-2">
      <div class="form-group"> 
        <label for="warranty_time" class="col-sm-12 control-label">Warranty Time</label>
      </div>
    </div>
        <div class="col-sm-4">
           <select name="warranty_time" id="warranty_time" class="form-control select2bs4" name="warranty_time" value="{{ old('warranty_time') }}" >
                                    <option value=""> Select Warranty Time</option>
                                    <option value="No"{{($editdata->warranty_time=="No")?"selected":""}}>No</option>
                                    <option value="30 Days"{{($editdata->warranty_time=="30 Days")?"selected":""}}>30 Days</option>
                                    <option value="3 Month"{{($editdata->warranty_time=="3 Month")?"selected":""}}>3 Month</option>
                                      <option value="6 Month"{{($editdata->warranty_time=="6 Month")?"selected":""}}>6 Month</option>
                                    <option value="1 Years"{{($editdata->warranty_time=="1 Years")?"selected":""}}>1 Years</option>
                                     <option value="2 Years"{{($editdata->warranty_time=="2 Years")?"selected":""}}>2 Years</option>
                                    <option value="3 Years"{{($editdata->warranty_time=="3 Years")?"selected":""}}>3 Years</option>
                                  
                                </select>
              @error('warranty_time')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    

</div>



    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-success btn-block pull-right">Update Product</button>
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

    
      quantity: {
      required: true,
        
      },

      category_id: {
      required: true,
        
      },
     
      buy_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      special_price: {
        required: true,
        
      },
      special_start: {
        required: true,
        
      },
      special_end: {
        required: true,
        
      },
       
      product_name: {
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
       
      size: {
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