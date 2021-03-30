@extends('backend.layouts.master')
@section('content')  
<style type="text/css">
  .btn-primary:hover{
   background: green;
   border-radius: 25px;
   color: #fff;
  }
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Supplier</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
<section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div style="background:  #FFC300 " class="card-header">
                <h5>Add Supplier
                 
                </h5>
              </div> 
            <div style="background:  #DAF7A6 " class="card-body">
                
              <form method="post" action="{{route('suppliers.store')}}" id="myform">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                  </div>

                 

                  <div class="form-group col-md-2">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number">
                  </div>

                   <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    <font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address ">
                  </div>



                 <div class="form-group col-md-2" style="padding-top: 31px">
                    
                <input type="submit" value=" Add Supplier" name="submit" class="btn btn-primary float-center" >
                  </div>
                </div> 
              </form>

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
            
            <div  class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($suppliers as $key => $supplier)
            <tr style="background-color:  #bfc9ca  ;border: 2px">
                      <td>{{$key+1}}</td>
                      <td>{{$supplier->id}}</td>
                      <td>{{$supplier->name}}</td>
                      <td>{{$supplier->email}}</td>
                      <td>{{$supplier->mobile}}</td>
                      <td>{{$supplier->address}}</td>
                      <td><img style="width: 50px;height: 60px" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($supplier->image))?url('upload/userimage/'.$supplier->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture"></td>
                       @php
                       $count_supplier = App\Model\Product::where('supplier_id',$supplier->id)->count();
                       @endphp
                      <td>
                    <a title="Edit" href="{{route('suppliers.edit',$supplier->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    @if($count_supplier<1)
                    <a title="Delete" id="delete" href="{{route('suppliers.delete',$supplier->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    @endif
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
  <script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      name: {
      required: true,
        
      },

      address: {
      required: true,
        
      },
      mobile: {
        required: true,
        
      },
     
      brand_id: {
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
 image: {
        required: true,
        
      },
      thumbail: {
        required: true,
        
      },
      short_des: {
        required: true,
        
      },
       
      long_des: {
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