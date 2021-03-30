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
              <li class="breadcrumb-item active">Add Item</li>
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
            <h4>Item List
              <a class="btn btn-warning btn-sm pull-right" onclick="create()">Add New</a>
                </h4>
            </div>
                    <div class="card-body">
            <!--data listing table-->
             <table id="example1" class="table table-bordered table-hover table-sm">
                <thead>
                <tr style="background-color: #641e16;color: white">
                    <td>ID</td>
                    <td>Item Name</td>
                    <td>Item Price</td>
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
                 <span id="adi" style="color: white;font-size: 25px">Add Item</span>
                 <span id="upi" style="color: white;font-size: 25px">Update Item</span>
                 </div>
                     <div class="card-body">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        @endif

                       
                            

                     <div class="form-group">
                  <label class="form-control-label">Item Name <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="item_name" id="item_name"  placeholder="Enter Item Name">
                  <span class="text-danger" id="nameerror"></span>
                  
                  </div>

                   <div class="form-group">
                  <label class="form-control-label">Item Price <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="item_price" id="item_price"  placeholder="Enter Item Price">
                 <span class="text-danger" id="priceerror"></span>
                  </div>
                  <input type="hidden" name="id" id="id">
                <div class="form-layout-footer">
                    <button type="submit" id="addi" name="submit" onclick="adddata()" class="btn btn-primary"><strong>Add Item</strong> </button>
                     <button type="submit" id="updi" name="submit" class="btn btn-primary" onclick="updatedata()"><strong>Update Item</strong> </button>

                  </div>
                        
                     </div>
                </div>

                </div>
            </div>
    </div>
<!-- 2nd modal -->
<div class="modal fade" id="showmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                     <table class="table table-bordered table-hover table-sm">
                <tbody>
                  @foreach($items as $item)
                <tr>
                    <th>Item ID</th>
                    <td>{{$item->id}}</td>
                </tr>
                <tr>    
                    <th>Item Name</th>
                    <td>{{$item->item_name}}</td>
                </tr>
                <tr>
                    <th>Item Price</th>
                    <td>{{$item->item_}}</td>
                </tr>
                @endforeach
                </tbody>
              </div>
            </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
<!-- 2nd modal end-->

    <!-- modal -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Item Name</label>
                        <input class="form-control input-sm" type="text" name="item_name">
                    </div>
                    <div class="form-group">
                        <label>Item Price</label>
                        <input class="form-control input-sm" type="text" name="item_price">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary btnSave"
                            onClick="store()">Add Item
                    </button>
                    <button type="button" class="btn btn-primary btnUpdate"
                            onClick="update()">Update Item
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
function getData() {
           $.ajax({
            type: "GET",
            dataType: 'json',
        url: "contacts/data",
     success: function(data){ 
      var row = ""
      $.each(data, function(key, value) {
                        row = row + '<tr>'
                        row = row + '<td>' + value.id + '</td>'
                        row = row + '<td>' + value.item_name + '</td>'
                        row = row + '<td>' + value.item_price + '</td>'
                        row = row + '<td>'
                        row = row + "<button type='button' class='btn btn-sm btn-primary mr-2'onclick=showdata("+value.id+")>Show</button>"
                        row = row + "<button type='button' class='btn btn-sm btn-success mr-2' onclick=editdata("+value.id+") >Edit</button>"
                        row = row + "<button type='button' class='btn btn-sm btn-danger mr-2' onclick=deletedata("+value.id+") >Delete</button>"
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
            $('#item_price').val('');
            $('#nameerror').text('');
            $('#priceerror').text('');
        }
//=================add data===========

        function adddata() {
            var item_name = $('#item_name').val();
            var item_price = $('#item_price').val();

             $.ajax({
                 type:"POST",
                 dataType:'json',
                 data: {item_name:item_name,item_price:item_price},
                 url: "{{route('items.store')}}",
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
                  $('#priceerror').text(error.responseJSON.errors.item_price);
                  consol.log(error.responseJSON.errors.item_name);
                  consol.log(error.responseJSON.errors.item_price);
                }

            })
        } 

        //============editdata==============
        function editdata(id){
          $.ajax({
            type:"GET",
            dataType:"json",
            url:"contacts/edit/"+id,
            success: function(data){
              $('#adi').hide();
              $('#upi').show();
              $('#addi').hide();
              $('#updi').show();
            $('#id').val(data.id);
            $('#item_name').val(data.item_name);
            $('#item_price').val(data.item_price);
              consol.log(data);
            }


          }) 
        }

         //============updatedata==============
          function updatedata(){
           var id =  $('#id').val();
           var item_name = $('#item_name').val();
           var item_price = $('#item_price').val();

            $.ajax({
              type:"POST",
              dataType:'json',
              data: {item_name:item_name,item_price:item_price},
              url: "contacts/update/"+id,
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
                  $('#priceerror').text(error.responseJSON.errors.item_price);
                  consol.log(error.responseJSON.errors.item_name);
                  consol.log(error.responseJSON.errors.item_price);
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
              url: "contacts/delete/"+id,
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
function create() {
            _showmodal.find('.modal-title').text('Show Item');
            reset();
            _showmodal.modal('show')
            
        }


</script>
    
  <!-- /.content-wrapper -->
  @endsection