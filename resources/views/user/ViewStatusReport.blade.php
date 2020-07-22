@extends('admin/header')
 

@section('content')
 <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
   
<style type="text/css">
 .content-wrapper{
 border-top: 1px solid lightgrey
 } 
  th{
    font-weight: bold;
    border: 1px solid #463434;
  }
 
  td{
      border: 0.5px solid #463434; 
      color:black;
  }
  .s{
    font-size: 10px!important;
  }
  table{
    margin-bottom: 40px;
  }
  h5{
    font-size: 18px!important;
  }
@media print {
 b,td,p,span{
    font-size: 20px!important;
    color:black!important;
    opacity: 1!important;

  }
  body{
    color: black!important;
  }
  .table:not(.table-dark) {
    color: black!important;
}
  * {
    color: black;
    background: black;
    opacity: 1!important;
  } 
 
  span{
    visibility: visible!important;
    font-size: 20px!important
  }
 
  h1{  
    text-align: center;
    margin-bottom: 20px;

  }
</style>
   
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- Main content -->
    <section class="content pt-2">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
 
  <div class="row exparea">
 
<div class="col-lg-6 ">
     

<a href="{{url('admin/Required_Reports')}}">View Required Reports</a>

||
<a href="{{url('admin/ViewMachineReport')}}"> View Machine Reports</a>
   
  <div class="row">
     <div class="col-lg-2 pr-0">
  <h5><u>Not Started</u>
  </h5>
</div> 
         <div class="col-lg-3">
    <div class="form-group">
                   

              <input type="date" class="form-control" id="from_date3" name=from_date3 value="{{date('Y-m-d')}}">

                </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                  

              <input type="date" class="form-control" id="to_date3" name=to_date3 value="{{date('Y-m-d')}}" >

</div>
                </div>
                   <div class="col-lg-1">
 <button class="btn btn-primary btn_search4" id="btn_search4"  ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print4" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update4 " id="update4" >Update</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table3" style="overflow:hidden" class=" table-sm  w-100 ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                                             
             
 <th class="px-0">Ord #</th> 
   <th class="" style="padding-left: 20px!important;padding-right:20px!important">Cust</th>
                        <th style="padding-left: 50px!important;padding-right: 50px!important">
                     Product Name</th>    <th  class="px-0">M/C</th>
                               <th  class="px-0">Priority</th>

                           <th class="px-0">Status</th>

                           <th class="px-0">Type</th>

                           <th class="px-0">Qty</th>
                        
              
                    
                         <th class="px-0">Pol. Size</th>
                          <th class="px-0">Pol. Wt</th>
                        <th class="px-0">Date Rec.</th>
                         <th  class="px-0">Date Com.</th>
                            <th  class="px-0">Remarks</th>
                             
                    </tr>
                  </thead>
                  <tbody id=showdata3 style="background: #">
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 



<div class="col-lg-6" style="margin-top: 22px">
     
  

 <div class="row">
    <div class="col-lg-2  pr-0">
  <h5><u>Scheduled </u>
  </h5></div>
             
         <div class="col-lg-3">
    <div class="form-group">
                   

              <input type="date" class="form-control" id="from_date1" name=from_date1 value="{{date('Y-m-d')}}">

                </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                  

              <input type="date" class="form-control" id="to_date1" name=to_date1 value="{{date('Y-m-d')}}" >

</div>
                </div>


                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search2" id="btn_search2" ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print2" title="Print"   ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update2 " id="update2" >Update</button>
              </div>
              </div>
           
           
   <div class="table-responsive" >
                <table id="table1" style="overflow:hidden" class=" table-sm w-100  ">
                  <thead class="thead thead-dark bg-dark text-white"  >
                    <tr>
             
 <th class="px-0">Ord #</th> 
    <th class="" style="padding-left: 20px!important;padding-right:20px!important">Cust</th>
                        <th style="padding-left: 50px!important;padding-right: 50px!important">Product Name</th>
                         <th  class="px-0">M/C</th>
                               <th  class="px-0">Priority</th>

                           <th class="px-0">Status</th>

                           <th class="px-0">Type</th>

                           <th class="px-0">Qty</th>
                        
              
                    
                         <th class="px-0">Pol. Size</th>
                          <th class="px-0">Pol. Wt</th>
                        <th class="px-0">Date Rec.</th>
                         <th  class="px-0">Date Com.</th>
                             <th class="px-0">Remarks</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata1 style="background: #73d0ec75">
                

                
                
                
              </tbody>
                
              </table>
</div>


  <div class="row">
   <div class="col-lg-2  pr-0">
  <h5><u>Released </u>
  </h5>
</div>
              
         <div class="col-lg-3">
    <div class="form-group">
                   

              <input type="date" class="form-control" id="from_date2" name=from_date2 value="{{date('Y-m-d')}}">

                </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                  

              <input type="date" class="form-control" id="to_date2" name=to_date2 value="{{date('Y-m-d')}}" >

</div>
                </div>


                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search3 ml-n2" id="btn_search3"   ><i class="fa fa-search"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-success " id="print3" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update3" id="update3"   >Update</button>
              </div>
              </div>
           
           
   <div class="table-responsive" >
                <table id="table2" style="overflow:hidden" class= "table-sm w-100  ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                                                  
             
 <th class="px-0">Ord #</th> 
    <th class="" style="padding-left: 20px!important;padding-right:20px!important">Cust</th>
                        <th style="padding-left: 50px!important;padding-right: 50px!important">
                          Product Name</th>  <th  class="px-0">M/C</th>
                               <th  class="px-0">Priority</th>

                           <th class="px-0">Status</th>

                           <th class="px-0">Type</th>

                           <th class="px-0">Qty</th>
                        
              
                    
                         <th class="px-0">Pol. Size</th>
                          <th class="px-0">Pol. Wt</th>
                        <th class="px-0">Date Rec.</th>
                         <th  class="px-0">Date Com.</th>
                             <th class="px-0">Remarks</th>
                    </tr>
                  </thead>
                  <tbody id=showdata2 style="background: #86f9de91">
                

                
                
                
              </tbody>
                
              </table>
</div>

  <div class="row">
    <div class="col-lg-2 pr-0 ">
  <h5><u>In-Process </u>
  </h5>
</div>
         <div class="col-lg-3">
    <div class="form-group">
                   

              <input type="date" class="form-control" id="from_date" name=from_date value="{{date('Y-m-d')}}">

                </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                  

              <input type="date" class="form-control" id="to_date" name=to_date value="{{date('Y-m-d')}}" >

</div>
                </div>

                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search1" id="btn_search1"  ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print1" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update1 " id="update1"  >Update</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table" style="overflow:hidden"     border-color='#636b6f' class="ble table-sm w-100   ">
                  <thead class="thead thead-dark  bg-dark text-white" >
                    <tr>
                         
 <th class="px-0">Ord #</th> 
  <th class="" style="padding-left: 20px!important;padding-right:20px!important">Cust</th>
                      Product Name</th>     <th style="padding-left: 50px!important;padding-right: 50px!important">
                         <th  class="px-0">M/C</th>
                               <th  class="px-0">Priority</th>

                           <th class="px-0">Status</th>

                           <th class="px-0">Type</th>

                           <th class="px-0">Qty</th>
                        
              
                    
                         <th class="px-0">Pol. Size</th>
                          <th class="px-0">Pol. Wt</th>
                        <th class="px-0">Date Rec.</th>
                         <th  class="px-0">Date Com.</th>
                             <th class="px-0">Remarks</th>

                    </tr>
                  </thead>
                  <tbody id=showdata    style="background:#ffc107;color: black">
                

                
                
                
              </tbody>
                
              </table>
</div>

  <div class="row">
    <div class="col-lg-2">
  <h5><u>Pending </u>
  </h5>
</div>
    

         <div class="col-lg-3">
    <div class="form-group">
                   

              <input type="date" class="form-control" id="from_date4" name=from_date4 value="{{date('Y-m-d')}}">

                </div>
              </div>
               <div class="col-lg-3">
                  <div class="form-group">
                  

              <input type="date" class="form-control" id="to_date4" name=to_date4 value="{{date('Y-m-d')}}" >

</div>
                </div>

                   <div class="col-lg-1">
 <button class="btn btn-primary btn_search5" id="btn_search5" ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print5" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update5" id="update5"   >Update</button>
              </div>
              </div>
           
           
   <div class="table-responsive" >
                <table id="table4" style="overflow:hidden" class=" table-sm w-100 ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
             
 <th class="px-0">Ord #</th> 
 <th class="" style="padding-left: 20px!important;padding-right:20px!important">Cust</th>
                        <th style="padding-left: 50px!important;padding-right: 50px!important">
                        Product Name</th>    <th  class="px-0">M/C</th>
                               <th  class="px-0">Priority</th>

                           <th class="px-0">Status</th>

                           <th class="px-0">Type</th>

                           <th class="px-0">Qty</th>
                        
              
                    
                         <th class="px-0">Pol. Size</th>
                          <th class="px-0">Pol. Wt</th>
                        <th class="px-0">Date Rec.</th>
                         <th  class="px-0">Date Com.</th>
                             <th class="px-0">Remarks</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata4 style="background: #e824c724">
                

                
                
                
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

    show_data();

     show_data1();
      show_data2();
       show_data3();
        show_data4();
   

function show_data(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowInProcessReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 for ( i=0; i <res.length; i++) {


var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important">'+product_name+'</td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority1 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status1 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
         
           sno++;
        
};
   $('#table').DataTable().destroy(); 

 $('#showdata').html(html);
   

   $('#table').DataTable({
       "paging": true,

   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })
        },
        });



      }


      function show_data1(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo url('admin/ShowScheduledReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){

      var status;
      var i;
      var sno=1;
      var html='';
 
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine1" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority2 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status2 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks1 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
                
         
           sno++;
        
};
 
 $('#table1').DataTable().destroy(); 

 $('#showdata1').html(html);
   

   $('#table1').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })

 
        },
        });



      }
      function show_data2(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo url('admin/ShowReleasedReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
    
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine2" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority3 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status3 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks2 no-print" name="remarks['+sno+']""style="width:100px"></td>'+  
                      '</tr>';
                
           sno++;
        
};
 
 $('#table2').DataTable().destroy(); 

 $('#showdata2').html(html);
   

   $('#table2').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })
  
        },
        });



      }
      function show_data3(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',

      url:'<?php echo url('admin/ShowNotStartedReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 

 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
    
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td style="font-size:10px!important;"> '+product_name+'</td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine3" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority4 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status4 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"    class="remarks3 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
           sno++;
        
};
 $('#table3').DataTable().destroy(); 

 $('#showdata3').html(html);
   

   $('#table3').DataTable({
       "paging": true,
          pageLength:40,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })
        },
        });



      }
      function show_data4(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',

      url:'<?php echo url('admin/ShowPendingReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
    
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine4" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority5 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status5 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks4 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
         
           sno++;
        
};

  
 $('#table4').DataTable().destroy(); 

 $('#showdata4').html(html);
   

   $('#table4').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true, 
    
   })
   

        },
        });



      }
   
 
 


let array=[];
 $('#showdata').on('change','.machine',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val(); 
var status=$(this).closest('td').nextAll().find('.status1').val(); 
var priority=$(this).closest('td').nextAll().find('.priority1').val(); 
  
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'machine':machine,'remarks':remarks,'priority':priority,'status':status});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
 
 m.priority=priority;
m.status=status;
 
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});

 $('#showdata').on('keyup','.remarks',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine').val(); 
  var status=$(this).closest('td').prevAll().find('.status1').val(); 
var priority=$(this).closest('td').prevAll().find('.priority1').val(); 
   
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'machine':machine,'remarks':remarks,'status':status,'priority':priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});



 $('#showdata').on('keyup','.priority1',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine').val(); 
  var status=$(this).closest('td').nextAll().find('.status1').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks').val(); 
   
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});


 $('#showdata').on('change','.status1',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority1').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks').val(); 
 
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});





 /// FOr MAchine 2 ///




let array1=[];
 $('#showdata1').on('change','.machine1',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
var remarks=$(this).closest('td').nextAll().find('.remarks1').val(); 
var status=$(this).closest('td').nextAll().find('.status2').val(); 
var priority=$(this).closest('td').nextAll().find('.priority2').val(); 

 
let m=array1.filter(list=>list.id==id);

if(m==''){

  array1.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array1.filter(list=>list.id!=id);

array=[...n,m];
}    
});

 $('#showdata1').on('keyup','.remarks1',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();

var machine=$(this).closest('td').prevAll().find('.machine1').val(); 
   
var status=$(this).closest('td').prevAll().find('.status2').val(); 
var priority=$(this).closest('td').prevAll().find('.priority2').val(); 


let m=array1.filter(list=>list.id==id);

if(m==''){

  array1.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array1.filter(list=>list.id!=id);

array1=[...n,m];
}    
});//


 $('#showdata1').on('keyup','.priority2',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine1').val(); 
  var status=$(this).closest('td').nextAll().find('.status2').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks1').val(); 
  
let m=array1.filter(list=>list.id==id);

if(m==''){

  array1.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array1.filter(list=>list.id!=id);

array1=[...n,m];
}    
});


 $('#showdata1').on('change','.status2',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine1').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority2').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks1').val(); 
  
let m=array1.filter(list=>list.id==id);

if(m==''){

  array1.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array1.filter(list=>list.id!=id);

array1=[...n,m];
}    
});













// FOr MAchine 3//

let array2=[];
 $('#showdata2').on('change','.machine2',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
 
var remarks=$(this).closest('td').nextAll().find('.remarks2').val(); 
  
var status=$(this).closest('td').nextAll().find('.status3').val(); 
var priority=$(this).closest('td').nextAll().find('.priority3').val(); 

let m=array2.filter(list=>list.id==id);

if(m==''){

  array2.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array2.filter(list=>list.id!=id);

array=[...n,m];
}    
});

 $('#showdata2').on('keyup','.remarks2',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine2').val(); 
  
var status=$(this).closest('td').prevAll().find('.status3').val(); 
var priority=$(this).closest('td').prevAll().find('.priority3').val(); 

let m=array2.filter(list=>list.id==id);

if(m==''){

  array2.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array2.filter(list=>list.id!=id);

array2=[...n,m];
}    
});//



 $('#showdata2').on('keyup','.priority3',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine2').val(); 
  var status=$(this).closest('td').nextAll().find('.status3').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks2').val(); 
  
let m=array2.filter(list=>list.id==id);

if(m==''){

  array2.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array2.filter(list=>list.id!=id);

array2=[...n,m];
}    
});


 $('#showdata2').on('change','.status3',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine2').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority3').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks2').val(); 
  
let m=array2.filter(list=>list.id==id);

if(m==''){

  array2.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array2.filter(list=>list.id!=id);

array2=[...n,m];
}    
});










let array3=[];
 $('#showdata3').on('change','.machine3',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
 
var remarks=$(this).closest('td').nextAll().find('.remarks3').val(); 
 
var status=$(this).closest('td').nextAll().find('.status4').val(); 
var priority=$(this).closest('td').nextAll().find('.priority4').val(); 
let m=array3.filter(list=>list.id==id);

if(m==''){

  array3.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array3.filter(list=>list.id!=id);

array3=[...n,m];
}    
});

 $('#showdata3').on('keyup','.remarks3',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine3').val(); 
  
var status=$(this).closest('td').prevAll().find('.status4').val(); 
var priority=$(this).closest('td').prevAll().find('.priority4').val(); 
let m=array3.filter(list=>list.id==id);

if(m==''){

  array3.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array3.filter(list=>list.id!=id);

array3=[...n,m];
}    
});//


 $('#showdata3').on('keyup','.priority4',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine3').val(); 
  var status=$(this).closest('td').nextAll().find('.status4').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks3').val(); 
  
let m=array3.filter(list=>list.id==id);

if(m==''){

  array3.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
let n=array3.filter(list=>list.id!=id);

array3=[...n,m];
}    
});


 $('#showdata3').on('change','.status4',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine3').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority4').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks3').val(); 
  
let m=array3.filter(list=>list.id==id);

if(m==''){

  array3.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array3.filter(list=>list.id!=id);

array3=[...n,m];
}    
});










let array4=[];
 $('#showdata4').on('change','.machine4',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
 
var remarks=$(this).closest('td').nextAll().find('.remarks4').val(); 
 
var status=$(this).closest('td').nextAll().find('.status5').val(); 
var priority=$(this).closest('td').nextAll().find('.priority5').val(); 
let m=array4.filter(list=>list.id==id);

if(m==''){

  array4.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array4.filter(list=>list.id!=id);

array4=[...n,m];
}    
});

 $('#showdata4').on('keyup','.remarks4',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine4').val(); 
  
var status=$(this).closest('td').prevAll().find('.status5').val(); 
var priority=$(this).closest('td').prevAll().find('.priority5').val(); 
let m=array4.filter(list=>list.id==id);

if(m==''){

  array4.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array4.filter(list=>list.id!=id);

array4=[...n,m];
}    
});//



 $('#showdata4').on('keyup','.priority5',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine4').val(); 
  var status=$(this).closest('td').nextAll().find('.status5').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarka4').val(); 
  
let m=array4.filter(list=>list.id==id);

if(m==''){

  array4.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array4.filter(list=>list.id!=id);

array4=[...n,m];
}    
});


 $('#showdata4').on('change','.status5',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine4').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority5').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks4').val(); 
  
let m=array4.filter(list=>list.id==id);

if(m==''){

  array4.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array4.filter(list=>list.id!=id);

array4=[...n,m];
}    
});











let array5=[];
 $('#showdata5').on('change','.machine5',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
 
var remarks=$(this).closest('td').nextAll().find('.remarks5').val(); 
 
var status=$(this).closest('td').nextAll().find('.status6').val(); 
var priority=$(this).closest('td').nextAll().find('.priority6').val(); 
let m=array5.filter(list=>list.id==id);

if(m==''){

  array5.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array5.filter(list=>list.id!=id);

array5=[...n,m];
}    
});

 $('#showdata5').on('keyup','.remarks5',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine5').val(); 
  
var status=$(this).closest('td').prevAll().find('.status6').val(); 
var priority=$(this).closest('td').prevAll().find('.priority6').val(); 
let m=array5.filter(list=>list.id==id);

if(m==''){

  array5.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array5.filter(list=>list.id!=id);

array5=[...n,m];
}    
});//


 $('#showdata5').on('keyup','.priority6',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine5').val(); 
  var status=$(this).closest('td').nextAll().find('.status6').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks5').val(); 
  
let m=array5.filter(list=>list.id==id);

if(m==''){

  array5.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array5.filter(list=>list.id!=id);

array5=[...n,m];
}    
});


 $('#showdata5').on('change','.status6',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine5').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority6').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks5').val(); 
  
let m=array5.filter(list=>list.id==id);

if(m==''){

  array5.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array5.filter(list=>list.id!=id);

array5=[...n,m];
}    
});








let array6=[];
 $('#showdata6').on('change','.machine6',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
 
var remarks=$(this).closest('td').nextAll().find('.remarks6').val(); 
 
var status=$(this).closest('td').nextAll().find('.status7').val(); 
var priority=$(this).closest('td').nextAll().find('.priority7').val(); 
let m=array6.filter(list=>list.id==id);

if(m==''){

  array6.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine;
  
 m.priority=priority;
m.status=status;
let n=array6.filter(list=>list.id!=id);

array6=[...n,m];
}    
});

 $('#showdata6').on('keyup','.remarks6',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine6').val(); 
  
var status=$(this).closest('td').prevAll().find('.status7').val(); 
var priority=$(this).closest('td').prevAll().find('.priority7').val(); 
let m=array6.filter(list=>list.id==id);

if(m==''){

  array6.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array6.filter(list=>list.id!=id);

array6=[...n,m];
}    
});//



 $('#showdata6').on('keyup','.priority7',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine6').val(); 
  var status=$(this).closest('td').nextAll().find('.status7').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks6').val(); 
  
let m=array6.filter(list=>list.id==id);

if(m==''){

  array6.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array6.filter(list=>list.id!=id);

array6=[...n,m];
}    
});


 $('#showdata6').on('change','.status7',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine6').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority7').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks6').val(); 
  
let m=array6.filter(list=>list.id==id);

if(m==''){

  array6.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array6.filter(list=>list.id!=id);

array6=[...n,m];
}    
});









// Forr MAchine 7


let array7=[];
 $('#showdata7').on('change','.machine7',function(){ 
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();

var remarks=$(this).closest('td').nextAll().find('.remarks7').val(); 

var status=$(this).closest('td').nextAll().find('.status8').val(); 
var priority=$(this).closest('td').nextAll().find('.priority8').val(); 
let m=array7.filter(list=>list.id==id);

if(m==''){

  array7.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array7.filter(list=>list.id!=id);

array7=[...n,m];
}    
});

 $('#showdata7').on('keyup','.remarks7',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
 var machine=$(this).closest('td').prevAll().find('.machine7').val(); 
   
var status=$(this).closest('td').prevAll().find('.status8').val(); 
var priority=$(this).closest('td').prevAll().find('.priority8').val(); 
let m=array7.filter(list=>list.id==id);

if(m==''){

  array7.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array7.filter(list=>list.id!=id);

array7=[...n,m];
}    
});//


 $('#showdata7').on('keyup','.priority8',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine7').val(); 
  var status=$(this).closest('td').nextAll().find('.status8').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks7').val(); 
  
let m=array7.filter(list=>list.id==id);

if(m==''){

  array7.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.machine=machine; 
 m.priority=priority;
m.status=status;
 
let n=array7.filter(list=>list.id!=id);

array7=[...n,m];
}    
});


 $('#showdata7').on('change','.status8',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
 
var machine=$(this).closest('td').prevAll().find('.machine7').val(); 
  var priority=$(this).closest('td').prevAll().find('.priority8').val(); 
var remarks=$(this).closest('td').nextAll().find('.remarks7').val(); 
  
let m=array7.filter(list=>list.id==id);

if(m==''){

  array7.push({'id':id,'machine':machine,'remarks':remarks,status:status,priority:priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks; 
 m.priority=priority;
m.status=status;
m.machine=machine;
 
let n=array7.filter(list=>list.id!=id);

array7=[...n,m];
}    
});









  $('#update1').unbind().click(function(){
 
  var url='<?php echo url('admin/UpdateInProcessStatus')?>';
 console.log(array);
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array},
    url:url,
    async:false,
 dataType:'json',
   
    success:function(response){
 
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();
 
        show_data();
         show_data1();
          show_data2();
           show_data3();
            show_data4();
 

array=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
 




  $('#update2').click(function(){

 
  var url='<?php echo url('admin/UpdateScheduledStatus')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array1},
    url:url,
    async:false,
 dataType:'json',
   
    success:function(response){
 
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();

    

        show_data();
         show_data1();
          show_data2();
           show_data3();
            show_data4();
       
array1=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update3').click(function(){

 

  var url='<?php echo url('admin/UpdateReleasedStatus')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array2},
    url:url,
    async:false,
 dataType:'json',
   
    success:function(response){
 
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();

     

        show_data();
         show_data1();
          show_data2();
           show_data3();
            show_data4();
           
array2=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update4').click(function(){

 
  var url='<?php echo url('admin/UpdateNotStartedStatus')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array3},
    url:url,
    async:false,
 dataType:'json',
   
    success:function(response){
 
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();

      

        show_data();
         show_data1();
          show_data2();
           show_data3();
            show_data4();
          
array3=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update5').click(function(){






  var url='<?php echo url('admin/UpdatePendingStatus')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array4},
    url:url,
    async:false,
 dataType:'json',
   
    success:function(response){
 
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();

      

        show_data();
         show_data1();
          show_data2();
           show_data3();
            show_data4();
     
array4=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });

 
$('.btn_search1').unbind().click(function(){
 
var from_date=$('input[name=from_date]').val();
var to_date=$('input[name=to_date]').val();
    
 $.ajax({
     
      method:'get',
      data:{'from_date':from_date,'to_date':to_date},
 
      url:'<?php echo url('admin/ShowInProcessFReport')?>',
      async:false,
 dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
   
 
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority1 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status1 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"    class="remarks no-print" name="remarks['+sno+']"" style="width:100px"></td>'+  
                      '</tr>';
                
         
           sno++;
        
};
 
      $('#table').DataTable().destroy(); 
 $('#showdata').html(html);
   
   $('#table').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
  

      
   })
      
   }
})


})










$('.btn_search2').unbind().click(function(){
 
var from_date=$('input[name=from_date1]').val();
var to_date=$('input[name=to_date1]').val();
   
 $.ajax({
     
      method:'get',
      data:{'from_date':from_date,'to_date':to_date},
 
      url:'<?php echo url('admin/ShowScheduledFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
    
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine1" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority2 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status2 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"    class="remarks1 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
                
                
         
         
           sno++;
        
};

   $('#table1').DataTable().destroy(); 

 $('#showdata1').html(html);
   

   $('#table1').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true, 
    
   })

   }
})


})




$('.btn_search3').unbind().click(function(){

var from_date=$('input[name=from_date2]').val();
var to_date=$('input[name=to_date2]').val();
    
 $.ajax({
     
      method:'get',
      data:{'from_date':from_date,'to_date':to_date},
 
      url:'<?php echo url('admin/ShowReleasedFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
    
  
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine2" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority3 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status3 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"    class="remarks2 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
         
         
           sno++;
        
}; 
   $('#table2').DataTable().destroy();
 $('#showdata2').html(html);
  
  
   $('#table2').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true, 
    
   })
      
   }
})


})




$('.btn_search4').click(function(){
 
var from_date=$('input[name=from_date3]').val();
var to_date=$('input[name=to_date3]').val();
   
 $.ajax({
     
      method:'get',
      data:{'from_date':from_date,'to_date':to_date},
 
      url:'<?php echo url('admin/ShowNotStartedFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
    
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine3" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority4 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status4 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks3 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
                
         
         
           sno++;
        
};
   
   $('#table3').DataTable().destroy();
 
 $('#showdata3').html(html);
 
   $('#table3').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true, 
    
   })

      
   }
})


})




$('.btn_search5').unbind().click(function(){
 
var from_date=$('input[name=from_date4]').val();
var to_date=$('input[name=to_date4]').val();
    
 $.ajax({
     
      method:'get',
      data:{'from_date':from_date,'to_date':to_date},
 
      url:'<?php echo url('admin/ShowPendingFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
   

 
 for ( i=0; i <res.length; i++) {

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
 
 html+='<tr id='+res[i].oid+'>'+        
   '<td>'+res[i].oid+'</td>'+
    '<td><b> '+c+'</b></td>'+

                '<td class="s" style="font-size:10px!important"><b class="s" style="font-size:10px!important"> '+product_name+'</b></td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine4" style="width:60px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
    '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority5 no-print"  name="priority" style="width:30px"></td>'+
         
              
                    
                        '<td class=""><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status5 no-print" style="width:70px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                               '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                        '</select></td>'+
                                '<td><b>'+res[i].name+'</td>'+
                                      '<td><b>'+res[i].qty+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                 '<td><b>'+res[i].date_received+'</td>'+
                           '<td><b>'+res[i].date_commited+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks4 no-print" name="remarks['+sno+']" style="width:100px"></td>'+  
                      '</tr>';
                
           sno++;
        
};
   

 $('#table4').DataTable().destroy(); 
 $('#showdata4').html(html);
 
   $('#table4').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true, 
    
   })

   }
})


})

 
 


 


$(".export").click(function(){
 
  $(".exparea").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:" Order Report",

    filename:" Order Report",//do not include extension

    fileext:".xlsx" // file extension

  });
  
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




  $('#print1').unbind().click(function(){
       $('#table').DataTable().destroy();
        $("#table").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>2C Report</u></h1>'
  }

);
          $('#table').DataTable().draw();
      })


  $('#print2').click(function(){
          $('#table1').DataTable().destroy();
        $("#table1").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>4C Report</u></h1>'
  }
);
         $('#table1').DataTable().draw();   })


  $('#print3').click(function(){
          $('#table2').DataTable().destroy();
        $("#table2").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>6C Report</u></h1>'
  }
);
      $('#table2').DataTable().draw();   })


  $('#print4').click(function(){
          $('#table3').DataTable().destroy();
        $("#table3").print({
    addGlobalStyles : true,
    stylesheet : '<style>span,td{color:black!important}</style>',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>8C Report</u></h1>'
  }
);
       $('#table3').DataTable().draw();  })


  $('#print5').click(function(){
          $('#table4').DataTable().destroy();
        $("#table4").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>Lam-S Report</u></h1>'
  }
);
      $('#table4').DataTable().draw();
        })




  $('#print6').click(function(){
          $('#table5').DataTable().destroy();
        $("#table5").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>Lam-B Report</u></h1>'
  }
);
       $('#table5').DataTable().draw();  })



  $('#print7').click(function(){
          $('#table6').DataTable().destroy();
        $("#table6").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>Flexo-S Report</u></h1>'
  }
);
       $('#table6').DataTable().draw();  })



  $('#print8').click(function(){
         $('#table7').DataTable().destroy();
        $("#table7").print({
    addGlobalStyles : true,
    stylesheet : '',
    rejectWindow : true,
    noPrintSelector : ".no-print",
    iframe : true,
    append : '',
    prepend : '<h1><u>Flexo-B Report</u></h1>'
  }
);
       $('#table7').DataTable().draw();  })



     


});
</script>





     @endsection('content')
 

@extends('admin/footer')