

 
 <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach($catagoriess as $catagory)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$catagory->catagory_name}}</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                       @foreach($catagory->sub_catagoryy as $subcatagory)
                      <div class="col-sm-12 col-md-3">
                        <ul class="links list-unstyled">
                          <li><a href="{{url('/catagory/'. $subcatagory->sub_catagory_slug)}}">{{$subcatagory->sub_catagory_name}}</a></li>
                         
                        </ul>
                      </div>
                       @endforeach
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> 
              </li>
              <!-- /.menu-item -->
              
          
              <!-- /.menu-item -->
              @endforeach
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>


      
        <!-- ================================== TOP NAVIGATION : END ================================== -->
     <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Brands</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach($brands as $brand)
              <li > <a href="{{url('/brand/'. $brand->brand_slug)}}"><i class="icon fa fa-shopping-bag"></i>{{$brand->brand_name}}</a>
                
                <!-- /.dropdown-menu --> 
              </li>
              <!-- /.menu-item -->
              
          
              <!-- /.menu-item -->
              @endforeach
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>