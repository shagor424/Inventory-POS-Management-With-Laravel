 @php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
 @endphp


 <!-- Sidebar Menu -->
      <nav style="" class="mt-2">
        <ul style="" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      
          <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link {{($route=='users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p> 
                </a>
              </li>
            </ul>
          </li> 
          <!-- Roles -->

          <!-- Profile -->
          <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.view')}}" class="nav-link {{($route=='profiles.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p> 
                </a>
              </li>
            </ul>
          </li> 

          <!-- Suppliers -->
          <li class="nav-item has-treeview {{($prefix=='/suppliers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Supplier Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suppliers.view')}}" class="nav-link {{($route=='suppliers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Supplier</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('suppliers.add')}}" class="nav-link {{($route=='suppliers.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier</p> 
                </a>
              </li>
            </ul>
          </li> 

            <!-- Customers -->
          <li class="nav-item has-treeview {{($prefix=='/customers')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Customer Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p> 
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{route('customers.add')}}" class="nav-link {{($route=='customers.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('customers.credit')}}" class="nav-link {{($route=='customers.credit')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit/Due Customer</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customers.paid')}}" class="nav-link {{($route=='customers.paid')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Customer</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customers.wise-report')}}" class="nav-link {{($route=='customers.wise-report')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer Wise Report</p> 
                </a>
              </li>
            </ul>
          </li> 


          <!-- Units -->
          <li class="nav-item has-treeview {{($prefix=='/units')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
               Product Type
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('units.view')}}" class="nav-link {{($route=='units.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Unit</p> 
                </a>
              </li>
            </ul>
          <!---Brand-->
           
   
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.view')}}" class="nav-link {{($route=='categories.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p> 
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subcategories.view')}}" class="nav-link {{($route=='subcategories.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sub Category</p> 
                </a>
              </li>
            </ul>
          
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subsubcategories.view')}}" class="nav-link {{($route=='subsubcategories.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sub Sub Category</p> 
                </a>
              </li>
            </ul>

             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brands.view')}}" class="nav-link {{($route=='brands.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p> 
                </a>
              </li>
            </ul>
          </li> 


      <!-- Product -->
      <li class="nav-item has-treeview {{($prefix=='/products')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Product Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view-product')}}" class="nav-link {{($route=='products.view-product')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p> 
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.add-product')}}" class="nav-link {{($route=='products.add-product')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p> 
                </a>
              </li>
            </ul>
           </li>
      
      <!-- Purchase -->
      <li class="nav-item has-treeview {{($prefix=='/purchases')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Purchase Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchases.view')}}" class="nav-link {{($route=='purchases.vie')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('purchases.add')}}" class="nav-link {{($route=='purchases.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Purchase</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('purchases.pending-list')}}" class="nav-link {{($route=='purchases.pending-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending List</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('purchases.daily-report-view')}}" class="nav-link {{($route=='purchases.daily-report-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Purchase Report</p> 
                </a>
              </li>
            </ul>
           </li>

            <!-- Invoice -->
      <li class="nav-item has-treeview {{($prefix=='/invoices')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Invoice Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoices.view')}}" class="nav-link {{($route=='invoices.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Invoice</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoices.add')}}" class="nav-link {{($route=='invoices.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Invoice</p> 
                </a>
              </li>
               <li class="nav-item">
                <a href="{{route('invoices.pending-list')}}" class="nav-link {{($route=='invoices.pending-list')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending List</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoices.daily-report-view')}}" class="nav-link {{($route=='invoices.daily-report-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Invoice Report</p> 
                </a>
              </li>
            </ul>
           </li>


            <!-- Stock -->
      <li class="nav-item has-treeview {{($prefix=='/stocks')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stock Manage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stocks.view')}}" class="nav-link {{($route=='stocks.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product By Stock View</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('stocks.supplier-stock-view')}}" class="nav-link {{($route=='stocks.supplier-stock-view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier By Stock View</p> 
                </a>
              </li>
            </ul>
           </li>
      
      <!-- Order Catagory -->
      <li class="nav-item has-treeview {{($prefix=='/items')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Oreder Item
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('items.view')}}" class="nav-link {{($route=='items.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Item</p> 
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('items.index')}}" class="nav-link {{($route=='items.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Item 2</p> 
                </a>
              </li>
            </ul>
           </li>

      
      
        