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

        <div class="col-md-12">
          <div class="card">
              <div class="card-header" style="background-color: skyblue">
            <h3>Item List
              <a style="font-weight: bold;font-size: 20px;color: black" class="btn btn-warning btn-sm pull-right" onclick="create()">Add New</a>
                </h3>
                
            
</div>
 <div class="card-body">
            <!--data listing table-->
             <table id="example1" class="table table-bordered table-hover table-sm">
                <thead>
                <tr style="background-color: #641e16;color: white">
                    <td>ID</td>
                    <td>Item Name</td>
                    <td>Item Price</td>
                    <td style="width: 15%;text-align: center;">Action</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
</div>
<div class="card-footer bg-success">
     <h5>Item List
              <a style="font-weight: bold;font-size: 16px;color: black" class="btn btn-warning btn-sm pull-right" onclick="create()">Add New</a>
                </h5>
</div>
            <!--data listing table-->
          </div>
        </div>

    </div>
<!--Laravel modal Start
     <div class="modal fade" id="showmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title "></h4>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover table-sm">
                <tbody>
                <tr>
                    <th>Item ID</th>
                    <td></td>
                </tr>
                <tr>    
                    <th>Item Name</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Item Price</th>
                    <td></td>
                </tr>

                </tbody>
              </div>
            </table>
                <div class="modal-footer bg-warning">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            
        </div>
    </div> -->
<!--Laravel modal end-->
    <!-- modal -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title "></h4>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row"> 

                    <div class="form-group col-sm-4 ">
                        <label>Item Name</label>
                    </div>
                    <div class="col-sm-8"> 
                        <input class="form-control input-sm" type="text" name="item_name" id="item_name">
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Item Price</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control input-sm" type="text" name="item_price" id="item_price">
                    </div>
                   </div>
                </div>
                <div class="modal-footer bg-warning">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary btnSave"
                            onClick="store()">Save
                    </button>
                    <button type="button" class="btn btn-primary btnUpdate"
                            onClick="update()">Update
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </section>
</div>


    <script>
        var adminUrl = '{{url('admin')}}';
        var _modal = $('#modal');
        var btnSave = $('.btnSave');
        var btnUpdate = $('.btnUpdate');
        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
         function getData() {
           $.ajax({
            type: "GET",
            dataType: 'json',
        url: adminUrl + '/contacts/data',
     success: function(data){ 
      var row = ""
      $.each(data, function(key, value) {
                        row = row + '<tr>'
                        row = row + '<td>' + value.id + '</td>'
                        row = row + '<td>' + value.item_name + '</td>'
                        row = row + '<td>' + value.item_price + '</td>'
                        row = row + '<td>'
                        row = row + '<button type="button" class="btn btn-sm btn-success mr-2 btnEdit" title="Edit Record" >Edit</button>'
                        row = row + '<button type="button" class="btn btn-sm btn-danger btnDelete" data-id="' + value.id + '" title="Delete Record">Delete</button>'
                        row + row +  '</td>'
                         row = row + '</tr>'
                    })

                    $('tbody').html(row)
                }
                })
        }
        getData();

        function reset() {
            _modal.find('input').each(function () {
                $(this).val(null)
            })
        }
        function getInputs() {
            var id = $('input[name="id"]').val()
            var item_name = $('input[name="item_name"]').val()
            var item_price = $('input[name="item_price"]').val()
            return {id: id, item_name: item_name, item_price: item_price}
        }
        function create() {
            _modal.find('.modal-title').text('Add Item');
            reset();
            _modal.modal('show')
            btnSave.show()
            btnUpdate.hide()
        }
        function store(){
            $.ajax({
                method: 'POST',
                url: adminUrl + '/contacts/store',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    console.log('inserted')
                    reset()
                    _modal.modal('hide')
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
                }
            })
        }
        $('table').on('click', '.btnEdit', function () {
            _modal.find('.modal-title').text('Edit Item')
            _modal.modal('show')
            btnSave.hide()
            btnUpdate.show()
            var id = $(this).parent().parent().find('td').eq(0).text()
            var item_name = $(this).parent().parent().find('td').eq(1).text()
            var item_price = $(this).parent().parent().find('td').eq(2).text()
            
            $('input[name="id"]').val(id)
            $('input[name="item_name"]').val(item_name)
            $('input[name="item_price"]').val(item_price)
        }) 
        function update(){
            if(!confirm('Are you sure?')) return;
            $.ajax({
                method: 'POST',
                url: adminUrl + '/contacts/update',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    console.log('updated')
                    reset()
                    _modal.modal('hide')
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
              
                }
            })
        }
        $('table').on('click', '.btnDelete', function () {
            if(!confirm('Are you sure?')) return;
            var id = $(this).data('id');
            var data={id:id}
            $.ajax({
                method: 'POST',
                url: adminUrl + '/contacts/delete',
                data:data,
                dataType: 'JSON',
                success: function () {
                    console.log('deleted');
                    getData();
                }
            })
        })
    </script>
  
  <!-- /.content-wrapper -->
  @endsection