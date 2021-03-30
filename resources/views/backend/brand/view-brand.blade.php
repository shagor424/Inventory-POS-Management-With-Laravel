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
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Brand</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container"> 
            <div class="row">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header" style="background-color: green;color: white">
            <h4>Brand List
                </h4>
            </div>
                    <div class="card-body">
            <!--data listing table-->
             <table id="example1" class="table table-bordered table-hover table-sm">
                <thead>
                <tr style="background-color: #641e16;color: white">
                    <td>ID</td>
                    <td>Brand Name</td>
                    <td style="width: 30%">Action</td>
                </tr> 
                </thead>
                <tbody>
                    
                </tbody>
              </div>
            </table>
         
          </div>
      </div>
        </div>
        <!-- Card 1 End -->

        <div class="col-md-4">
          <div class="card">
        <!-- sl-page-title -->

                <div style="background-color: #a72c5d" class="card-header">
                 <span id="adi" style="color: white;font-size: 25px">Add Brand</span>
                 <span id="upi" style="color: white;font-size: 25px">Update Brand</span>
                 </div>
                     <div class="card-body">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        @endif

                       
                            

                     <div class="form-group">
                  <label class="form-control-label">Brand Name <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="item_name" id="item_name"  placeholder="Enter Brand Name">
                  <span class="text-danger" id="nameerror"></span>
                  
                  </div>

                  <input type="hidden" name="id" id="id">
                <div class="form-layout-footer">
                    <button type="submit" id="addi" name="submit" onclick="adddata()" class="btn btn-primary"><strong>Add Brand</strong> </button>
                     <button type="submit" id="updi" name="submit" class="btn btn-primary" onclick="updatedata()"><strong>Update Brand</strong> </button>

                  </div>
                        
                     </div>
                </div>

                </div>
            </div>
    </div>
<!-- 2nd modal -->

    </div>
<!-- 2nd modal end-->

    <!-- modal -->
    <!-- /.modal -->
  </section>
</div>
<script>
    $('#adi').show();
    $('#upi').hide();
    $('#addi').show();
    $('#updi').hide();

     $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
//=================get all data===========
@foreach($brands as $brand)
{{ $brand->id }}
@endforeach

@php
$count_brand = App\Model\Product::where('brand_id',$brand->id)->count();
@endphp

function getData() {
           $.ajax({
            type: "GET",
            dataType: 'json',
        url: "brands/data",
     success: function(data){ 
      var row = ""
      $.each(data, function(key, value) {
                        row = row + '<tr>'
                        row = row + '<td>' + value.id + '</td>'
                        row = row + '<td>' + value.item_name + '</td>'
                        row = row + '<td>'
                        row = row + "<button type='button' class='btn btn-sm btn-success mr-2' onclick=editdata("+value.id+") >Edit</button>"
                        @if($count_brand<1)
                        row = row + "<button type='button' class='btn btn-sm btn-danger mr-2' onclick=deletedata("+value.id+") >Delete</button>"
                        @endif
                        row + row +  '</td>'
                         row = row + '</tr>'
                    })

                    $('tbody').html(row)
                }
                })
        }
        getData();
//=================clear data===========
        function cleardata(){
            $('#item_name').val('');
            $('#item_nameerror').text('');
           
        }
//=================add data===========

       function adddata() {
            var item_name = $('#item_name').val();
            

             $.ajax({
                 type:"POST",
                 dataType:'json',
                 data: {item_name:item_name},
                 url: "{{route('brands.store')}}",
                success: function(data) {
                    cleardata();
                    getData();

                       const Msg =  Swal.mixin({
                            
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        Msg.fire({
                          type:'success',
                          title: 'Data Added Successfully'
                        })

                consol.log('Succesfully Data Added');
                } ,
                error : function(error){
                  $('#nameerror').text(error.responseJSON.errors.item_name);
                  consol.log(error.responseJSON.errors.item_name);
                  
                }

            })
        } 
        //============editdata==============
        function editdata(id){
          $.ajax({
            type:"GET",
            dataType:"json",
            url:"brands/edit/"+id,
            success: function(data){
              $('#adi').hide();
              $('#upi').show();
              $('#addi').hide();
              $('#updi').show();
            $('#id').val(data.id);
            $('#item_name').val(data.item_name);
              consol.log(data);
            }


          }) 
        }

         //============updatedata==============
          function updatedata(){
           var id =  $('#id').val();
           var item_name = $('#item_name').val();

            $.ajax({
              type:"POST",
              dataType:'json',
              data: {item_name:item_name},
              url: "brands/update/"+id,
              success:function(data){
                  $('#adi').show();
                  $('#upi').hide();
                  $('#addi').show();
                  $('#updi').hide();
                    cleardata();
                    getData();
                     const Msg =  Swal.mixin({
                            
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        Msg.fire({
                          type:'success',
                          title: 'Data Updated Successfully'
                        })
                consol.log('data updated')
              },
               error : function(error){
                  $('#nameerror').text(error.responseJSON.errors.item_name);
                 
                  consol.log(error.responseJSON.errors.item_name);
                 
                }
            })
          }

          function deletedata(id){

            Swal.fire({
              title: 'Are you sure?',
              text: "Delete This Data!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            })


            .then((result) => {
              if (result.value) {
               $.ajax({
                type:"GET",
              dataType:'json',
              url: "brands/delete/"+id,
              success:function(data){
                  $('#adi').show();
                  $('#upi').hide();
                  $('#addi').show();
                  $('#updi').hide();
                    cleardata();
                    getData();
                     const Msg =  Swal.mixin({
                            
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        Msg.fire({
                          type:'success',
                          title: 'Data Deleted Successfully'
                        })
              }
               })
              }
            })
     
          }
            $(document).on('click','.show-modal', function(){
              $('#modal').modal('show');
              $('.modal-title').text('Show Post');
            });

</script>
    
  <!-- /.content-wrapper -->
  @endsection