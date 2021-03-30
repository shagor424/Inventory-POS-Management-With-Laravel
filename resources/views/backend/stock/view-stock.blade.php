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
              <li class="breadcrumb-item active">View Product</li>
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
          <section class="col-md-12">
           
           <div class="card">
              <div class="card-header" style="background-color:   #f1c40f  ">
                <h5>  Product Stock List
                  <a target="_blank" href="{{route('stocks.stock-report-pdf')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-download"> Stock Report PDF</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Product ID</th>
                    <th>Supplier Name</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Unit</th>
                    <th>In Stock</th>
                    <th>Out Stock</th>
                    <th>Current Stock</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $product)
                    @php
                    $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buy_quantity');
                   
                    $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_quantity');
                    @endphp
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$product->id}}</td>
                <td>{{$product['supplier']['name']}}</td>
                <td>{{$product['category']['item_name']}}</td>
                <td>{{$product->product_name}}</td>
                 <td style="text-align: center;">{{$product->product_code}}</td>
                <td>{{$product['unit']['item_name']}}</td>
                <td style="text-align: center;">{{$buying_total}}</td>
                <td style="text-align: center;">{{$selling_total}}</td>
                <td style="text-align: center;">{{$product->quantity}}</td>
                
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
   <!-- modal -->


    
  @endsection