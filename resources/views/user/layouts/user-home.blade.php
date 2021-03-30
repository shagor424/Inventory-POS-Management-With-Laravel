@extends('user.layouts.master')
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
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          <section class="col-md-6 offset-md-3">
           
           <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('upload/userimage/'.$user->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture" style="height: 100px;width: 100px">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

               <h4 class="text-muted text-center" style="font-color: red"><td>{{$user['role']['role_name']}}</td></h4>

               <table width="100%" class="table table-bordered">
                 <tbody>
                   <tr>
                    <td>Student ID</td>
                      <td>{{$user->code}}</td>
                   </tr>

                   <tr>
                    <td>Name</td>
                      <td>{{$user->name}}</td>
                   </tr>
                   <tr>
                    <td>Email</td>
                      <td>{{$user->email}}</td>
                   </tr>
                   <tr>
                    <td>Mobile</td>
                      <td>{{$user->mobile}}</td>
                   </tr>
                   <tr>
                    <td>Address</td>
                      <td>{{$user->address}}</td>
                   </tr>
                   <tr>
                    <td>Gender</td>
                      <td>{{$user->gender}}</td>
                   </tr>
                   <tr>
                    <td>Date Of Birth</td>
                      <td>{{$user->dob}}</td>
                   </tr>
                   <td>Educational Qualification</td>
                      <td>{{$user->edu}}</td>
                   </tr>
                 </tbody>
               </table>

                <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
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