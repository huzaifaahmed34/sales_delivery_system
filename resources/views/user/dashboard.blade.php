@extends('admin/header')
 

@section('content')

<style type="text/css">
  .navbar,.content-wrapper{
    margin-left:0px!important;
  }
@media print {
  * {
    color: black;
  }
  #example3,#example4{
   margin-top: 30px
  }
  h1{  
    text-align: center;
    margin-bottom: 20px;

  }
</style>
  <head>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content pt-2">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
  <hr>
  <div class="row">

<div class="col-lg-6 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>Order Report</u>
  </h5>
</div>
    <div class="col-lg-5 text-right" >
    <button id="printorder" class="printorder btn btn-danger btn-md">Print</button> 
         <button id="export" class="export btn btn-success btn-md">Export</button> 
  </div>
</div>

  <div class="row">
    <div class="col-lg-5">
    <div class="form-group">
                   <label>From Date</label>

              <input type="date" class="form-control" id="from_date" name=from_date value="{{date('Y-m-d')}}">

                </div>
              </div>
               <div class="col-lg-5">
                  <div class="form-group">
                   <label>To Date</label>

              <input type="date" class="form-control" id="to_date" name=to_date value="{{date('Y-m-d')}}" >

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-info btn_search" id="btn_search" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive-sm" >
                <table id="example3" style="overflow:hidden" class="table table-sm table-bordered table-striped ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th><b>Sno</b></th>
                 <th>Order #</th>
                       <th class="px-2">Customer</th>
                        <th  class="px-2">Product</th>
                         <th>Type</th>
                         <th>Qty</th>
                           <th class="px-2">Created At</th>
                           <th class="px-2">Date Received</th>
                           
                                    <th >Status</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>

<div class="col-lg-6">
 <div class="row">
    <div class="col-lg-7 text-right">
  <h5><u>Dispatch Report</u>
  </h5>
</div>
    <div class="col-lg-5 text-right" >
    <button id="printorder1" class="printorder btn btn-danger btn-md">Print</button> 
     <button id="export1" class="export1 btn btn-success btn-md">Export</button> 
  </div>
</div>

  <div class="row">
    <div class="col-lg-5">
    <div class="form-group">
                   <label>From Date</label>

              <input type="date" class="form-control" id="from_dae" name=from_dae  value="{{date('Y-m-d')}}"  >

                </div>
              </div>
               <div class="col-lg-5">
                  <div class="form-group">
                   <label>To Date</label>

              <input type="date" class="form-control" id="to_dae" name=to_dae value="{{date('Y-m-d')}}" >

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-info btn_search1" id="btn_search1" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive-sm" >
                <table id="example4" style="overflow:hidden" class="table table-sm table-bordered table-striped ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th>Sno</th>
                 <th>Odr #</th>
                  <th>Dly #</th>
                       <th >Customer</th>
                        <th >Product</th>
                         <th>Type</th>
                         <th>Order Qty</th>
                           <th>Dispatch Qty</th>
                           
                                    <th class="px-3">Dispatch Date</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata1>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
  </div>
</div>
  
        <!-- /.row -->
      </div>
        <!-- Main row -->
    
              <!-- /.card-header -->
            
              <!-- /.card-body -->
           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>

  $(function(){
 document.getElementById('btn_search').click();
  document.getElementById('btn_search1').click();
    show_data();
       
function show_data(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowOrders')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';

 for ( i=0; i <res.length; i++) {


 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td>'+res[i].oid+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
                     '<td>'+res[i].created_at.substring(0,10)+'</td>'+
             '<td>'+res[i].date_received+'</td>'+
          
                 
                '<td >'+res[i].status+'</td>'+
                   
                      
                      '</tr>';
                
         
           sno++;
        
};
 $('#showdata').html(html);

        },
        });



      }

      
 

$('.btn_search').click(function(){
 
 
var from_dae=$('input[name=from_date]').val();
var to_dae=$('input[name=to_date]').val();
 
 $.ajax({
     type:'ajax',
      method:'get',
      data:{'from_dae':from_dae,'to_dae':to_dae},
 
      url:'<?php echo url('admin/ShowOrderReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
      if(res.length!=0){

$('#example3').DataTable().destroy();
 for ( i=0; i <res.length; i++) {

 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td>'+res[i].oid+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
             '<td>'+res[i].created_at.substring(0,10)+'</td>'+

             '<td>'+res[i].date_received+'</td>'+
          
                 
                '<td >'+res[i].status+'</td>'+
                   
                      
                      '</tr>';
                
         
           sno++;
        
};
 $('#showdata').html(html);

$('#example3').DataTable().draw();
}
else
{
  html='<tr><td colspan=9>No Data Found</td></tr>';
   $('#showdata').html(html);
  
}


        },
        });

})













 show_data1();
function show_data1(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowDispatchOrders')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
      if(res.length!=0){
 for ( i=0; i <res.length; i++) {


 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td>'+res[i].id+'</td>'+
            '<td>'+res[i].did+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
             '<td>'+res[i].dispatch_qty+'</td>'+
          
                 
                '<td >'+res[i].dispatch_date+'</td>'+
                   
                      
                      '</tr>';
                
         
           sno++;
        
};
}else
{
  html='<tr><td colspan=9>No Data Found</td></tr>';
   $('#showdata1').html(html);
  
}

 $('#showdata1').html(html);

        },
        });



      }
      $('#printorder').click(function(){
        
        $("#example3").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>Order Report</u></h1><h5>From Date : '+$('input[name=from_date').val()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Date: ' +$('input[name=to_date').val()+'</h5>'
  }
);
      })
       $('#printorder1').click(function(){
        
        $("#example4").print({
    addGlobalStyles : true,
    stylesheet : null,
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>Dispatch Report</u></h1><h5>From Date : '+$('input[name=to_dae').val()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Date : '+$('input[name=to_dae').val()+'</h5>'
  }
);
      })


$('.btn_search1').click(function(){
var from_dae=$('input[name=from_dae]').val();
var to_dae=$('input[name=to_dae]').val();
 
 $.ajax({
      type:'ajax',
      method:'get',
      data:{'from_dae':from_dae,'to_dae':to_dae},
 
      url:'<?php echo url('admin/ShowDispatchOrdersByDate')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      
      var i;
      var sno=1;
      var html='';
      $('#example4').DataTable().destroy();
 for ( i=0; i <res.length; i++) {


 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td>'+res[i].id+'</td>'+
            
 '<td>'+res[i].did+'</td>'+
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
                   '<td>'+res[i].dispatch_qty+'</td>'+
          
                 
                '<td >'+res[i].dispatch_date+'</td>'+
                      
                      '</tr>';
                
         
           sno++;
        
};
 $('#showdata1').html(html);
$('#example4').DataTable().draw();
        },
        });

})




$(".export").click(function(){
 $('#example3').DataTable().destroy();
  $("#example3").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:" Order Report",

    filename:" Order Report",//do not include extension

    fileext:".csv" // file extension

  });
 $('#example3').DataTable().draw();
});


$(".export1").click(function(){
 $('#example4').DataTable().destroy();
  $("#example4").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:"Dispatch Report",

    filename:"Dispatch Report",//do not include extension

    fileext:".csv" // file extension

  });
 $('#example4').DataTable().draw();
});





});
</script>





     @endsection('content')
 

@extends('admin/footer')