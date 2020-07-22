@extends('admin/header')
 

@section('content')

<style type="text/css">
 .content-wrapper{
 border-top: 1px solid lightgrey;
 
 } 
 h1,h2,h3,h4,h5,h6{
  color: black!important;
  font-size: 16px!important
  ;
 }
  th{
    font-weight: bold;
    border: 1px solid black;
  }
  td{
    background: #F9F9F9;
  }
  table{
    margin-bottom: 40px;
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
    <link href="{{asset('public/css/app.css')}}" rel="stylesheet">
  <head>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content pt-2">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
 
  <div class="row exparea">
 
<div class="col-lg-4 ">

    <div class="row ">
          <div class="col-lg-8 " >
     <a class="text-dark" href="{{url('admin/ViewMachineReport')}}">View Machine Report</a>
       ||  <a class="text-dark" href="{{url('admin/ViewStatusReport')}}">View Status Report</a>
  </div>
    <div class="col-lg-4 text-">
  <h5><u>Polyster Report</u>
  </h5>
</div>

</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>

           <select  id="statuspolyster" name="statuspolyster" class="selectpicker" multiple>
   <option value="Not Started" >Not Started</option>
     <option value="Scheduled"  >Scheduled</option>

                    
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                    
</select>

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search" id="btn_search" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive-sm" >
                <table id="table" style="overflow:hidden" class=" table-sm  w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 



<div class="col-lg-4 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>M_Polyster Report</u>
  </h5>
</div>
    <div class="col-lg-4 text-right" >
   
  </div>
</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>
   <select  id="statusmpolyster" name="statusmpolyster" class="selectpicker" multiple>
     <option value="Not Started" >Not Started</option>
    
 <option value="Scheduled"  >Scheduled</option>
     
                    
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>
                    
                       
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                  
</select>

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search1" id="btn_search1" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table1" style="overflow:hidden" class="  w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
      <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata1>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 

<div class="col-lg-4 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>M_BOPP Report</u>
  </h5>
</div>
    <div class="col-lg-4 text-right" >
   
  </div>
</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>
   <select  id="statusmbopp" name="statusmbopp" class="selectpicker" multiple>
    <option value="Not Started" >Not Started</option>
    
   <option value="Scheduled"  >Scheduled</option>
     
                    
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                       
</select>

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search2" id="btn_search2" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table2" style="overflow:hidden" class=" table-sm w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
 <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata2>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 
<div class="col-lg-4 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>Nat.BOPP Report</u>
  </h5>
</div>
    <div class="col-lg-4 text-right" >
   
  </div>
</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>
 <select  id="statusbopp" name="statusbopp" class="selectpicker" multiple>
   <option value="Not Started" >Not Started</option>
  
   <option value="Scheduled"  >Scheduled</option>
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>
                       
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                     
</select>

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search3" id="btn_search3" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table3" style="overflow:hidden" class=" table-sm w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
  <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata3>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


<div class="col-lg-4 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>Nat.Poly Report</u>
  </h5>
</div>
    <div class="col-lg-4 text-right" >
   
  </div>
</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>
 <select  id="statuspoly" name="statuspoly" class="selectpicker" multiple>
   <option value="Not Started" >Not Started</option>
 <option value="Scheduled"  >Scheduled</option>
     
                    
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>
                       
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                      <option value="Scheduled"  >Scheduled</option>
</select>

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search4" id="btn_search4" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table4" style="overflow:hidden" class=" table-sm w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata4>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


<div class="col-lg-4 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>Milky Poly Report</u>
  </h5>
</div>
    <div class="col-lg-4 text-right" >
   
  </div>
</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>

          <select  id="statusmilky" name="statusmilky" class="selectpicker" multiple>
   <option value="Not Started" >Not Started</option>
      
     <option value="Scheduled"  >Scheduled</option>

                    
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>
                       
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                     
</select>
</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search5" id="btn_search5" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table5" style="overflow:hidden" class="table table-sm w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
              
       
                    </tr>
                  </thead>
                  <tbody id=showdata5>
                

                
                
                
              </tbody>
                
              </table>
</div>
</div>
 


<div class="col-lg-4 ">
    <div class="row ">
    <div class="col-lg-7 text-right">
  <h5><u>Perlized Report</u>
  </h5>
</div>
    <div class="col-lg-4 text-right" >
   
  </div>
</div>

  <div class="row">
   
               <div class="col-lg-7">
                  <div class="form-group">
                   <label>Status</label>
 <select  id="statusperilized" name="statusperilized" class="selectpicker" multiple>
 <option value="Not Started" >Not Started</option>
     <option value="Scheduled"  >Scheduled</option>

                    
                          <option value="Released"  >Released</option>
                  <option value="In Process" >In Process</option>       
                       
                  <option value="Pending-Lam1" >Pending-Lam1</option>

                  <option value="Pending-Lam2" >Pending-Lam2</option>

                  <option value="Pending-Slitting" >Pending-Slitting</option>

                  <option value="Pending-Pouching" >Pending-Pouching</option>
                    <option value="Pending-Rewind" >Pending-Rewind</option>
                      <option value="Completed">Completed</option>
                        
                  <option value="Cancelled"   >Cancelled</option>
                  
</select>

</div>
                </div>

                   <div class="col-lg-2">
 <button class="btn btn-primary btn_search6" id="btn_search6" style="margin-top: 32px" >Search</button>
              </div>
              </div>
           
   <div class="table-responsive" >
                <table id="table6" style="overflow:hidden" class=" table-sm w-100 table-bordered table- ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th class="px-0"><b>Sno</b></th>
                 <th class="px-0" >Polyster Size</th>
                       <th class="px-5">Party</th>
                        <th >Product</th>
                         <th class="pl-4 pr-5">Total</th>
       
                    </tr>
                  </thead>
                  <tbody id=showdata6>
                

                
                
                
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

 <script src="{{asset('public/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>

  $(function(){
 
    show_data();
     show_data1();
      show_data2();
       show_data3();
        show_data4();
         show_data5();
          show_data6();
       $('#table,#table1,#table2,#table3,#table4,#table5,#table6').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   destroy:true
  

       });
    
function show_data(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowPolysterReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].Polyster_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};

 
 $('#showdata').html(html);
 $('#table').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   destroy:true

       });
        },
        });



      }


      function show_data1(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowMBoppReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].m_bopp_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
}; 
 $('#showdata2').html(html);
 $('#table2').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true
   ,destroy:true

       });
        },
        });



      }
      function show_data2(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowBoppReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
           
            '<td><b>'+res[i].bopp_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};
 
 $('#showdata3').html(html);
 $('#table3').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
 destroy:true

       });
        },
        });



      }
      function show_data3(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowPolyReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].poly+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};
 
 $('#showdata4').html(html);

     $('#table4').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
  destroy:true

       });    },
        });



      }
      function show_data4(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowMilkyPolyReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
           

            '<td><b>'+res[i].MILKY_POLY_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};
 
 $('#showdata5').html(html);
 $('#table5').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
    destroy:true

       });
        },
        });



      }
      function show_data5(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',

 
      url:'<?php echo url('admin/ShowPerlizedReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].PERILIZED_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total)+' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};
 

 $('#showdata6').html(html);

        $('#table6').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
  destroy:true

       }); },
        });



      }
      function show_data6(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      

      url:'<?php echo url('admin/ShowMPolysterReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].M_Polyster_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total)+' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};
 
 $('#showdata1').html(html);
 $('#table1').DataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
  destroy:true

       });
        },
        });



      }

 

$('.btn_search').unbind().click(function(){
 
var status=$('select[name=statuspolyster]').val();
 
 
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFPolysterReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].Polyster_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
}; 
$('#table').DataTable().destroy()   
 $('#showdata').html(html);
$('#table').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
 

       })   
   }
})


})









$('.btn_search1').unbind().click(function(){
 
var status=$('select[name=statusmpolyster]').val();
  
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFMPolysterReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].M_Polyster_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
}; 
$('#table1').DataTable().destroy()   
 $('#showdata1').html(html);
$('#table1').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
  
       })   
      
   }
})


})




$('.btn_search2').unbind().click(function(){
 
var status=$('select[name=statusmbopp]').val();
 
 
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFMBoppReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].m_bopp_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
}; 
$('#table2').DataTable().destroy()   
 $('#showdata2').html(html);
$('#table2').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
    
       })   
      
   }
})


})




$('.btn_search3').unbind().click(function(){
 
var status=$('select[name=statusbopp]').val();
 
 
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFBoppReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].bopp_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};

$('#table3').DataTable().destroy()   
 $('#showdata3').html(html);
$('#table3').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
 
       })   
      
   }
})


})




$('.btn_search4').unbind().click(function(){
 
var status=$('select[name=statuspoly]').val();
 
 
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFPolyReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].poly+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
}; 
$('#table4').DataTable().destroy()   
 $('#showdata4').html(html);
$('#table4').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
  

       })   
      
   }
})


})




$('.btn_search5').unbind().click(function(){
 
var status=$('select[name=statusmilky]').val();
 
 
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFMilkyPolyReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].MILKY_POLY_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};
$('#table5').DataTable().destroy()   
 $('#showdata5').html(html);
$('#table5').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
 

       })   

      
   }
})


})



$('.btn_search6').unbind().click(function(){
 
var status=$('select[name=statusperilized]').val();
 
 
 $.ajax({
     
      method:'get',
      data:{'status':status},
 
      url:'<?php echo url('admin/ShowFPerlizedReport')?>',
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
  
 html+='<tr>'+        
   '<td>'+sno+'</td>'+
             
            '<td><b>'+res[i].PERILIZED_size+'</td>'+
            
 
               '<td><b> '+c+'</b></td>'+

                '<td><b>'+product_name+'</b></td>'+

                '<td><b>'+(res[i].total) +' Kg</b></td>'+
                
                      
                      '</tr>';
                
         
           sno++;
        
};

$('#table6').DataTable().destroy()   
 $('#showdata6').html(html);
$('#table6').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
       })   
      
   }
})


})








 

      
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





});
</script>





     @endsection('content')
 

@extends('admin/footer')