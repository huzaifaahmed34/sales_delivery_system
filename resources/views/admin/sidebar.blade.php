
@section('sidebar') 


  <aside class="main-sidebar sidebar-dark-primary elevation-3 text-sm " style="display: none;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-1"
           style="opacity: .8">
      <span class="brand-text font-weight-dark"><span style="color:white;">{{ config('app.name', 'Sales Delivery') }}</span>
    </span></a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
               
              </p>
            </a>

          </li>
        

                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
       Order
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/GenerateOrder')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate Order</p>
                </a>
              </li>
                 
                   <li class="nav-item">
                <a href="{{url('admin/ViewPendingOrder')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Pending Orders</p>
                </a>
              </li>
                   <li class="nav-item">
                <a href="{{url('admin/ViewCompletedOrder')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Completed Orders</p>
                </a>
              </li>
             

               
            </ul>
          </li>

                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
      Cylinder Management
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/AddCylinderSupplier')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Cylinder Supplier</p>
                </a>
              </li>
                 
                   <li class="nav-item">
                <a href="{{url('admin/ViewCylinderSupplier')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Cylinder Supplier</p>
                </a>
              </li>
                   <li class="nav-item">
                <a href="{{url('admin/GenerateCylinderOrder')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate Cylinder Order</p>
                </a>
              </li>   <li class="nav-item">
                <a href="{{url('admin/ViewCylinderOrder')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Cylinder Order</p>
                </a>
              </li>
             

               
            </ul>
          </li>
         
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
       Delivery Challan
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/GenerateDeliveryChallan')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate Delivery Challan</p>
                </a>
              </li>
                   <li class="nav-item">
                <a href="{{url('admin/ViewDeliveryChallan')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Delivery Challan</p>
                </a>
              </li>
 

               
            </ul>
          </li>
         



           <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

      Reports
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

     

               
            </ul>
          </li>





           <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
       Settings
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
       Customers
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/AddCustomers')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customers</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/ViewCustomers')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customers</p>
                </a>
                       </li>

               
            </ul>
          </li>
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
       Product
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/AddProducts')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/ViewProducts')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Products</p>
                </a>
                       </li>
                           <li class="nav-item">
                 <a href="{{url('admin/AddProductType')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product Type</p>
                </a>
                       </li>
                           <li class="nav-item">
                 <a href="{{url('admin/ViewProductType')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product Type</p>
                </a>
                       </li>

               
            </ul>

             <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     
       
       Size List
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/AddSize')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Size List</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/ViewSize')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size List</p>
                </a>
                       </li>

               
            </ul>
          </li>
          </ul>
            </li>
            







        






        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
  </script>
@endsection('sidebar')