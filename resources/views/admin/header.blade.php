
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MAJ SOFT | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->  
  <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/multiple-select-js@latest/dist/css/multiple-select.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/multiple-select-js@latest/dist/js/multiple-select.js"></script>
  <link rel="stylesheet" href="{{asset('public/dist/css/select2.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.css')}}">
   <link rel="stylesheet" href="{{asset('public/dist/css/choices.css')}}">
  <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('public/dist/css/bootstrap-select.min.css')}}"   rel="stylesheet" type="text/css">
  
<!-- Font Awesome -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
 <style type="text/css">
  body{
    font-family: "Raleway", sans-serif;
    font-size: 14px;
    line-height: 1.6;
    color: #636b6f;
    background-color: #f5f8fa;
  }
  .sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .main-footer, .sidebar-mini.sidebar-collapse .main-header {
    margin-left: 0!important;
} .content-wrapper, .main-footer, .main-header {
    transition: margin-left .3s ease-in-out;
    margin-left: 0px;
    z-index: 3000;
}td,p,a,tr,th{
    font-size: 13px!important;
   }
   .nav-pills .nav-link {
    color: rgba(0,0,0,.6);
}
 
 </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">


  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" id="push"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin')}}" class="nav-link">Home</a>
      </li>



<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Product Type</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/AddProductType')}}">Add Product Type</a>
      <a class="dropdown-item" href="{{url('admin/ViewProductType')}}">View  Product Type</a>
 
    </div>
  </li> 



 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Customers</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/AddCustomers')}}">Add Customer</a>
      <a class="dropdown-item" href="{{url('admin/ViewCustomers')}}">View  Customer</a>
     
    </div>
  </li> 

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Products</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/AddProducts')}}">Add Products</a>
      <a class="dropdown-item" href="{{url('admin/ViewProducts')}}">View Products</a>

    </div>
  </li> 
 
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Size List</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/AddSize')}}">Add Size List</a>
      <a class="dropdown-item" href="{{url('admin/ViewSize')}}">View Size List</a>
     
    </div>
  </li> 
   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Orders</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/GenerateOrder')}}">Generate Order</a>
   <!--    <a class="dropdown-item" href="{{url('admin/ViewCompletedOrder')}}">View Completed Order</a> -->
      <a class="dropdown-item" href="{{url('admin/ViewPendingOrder')}}">View Order</a>
    </div>
  </li>
 
 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cylinder Management</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/AddCylinderSupplier')}}">Add Cylinder Supplier</a>
      <a class="dropdown-item" href="{{url('admin/ViewCylinderSupplier')}}">View Cylinder Supplier</a>
    
      <a class="dropdown-item" href="{{url('admin/GenerateCylinderOrder')}}">Generate Cylinder Order</a>
      <a class="dropdown-item" href="{{url('admin/ViewCylinderOrder')}}">View  Cylinder Order</a>
    </div>
  </li>



   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Delivery Challan</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/GenerateDeliveryChallan')}}">Generate Delivery Challan</a>
      <a class="dropdown-item" href="{{url('admin/ViewDeliveryChallan')}}">View Delivery Challan</a>
      
    </div>
  </li> 
 <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Reports</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{url('admin/ViewAdvanceReport')}}">View Advance Report</a>
      <a class="dropdown-item" href="{{url('admin/ViewSimpleReport')}}">View Simple Report</a>
       <a class="dropdown-item" href="{{url('admin/Required_Reports')}}">View Required Report</a>
          <a class="dropdown-item" href="{{url('admin/ViewMachineReport')}}">View Machine Report</a>
             <a class="dropdown-item" href="{{url('admin/ViewStatusReport')}}">View Status Report</a>
     
    </div>
  </li> 

 
    
    </ul>

     <ul class="navbar-nav  push-right ml-auto" >
      <li class="nav-item d-none d-sm-inline-block">

        <a class="nav-link" href="{{ url('/login') }}"

            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
        
      </li>
    </ul>
 
    <!-- Right navbar links -->
   
      <!-- Notifications Dropdown Menu -->
    
  </nav>
  <!-- /.navbar -->
  @yield('sidebar')

  @yield('content')


  @yield('footer')


