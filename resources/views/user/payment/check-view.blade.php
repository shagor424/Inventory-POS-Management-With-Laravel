<!DOCTYPE html> 
<html>
<head>
    <title>Payment Method</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body> 
<div class="container" style="margin-top: 75px">
  <div class="row justify-content-center" style="margin-right: 10px;margin-left: 10px">
    <div class="col-md-8" style="height: 60px;background-color:   #6e243d  ;font-size: 35px;font-weight: bold;text-align: center;color: white">
      SSB Freelancer Club
    </div>
  </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
  
 
                <div class="card-header" style="font-size: 25px;background-color:   #aacc21  ;font-weight: bold;color: black"> <a style="color: red" href="{{route('login')}}"> <i class="fa fa-home"> </i></a> Payment Check
                    <a class="btn btn-warning float-right" href="{{route('login')}}">Login</a>
                     <a class="btn btn-danger float-right" href="{{route('posts.admissionside')}}">Admission Home</a>
                </div>
                <div class="card-body">

                   @if(Session::get('success'))
                        <div style="text-align: center;" class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  
  <strong>{{session::get('success')}}</strong> 
  
</div> 
@endif

 @if(Session::get('error'))
                        <div style="text-align: center;" class="alert alert-danger  alert-dismissible">
  <button type="button" class="close" class="text-center" data-dismiss="alert">&times;</button>
  
  <strong>{{session::get('error')}}</strong> 
  
</div> 
@endif

 


                    <form method="POST" action="{{ route('paymentss.paymentcheck') }}" id="myform">
                        @csrf

                     
                           <div class="form-group row">
                            <label for="st_mobile" class="col-md-4 col-form-label text-md-right">Student Mobile<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="st_mobile" name="st_mobile" type="text" class="form-control @error('st_mobile') is-invalid @enderror" st_mobile="st_mobile" value="{{ old('st_mobile') }}"placeholder="Enter Student Mobile" >

                                @error('st_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="tid" class="col-md-4 col-form-label text-md-right">Transcation ID<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="st_id" name="tid" type="text" class="form-control @error('tid') is-invalid @enderror" st_id="st_id" value="{{ old('tid') }}"placeholder="Enter TnxID " >

                                @error('tid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Payment Check
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

               <div class="card-footer text-muted text-center"style="background-color:   #aacc21  ;color: black">
    Copyright 2020.&nbsp;&nbsp; All Rights Reserved<br>
 Powered by SSB Freelancer Club
  
  </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function () {
  
  $('#myform').validate({
    rules: {

      dob: {
      required: true,
        
      },
      edu: {
      required: true,
        
      },
      name: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      st_id: {
        required: true,
        
      },
       
      address: {
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
      password_confirmation: {
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

      password_confirmation: {
        
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>

  
 <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="jrPyqTl9"></script>
  </script>


</body>
</html>
