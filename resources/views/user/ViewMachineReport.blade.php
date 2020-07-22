@extends('admin/header')
 

@section('content')
 <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
   
<style type="text/css">
 .content-wrapper{
 border-top: 1px solid lightgrey
 } 
  th{
    font-weight: bold;
    border: 1px solid black;
  }
   b,td,p,span{
  
    color:black!important;
    opacity: 1!important;

  } 
h5{
  font-size: 17px!important
}
  td{
      border: 0.5px solid #463434; 
      color:black;
  }
#s{
 font-size: 10px!important
}
  table{
    margin-bottom: 40px;
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
 
<div class="col-lg-6  ">
     
<a href="{{url('admin/Required_Reports')}}">View Required Report</a>
||
<a href="{{url('admin/ViewStatusReport')}}">View Status Report</a>
   
   <div class="row">
    <div class="col-lg-2 ">
  <h5><u>8C Report</u>
  </h5>
</div>
   
               <div class="col-lg-4 ">
                  <div class="form-group">
                

           <select  id="status4" name="status4" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                 
 <input  type="number" class="form-control"  id="limit4" placeholder="Limit4" name="limit4">

</div>
                </div>

                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search4" id="btn_search4"  ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print4" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update4 " id="update4"  >Update</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table3" style="overflow:hidden" class=" table-sm w-100  ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                         
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5" >C. Name</th>
                        <th class="" style="padding-left: 60px!important;padding-right: 60px!important" >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
                    </tr>
                  </thead>
                  <tbody id=showdata3 >
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


<div class="col-lg-6" style="margin-top: 22px">
    
 <div class="row">
    <div class="col-lg-2  ">
  <h5><u>6C Report</u>
  </h5></div>
               <div class="col-lg-4 ">
                  <div class="form-group">
            

           <select  id="status3" name="status3" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                  
 <input  type="number" class="form-control"  id="limit3" placeholder="Limit" name="limit3">

</div>
                </div>

                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search3" id="btn_search3" ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print3" title="Print"   ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update3 " id="update3" >Update</button>
              </div>
              </div>
           
           
   <div class="table-responsive" >
                <table id="table2" style="overflow:hidden" class=" table-sm w-100 t  ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                  
                         
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th  style="padding-left: 60px!important;padding-right: 60px!important"  >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata2  > 
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>


<div class="col-lg-6 mt-4">
  

  <div class="row">
   <div class="col-lg-2  ">
  <h5><u>4C Report</u>
  </h5>
</div>
               <div class="col-lg-4">
                  <div class="form-group">
                  
           <select  id="status2" name="status2" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                  
 <input  type="number" class="form-control"  id="limit2" placeholder="Limit2" name="limit2">

</div>
                </div>

                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search2 ml-n2" id="btn_search2"   ><i class="fa fa-search"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-success " id="print2" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update2 " id="update2"   >Update</button>
              </div>
              </div>
           
           
   <div class="table-responsive" >
                <table id="table1" style="overflow:hidden" class="  table-sm w-100 table- table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                         
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th style="padding-left: 60px!important;padding-right: 60px!important"  >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata1  >
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>

 

<div class="col-lg-6 mt-4 ">
     

  <div class="row">
     <div class="col-lg-2">
  <h5><u>2C Report</u>
  </h5>
</div>
               <div class="col-lg-4 ">
                  <div class="form-group">
                  

           <select  id="status1" name="status1" class="selectpicker w-100" multiple>
  <option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                
 <input  type="number" class="form-control"  id="limit1" placeholder="Limit1" name="limit1">

</div>
                </div>

                   <div class="col-lg-1">
 <button class="btn btn-primary btn_search1" id="btn_search1"  ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print1" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update1 " id="update1" >Update</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table" style="overflow:hidden" class=" table-sm    ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                         
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th  style="padding-left: 60px!important;padding-right: 60px!important"  >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata  >
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 



<div class="col-lg-6 mt-4">
   

  <div class="row">
    <div class="col-lg-3">
  <h5><u>Lam-S Report</u>
  </h5>
</div>
   
               <div class="col-lg-3">
                  <div class="form-group">
                  
           <select  id="status5" name="status5" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                 
 <input  type="number" class="form-control"  id="limit5" placeholder="Limit" name="limit5">

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
                <table id="table4" style="overflow:hidden" class=" table-sm w-100   ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                         
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th  style="padding-left: 60px!important;padding-right: 60px!important"  >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata4   >
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


<div class="col-lg-6 mt-4">
     

   <div class="row">
    <div class="col-lg-3  ">
  <h5><u>Lam-B Report</u>
  </h5>
</div>
               <div class="col-lg-3 ">
                  <div class="form-group">
                   
           <select  id="status6" name="status6" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                 
 <input  type="number" class="form-control"  id="limit6" placeholder="Limit" name="limit6">

</div>
                </div>

                   <div class="col-lg-1">
 <button class="btn btn-primary btn_search6" id="btn_search6"  ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print6" title="Print"  ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update6 " id="update6" >Update</button>
              </div>
              </div>
           
           
   <div class="table-responsive" >
                <table id="table5" style="overflow:hidden" class=" table-sm w-100   ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                                      
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th  style="padding-left: 60px!important;padding-right: 60px!important" >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata5>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


<div class="col-lg-6 mt-4">
 

  <div class="row">
    <div class="col-lg-3">
  <h5><u>Flexo-S Report</u>
  </h5>
</div>
               <div class="col-lg-3 ">
                  <div class="form-group">
                  
           <select  id="status7" name="status7" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
              </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                  
 <input  type="number" class="form-control"  id="limit7" placeholder="Limit" name="limit7">

</div>
                </div>
 
           

                   <div class="col-lg-1">
 <button class="btn btn-primary btn_search7" id="btn_search7"   ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success " id="print7" title="Print"   ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update7 " id="update7"  >Update</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table6" style="overflow:hidden" class=" table-sm w-100   ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                                      
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th  style="padding-left: 60px!important;padding-right: 60px!important" >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
                    </tr>
                  </thead>
                  <tbody id=showdata6>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


 



<div class="col-lg-6 mt-4">
   
   <div class="row">
   <div class="col-lg-3 ">
  <h5><u>Flexo-B Report</u>
  </h5>
</div>
               <div class="col-lg-3">
                  <div class="form-group">
                 

           <select  id="status8" name="status8" class="selectpicker w-100" multiple>
   '<option value="Not Started" >Not Started</option>
                  <option value="In Process" >In Process</option>
                      <option value="Released">Released</option>
             
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

  <div class="col-lg-2 px-0">
                  <div class="form-group">
                   
 <input  type="number" class="form-control"  id="limit8" placeholder="Limit" name="limit8">

</div>
                </div>

                   <div class="col-lg-1 ">
 <button class="btn btn-primary btn_search8" id="btn_search8" ><i class="fa fa-search"></i></button>
              </div>
               <div class="col-lg-1 ">
 <button class="btn btn-success print8" id="print8" title="Print"   ><i class="fa fa-print"></i></button>
              </div>
                 <div class="col-lg-1 ">
 <button class="btn btn-primary update8 " id="update8" >Update</button>
              </div>
              </div>
           
 
           
           
   <div class="table-responsive" >
                <table id="table7" style="overflow:hidden" class=" table-sm w-100   ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                                   
 <th class="px-0">Ord #</th>
                 <th class="no-print px-0">Machine</th>
                       <th  class="px-5">C. Name</th>
                        <th  style="padding-left: 60px!important;padding-right: 60px!important"  >Product Name</th>
                         <th class="px-0">Polyster Size</th>
                          <th class="px-0">Polyster Wt</th>
                           <th class="px-0">Priority</th>
                           <th class="px-0">Status</th>
                             <th class="px-0">Remarks</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata7>
                

                
                
                
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
         show_data5();
          show_data6();
               show_data7();
        


function show_data(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/Show2CReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

 

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');

   
 html+='<tr id='+res[i].oid+' style='+color+' style='+color+'>'+        
   '<td>'+res[i].oid+'</td>'+
             
              '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td id="s"><b id="s">'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
           
                 '<td ><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority1 no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status1 no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks no-print" name="remarks['+sno+']"" style="width:100px"></td>'+  
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
      url:'<?php echo url('admin/Show4CReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){

      var status;
      var i;
      var sno=1;
      var html='';
 
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine1" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority2  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status2  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks1 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
         
           sno++;
        
};
 
 
      $('#table1').DataTable().destroy(); 
 $('#showdata1').html(html);
   
   $('#table1').DataTable({
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
      function show_data2(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo url('admin/Show6CReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
     '<td>'+res[i].oid+'</td>'+
             
             '<td  class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine2['+sno+']""  class="machine2" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                   '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority3  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status3  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks2 no-print" name="remarks2['+sno+']"" style="width:100px"></td>'+  
                
                      
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

      url:'<?php echo url('admin/Show8CReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
     '<td>'+res[i].oid+'</td>'+
             '<td  class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine3['+sno+']""  class="machine3" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td style="font-size:4px!important;">'+product_name+'</td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                   '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority4  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status4  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks3 no-print" name="remarks3['+sno+']"" style="width:100px"></td>'+  
                      '</tr>';
                
         
           sno++;
        
};
 
      $('#table3').DataTable().destroy(); 
 $('#showdata3').html(html);
   
   $('#table3').DataTable({
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
      function show_data4(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',

      url:'<?php echo url('admin/ShowLAMSReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
     '<td>'+res[i].oid+'</td>'+
             
           '<td  class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine4['+sno+']""  class="machine4" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                      '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority5  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status5  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks4 no-print" name="remarks4['+sno+']"" style="width:100px"></td>'+  
                      '</tr>';
                
         
           sno++;
        
};
 
  

      $('#table4').DataTable().destroy(); 
 $('#showdata4').html(html);
   
   $('#table4').DataTable({
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
      function show_data5(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo url('admin/ShowLAMBReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      
      var i;
      var sno=1;
      var html='';
   
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
   '<td>'+res[i].oid+'</td>'+
             '<td  class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine5['+sno+']""  class="machine5" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                    '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority6  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status6  no-print" style="width:80px">'+
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
                        '</select></td>'+                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks5 no-print" name="remarks5['+sno+']"" style="width:100px"></td>'+  
                      '</tr>';
                
         
           sno++;
        
};
 
      $('#table5').DataTable().destroy(); 
 $('#showdata5').html(html);
   
   $('#table5').DataTable({
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
      function show_data6(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo url('admin/ShowFLEXOSReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
     
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             '<td  class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine6['+sno+']""  class="machine6" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                      '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority7  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status7  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks6 no-print" name="remarks6['+sno+']"" style="width:100px"></td>'+  
                
                      
                      '</tr>';
                
         
           sno++;
        
};

 
      $('#table6').DataTable().destroy(); 
 $('#showdata6').html(html);
   
   $('#table6').DataTable({
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




        function show_data7(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo url('admin/ShowFLEXOBReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
  
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
 html+='<tr id='+res[i].oid+' style='+color+'>'+        
 
    '<td>'+res[i].oid+'</td>'+
             '<td  class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine7['+sno+']""  class="machine7" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                    '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority8  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status8  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks7 no-print" name="remarks7['+sno+']" style="width:100px"></td>'+  
                      
                      '</tr>';
                
         
           sno++;
        
};
 

      $('#table7').DataTable().destroy(); 
 $('#showdata7').html(html);
   
   $('#table7').DataTable({
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
 
  var url='<?php echo url('admin/Update2CMachine')?>';
 
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
             show_data5();
              show_data6();
                show_data7();

array=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
 






  $('#update2').click(function(){

 
  var url='<?php echo url('admin/Update4CMachine')?>';
 
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
             show_data5();
              show_data6();
                show_data7();
array1=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update3').click(function(){


console.log(array2);
  var url='<?php echo url('admin/Update6CMachine')?>';
 
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
             show_data5();
              show_data6();
                show_data7();
array2=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update4').click(function(){


console.log(array3);
  var url='<?php echo url('admin/Update8CMachine')?>';
 
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
             show_data5();
              show_data6();
                show_data7();
array3=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update5').click(function(){



  var url='<?php echo url('admin/UpdateLamSMachine')?>';
 
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
             show_data5();
              show_data6();
                show_data7();
array4=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update6').click(function(){



  var url='<?php echo url('admin/UpdateLamBMachine')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array5},
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
             show_data5();
              show_data6();
                show_data7();
array5=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update7').click(function(){



  var url='<?php echo url('admin/UpdateFlexoSMachine')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array6},
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
             show_data5();
              show_data6();
                show_data7();
array6=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#update8').click(function(){



  var url='<?php echo url('admin/UpdateFlexoBMachine')?>';
 
  $.ajax({
   type:'ajax',
    method:'get',
    data:{array:array7},
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
             show_data5();
              show_data6();
                show_data7();
array7=[];
  

    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
 

$('.btn_search1').unbind().click(function(){
 
var status=$('select[name=status1]').val();
var limit=$('input[name=limit1]').val();
    
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/Show2CFReport')?>',
      async:false,
 dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
    
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                   '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority1  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status1  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
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

   }
})


})













$('.btn_search2').unbind().click(function(){
 
var status=$('select[name=status2]').val();
var limit=$('input[name=limit2]').val();
  
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/Show4CFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
    
  
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine1" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority2  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status2  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks1 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
                
         
         
           sno++;
        
}; 
   $('#table1').DataTable().destroy(); 

 $('#showdata1').html(html);
   

   $('#table1').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })

   }
})


})




$('.btn_search3').unbind().click(function(){
 
var status=$('select[name=status3]').val();
var limit=$('input[name=limit3]').val();
 
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/Show6CFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
     
  
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine2" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority3  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status3  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks2 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
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
      
   }
})


})




$('.btn_search4').unbind().click(function(){
 
var status=$('select[name=status4]').val();
var limit=$('input[name=limit4]').val();
   
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/Show8CFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
    
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine3" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                       '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority4  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status4  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks3 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
                
         
         
           sno++;
        
};
 


   $('#table3').DataTable().destroy();
 
 $('#showdata3').html(html);
 
   $('#table3').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })

      
   }
})


})




$('.btn_search5').unbind().click(function(){
 
var status=$('select[name=status5]').val();
var limit=$('input[name=limit5]').val();

  
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/ShowLAMSFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
   
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine4" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                      '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority5  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status5  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks4 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
           sno++;
        
};
 


 $('#table4').DataTable().destroy(); 
 $('#showdata4').html(html);
 
   $('#table4').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })

   }
})


})




$('.btn_search6').unbind().click(function(){
 
var status=$('select[name=status6]').val();
var limit=$('input[name=limit6]').val();
  
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/ShowLAMBFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
   
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine5" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority6  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status6  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks5 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
         
         
           sno++;
        
};
 
  $('#table5').DataTable().destroy(); 
 $('#showdata5').html(html);
  
   $('#table5').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })
   }
})


})




$('.btn_search7').unbind().click(function(){
 
var status=$('select[name=status7]').val();
var limit=$('input[name=limit7]').val();
  
 $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/ShowFLEXOSFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
   
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine6" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                       '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority7  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status7  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks6 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
         
           sno++;
        
};
 
  $('#table6').DataTable().destroy(); 
 $('#showdata6').html(html);
  
   $('#table6').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
   })

      
   }
})


})




$('.btn_search8').unbind().click(function(){
 
var status=$('select[name=status8]').val();
var limit=$('input[name=limit8]').val();
   $.ajax({
     
      method:'get',
      data:{'status':status,'limit':limit},
 
      url:'<?php echo url('admin/ShowFLEXOBFReport')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  
      var i;
      var sno=1;
      var html='';
   
if(res!=''){
 
 for ( i=0; i <res.length; i++) {
 if(res[i].status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='In Process'){
  color="background:#ffc107;color:black";
 }else if(res[i].status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res[i].status=='Pending-Lam1' || res[i].status=='Pending-Lam2' || res[i].status=='Pending-Slitting' || res[i].status=='Pending-Pouching' ||  res[i].status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

var customer=(res[i].customer_name).split(',');
 
c=customer.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  
var product_name=(res[i].product_name).split(',');
 
product_name=product_name.map(list=>{
  return '<p style="margin-bottom:0px">'+list+'</p>'
}).join('');
  html+='<tr id='+res[i].oid+' style='+color+'>'+        
  '<td>'+res[i].oid+'</td>'+
             
            '<td class="no-print"><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine1['+sno+']""  class="machine7" style="width:50px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+
                  '<td><b>'+res[i].Polyster_size+'</td>'+
                   '<td><b>'+res[i].total_polyster_wt+'</td>'+
                      '<td><span style="visibility:hidden;font-size:0px;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority8  no-print"  name="priority" style="width:50px"></td>'+
                    
                        '<td><span style="visibility:hidden;font-size:0px;">'+res[i].status+'</span><select  name="status['+sno+']" class="status8  no-print" style="width:80px">'+
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
                        '<td><span style="visibility:hidden;font-size:0px;" >'+res[i].remarks+'</span><input value="'+res[i].remarks+'"   class="remarks7 no-print" name="remarks1['+sno+']"" style="width:100px"></td>'+  
                      
                      '</tr>';
                
         
           sno++;
        
};
}
else{
html+='<tr><td colspan=5>No Data Available</td></tr>';
}
  $('#table7').unbind().DataTable().destroy(); 
 $('#showdata7').html(html);
 
   $('#table7').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": false, 
    
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