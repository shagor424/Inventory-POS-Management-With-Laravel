@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Update User</li>
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
                <h5>Update Profile
                  <a  href="{{route('profiles.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-user"> Your Profile</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('profiles.update',$editdata->id)}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                 <!--<div class="form-group col-md-6">
                    <label for="usertype">User Role</label>
                    <select h name="usertype" id="usertype" class="form-control"readonly>
                      <option value="">Select Role</option>
                      <option value="Admin"{{($editdata->usertype=="Admin")?"selected":""}}>Admin</option>
                      <option value="User"{{($editdata->usertype=="User")?"selected":""}}>User</option>
                      <option value="Employer"{{($editdata->usertype=="Employer")?"selected":""}}>Employer</option>
                      <option value="Operator"{{($editdata->usertype=="Operator")?"selected":""}}>Operator</option>
                      <option value="Student"{{($editdata->usertype=="Student")?"selected":""}}>Student</option>
                    </select>
                  </div> -->

                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{$editdata->name}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"value="{{$editdata->email}}">
                    <font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number"value="{{$editdata->mobile}}">
                  </div>

                  

                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"value="{{$editdata->address}}">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="Male"{{($editdata->gender=="Male")?"selected":""}}>Male</option>
                      <option value="Female"{{($editdata->gender=="Female")?"selected":""}}>Female</option>
                      <option value="HSC"{{($editdata->gender=="Others")?"selected":""}}>Others</option>
                    
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="edu">Educational Qualification</label>
                    <select name="edu" id="edu" class="form-control">
                      <option value="">Select Educational Qualification</option>
                      <option value="JSC"{{($editdata->edu=="JSC")?"selected":""}}>JSC</option>
                      <option value="SSC"{{($editdata->edu=="SSC")?"selected":""}}>SSC</option>
                      <option value="HSC"{{($editdata->edu=="HSC")?"selected":""}}>HSC</option>
                      <option value="Degree or Honors"{{($editdata->edu=="Degree or Honors")?"selected":""}}>Degree or Honors</option>
                      <option value="Masters"{{($editdata->edu=="Masters")?"selected":""}}>Masters</option>
                      <option value="Others"{{($editdata->edu=="Others")?"selected":""}}>Others</option>
                    
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="dob">Date Of Birth</label>
                    <input type="text" name="dob" id="datepicker" class="form-control" placeholder="Enter dob"value="{{$editdata->dob}}">
                  </div>

                 

                  <div class="form-group col-md-6">
                    <img id="showimage" src="{{(!empty($editdata->image))?url('upload/userimage/'.$editdata->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                <!--  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Not Applicable"readonly>
                  </div> -->
                    <div class="form-group col-md-12">
                    
                <input type="submit" value=" Update Profile" name="submit" class="btn btn-danger float-right">
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

      usertype: {
      required: true,
        
      },
      name: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      gender: {
        required: true,
        
      },
       
      address: {
      required: true,
        
      },
    datepicker: {
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