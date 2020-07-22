@extends('admin/header')
@extends('admin/sidebar')

@section('content')
<style type="text/css">
  #gif{
    position: fixed;
    z-index: 1000;
    left: 47%;
  top:40%;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <img src="{{asset('public/dist/img/gif.gif')}}" class="gif d-none" id="gif" width="100" height="100"  >

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-12">
          <div class="card">
        
            <!-- /.card-header -->


            <div class="card-body">
       
              <div class="col-lg-12  alert-success">
     
              </div>
        
      <div class="col-lg-12  alert-danger">

              </div>
                <div class="row">

               <div class="col-lg-2">
                      <div class="form-group">
                
              <select  class="form-control" id="type1" name=type1   >
                <option value="">
                  Select Type
                </option>

                     @php
                $qr=DB::table('product_type')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->name}}</option>;
             
              @endforeach
              </select>

                </div>
                    </div>  <div class="col-lg-2">
                      <div class="form-group">
                  
               <select  class="form-control" id="machine1" name=machine1   >
                <option value="">
                  Select Machine
                </option>

                     @php
                $qr=DB::table('machine')->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->machine}}">{{$q->machine}}</option>;
             
              @endforeach
              </select>
            </div>

                </div>

                                <div class="col-lg-2">
                      <div class="form-group">
                  
               <select  class="form-control" id="cid1" name=cid1   >
                <option value="">
                  Select Customer
                </option>

                     @php
                $qr=DB::table('customer')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->customer_name}}</option>;
             
              @endforeach
              </select>
            </div>

                </div>
                  <div class="col-lg-2">
                      <div class="form-group">
                  
               <select  class="form-control" id="priority1" name=priority1   >
                <option value="">
                  Select Priority
                </option>

                     
                 <option value="priority">Priority</option>;
              
              </select>
            </div>

                </div>
                   <div class="col-lg-2">
                      <div class="form-group">
                  
              <select  id="status1" name="status1" class="selectpicker" multiple>
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
                
                  
                    <div class="col-lg-1 text-right">
                      <button class="btn btn-primary search">Search</button>

                 </div> 

                   
                    </div>
                    <div class="row">
          <div class="col-lg-6 mb-2">
 <input type="button" id="updatebtn" class="btn btn-primary " value="Update">
  
</div>    <div class="col-lg-6 mb-2 text-right">
  
  <button id="export" class="export btn btn-success ">Export</button> 
</div>
</div>
      <div class="table-responsive">
  {{csrf_field()}}
 
  <input type="hidden"  name="count" id="count" >
                <table id="example1"  class=" table table-sm table-bordered table-striped " style="width:100%" >
                  <thead class="thead thead-dark" style="background: ">
                    <tr> 
                      <th>Sno</th>

                        
                          <th>Odr No</th>
                    
                       <th class="px-3">Date Received</th>
                        <th class="px-2" >Date Commited </th>
                         <th >M/C </th>
              <th>Customer</th>
                      <th class="px-4">Product</th>
                    
                        
                         <th>Qty(Kg)</th>
                          <th>Priority</th>
                      
                          <th>Rate</th>
                            <th>Status</th>
                              <th>Type</th>
                              <th>Remarks</th>
                               <th>Polyster Size</th>
                      <th>M_Polyster Size</th>
                      <th>M_BOPP Size</th>
                      <th>Nat. BOPP Size</th>
                        <th>Milky_Poly Size </th>
                         <th>Nat. Poly Size </th>
                         <th>Perilized Size </th>
                          <th>Polyster Wt</th>
                      <th>M_Polyster Wt</th>
                      <th>M_BOPP Wt</th>
                      <th>Nat. BOPP Wt</th>
                        <th>Milky_Poly Wt </th>
                         <th>Nat. Poly Wt </th>
                         <th>Perilized Wt </th>
                         <th style="visibility: hidden;">id</th>
                                       
                      
                     
                    </tr>
                  </thead>
                  <tbody id=showdata>
 
            
                  </tbody>
                </table>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete  PendingOrders</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this  PendingOrders
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->

 

</div> <script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
     
    show_data();
function show_data(){
  let status='';
  let count=0;
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowPendingOrders')?>',
      async:false,
      dataType:'json',
       
        cache:false,
        beforeSend: function(){
 
       
 $(".gif").addClass('d-none');
    },      complete: function(){
      $("#gif").attr('style','display:none');
      },
      success:function(res){
  
       
 $(".gif").addClass('d-none');
      let status;
      let i;
      let color;
      let sno=1;

      let html='';
        $('#example1').DataTable().destroy();

$.each(res,function(i,res){
    
 if(res.status=='Completed'){
  color="background:#28a745;color:white";
 }
 else if(res.status=='In Process'){
  color="background:#ffc107;color:black";
 }
 else if(res.status=='Cancelled'){
  color="background:#dc3545;color:white";
 }
  else if(res.status=='Pending-Lam1' || res.status=='Pending-Lam2' || res.status=='Pending-Slitting' || res.status=='Pending-Pouching' ||  res.status=='Pending-Rewind'){
  color="background:#d484ce;color:white";
 }
else{
  color="";
}

 html+='<tr id='+res.oid+' style="'+color+'">'+        
    '<td>'+sno+'</td>'+
               
            '<td>'+res.oid+'</td>'+
          
             '<td >'+res.date_received+'</td>'+
              '<td>'+res.date_commited+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px!important;">'+res.machine+'</span><select  name="machine['+sno+']""  class="machine" style="width:70px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res.machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
               '<td>'+res.customer_name+'</td>'+
                '<td>'+res.product_name+'</td>'+
                  '<td>'+res.qty+'</td>'+
                    '<td><span style="visibility:hidden;font-size:0px!important;">'+res.priority+'</span><input value='+res.priority+' class="priority"  name="priority" style="width:50px"></td>'+
                      '<td><span style="visibility:hidden;font-size:0px!important;">'+res.rate+'</span><input value='+res.rate+'  class="rate" name="rate['+sno+']"" style="width:70px"></td>'+
                        '<td><span style="visibility:hidden;font-size:0px!important;">'+res.status+'</span><select  name="status['+sno+']" class="status" style="width:100px">'+
                         '<option value="Not Started"  '+(res.status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                         '<option value="Scheduled"  '+(res.status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                            '<option value="In Process"  '+(res.status=='In Process'?'Selected':'')+'>In Process</option>'+

                       '<option value="Released"  '+(res.status=='Released'?'Selected':'')+'>Released</option>'+
                            
                       
                           '<option value="Pending-Lam1"  '+(res.status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res.status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res.status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res.status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res.status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res.status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res.status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                            
                        '</select></td>'+
                '<td>'+res.name+'</td>'+
                     '<td><span style="visibility:hidden;font-size:0px!important;">'+res.remarks+'</span><input value="'+res.remarks+'" class="remarks"  name="remarks['+sno+']" style="width:150px"></td>'+
                  
                '<td>'+res.polyster_size+'</td>'+
                '<td>'+res.m_polyster_size+'</td>'+
                '<td>'+res.m_bopp_size+'</td>'+
                '<td>'+res.bopp_size+'</td>'+
                '<td>'+res.milky_poly_size+'</td>'+
                '<td>'+res.poly+'</td>'+
                '<td>'+res.perilized_size+'</td>'+
                '<td>'+res.total_polyster_wt+'</td>'+
                     '<td>'+res.t_m_polyster_wt+'</td>'+
                '<td>'+res.t_m_bopp_wt+'</td>'+
                '<td>'+res.t_bopp_wt+'</td>'+
                '<td>'+res.t_milky_poly_wt+'</td>'+
                '<td>'+res.total_poly_wt+'</td>'+
                '<td>'+res.t_perilized_wt+'</td>'+
               
                 '<td class="" style="visibility:hidden"><input value="'+res.oid+'" name=id['+sno+']></td>'+
             
                      
                      '</tr>';
                
         
           sno++;
           count++;
        
});
    // $("#gif").attr('style','display:none');

 $('#showdata').html(html);
  $('input[name=count]').val(count);
  $('#example1').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
   dom: 'Bfrtip',
    buttons: [
     'copyHtml5', 'excelHtml5', 'pdf','csv','print'
 ]

       })   
 
        },
        });



      } 


 $('.search').unbind().click(function () {
 count=0;




 var type1=$('select[name=type1]').val();
 var cid1=$('select[name=cid1]').val();
  var priority1=$('select[name=priority1]').val();
   var status1=$('select[name=status1]').val();
 
      var machine1=$('select[name=machine1]').val();
  

     $.ajax({
      type:'ajax',
      method:'get',
 data:{'type1':type1,'cid1':cid1,priority1:priority1,status1:status1,machine1:machine1},
      url:'<?php echo url('admin/FilterOrder')?>',
      async:false,
      dataType:'json',
     success:function(res){

      var status;
      var i;
      var color;
      var sno=1;
      var html='';
       $('#example1').DataTable().destroy();
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

 

 html+='<tr id='+res[i].oid+' style="'+color+'">'+        
    '<td>'+sno+'</td>'+
               
            '<td>'+res[i].oid+'</td>'+
          
             '<td >'+res[i].date_received+'</td>'+
              '<td>'+res[i].date_commited+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].machine+'</span><select  name="machine['+sno+']""  class="machine" style="width:70px"><option value="">Select M/C</option>'+
                    '<?php $qry=DB::table("machine")->get();
                    foreach($qry as $qry){;
                    ?>'+
                        '<option value="<?php echo $qry->machine ?>" '+('<?php echo $qry->machine?>'==res[i].machine?'Selected':'')+'><?php echo $qry->machine ?></option>'+
                       
                              
                        '<?php } ?></select></td>'+
 
               '<td>'+res[i].customer_name+'</td>'+
                '<td>'+res[i].product_name+'</td>'+
                  '<td>'+res[i].qty+'</td>'+
                    '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].priority+'</span><input value='+res[i].priority+' class="priority"  name="priority" style="width:50px"></td>'+
                      '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].rate+'</span><input value='+res[i].rate+'  class="rate" name="rate['+sno+']"" style="width:70px"></td>'+
                        '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].status+'</span><select  name="status['+sno+']" class="status" style="width:100px">'+
                         '<option value="Not Started"  '+(res[i].status=='Not Started'?'Selected':'')+'>Not Started</option>'+
                            '<option value="Scheduled"  '+(res[i].status=='Scheduled'?'Selected':'')+'>Scheduled</option>'+
                            '<option value="In Process"  '+(res[i].status=='In Process'?'Selected':'')+'>In Process</option>'+
                    
                             '<option value="Released"  '+(res[i].status=='Released'?'Selected':'')+'>Released</option>'+
                           '<option value="Pending-Lam1"  '+(res[i].status=='Pending-Lam1'?'Selected':'')+'>Pending-Lam1</option>'+

                           '<option value="Pending-Lam2"  '+(res[i].status=='Pending-Lam2'?'Selected':'')+'>Pending-Lam2</option>'+

                           '<option value="Pending-Slitting"  '+(res[i].status=='Pending-Slitting'?'Selected':'')+'>Pending-Slitting</option>'+

                           '<option value="Pending-Pouching"  '+(res[i].status=='Pending-Pouching'?'Selected':'')+'>Pending-Pouching</option>'+
                              '<option value="Pending-Rewind"  '+(res[i].status=='PendingRewind'?'Selected':'')+'>Pending-Rewind</option>'+
                               '<option value="Completed" '+(res[i].status=='Completed'?'Selected':'')+'>Completed</option>'+
                        
                           '<option value="Cancelled"  '+(res[i].status=='Cancelled'?'Selected':'')+'>Cancelled</option>'+
                              
                        '</select></td>'+
                '<td>'+res[i].name+'</td>'+
                     '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].remarks+'</span><input value="'+res[i].remarks+'" class="remarks"  name="remarks['+sno+']" style="width:150px"></td>'+
                  
                '<td>'+res[i].polyster_size+'</td>'+
                '<td>'+res[i].m_polyster_size+'</td>'+
                '<td>'+res[i].m_bopp_size+'</td>'+
                '<td>'+res[i].bopp_size+'</td>'+
                '<td>'+res[i].milky_poly_size+'</td>'+
                '<td>'+res[i].poly+'</td>'+
                '<td>'+res[i].perilized_size+'</td>'+
                '<td>'+res[i].total_polyster_wt+'</td>'+
                     '<td>'+res[i].t_m_polyster_wt+'</td>'+
                '<td>'+res[i].t_m_bopp_wt+'</td>'+
                '<td>'+res[i].t_bopp_wt+'</td>'+
                '<td>'+res[i].t_milky_poly_wt+'</td>'+
                '<td>'+res[i].total_poly_wt+'</td>'+
                '<td>'+res[i].t_perilized_wt+'</td>'+
               
                 '<td class="" style="visibility:hidden"><input value="'+res[i].oid+'" name=id['+sno+']></td>'+
             
                      
                      '</tr>';
         
           sno++;
           count++;
        
};

 $('#showdata').html(html);
  $('input[name=count]').val(count);
  $('#example1').dataTable({
       "paging": true,
   "lengthChange": false,
   "searching": true,
   "ordering": false,
   "info": true,
   "autoWidth": true,  
   
   dom: 'Bfrtip',
    buttons: [
     'copyHtml5', 'excelHtml5', 'pdf','csv','print'
 ]

       })   
   
          

 
        },
        });
 })

let array=[];



$('#showdata').on('focusout','.priority',function(){ 
var id=$(this).closest('tr').attr('id');
var priority=$(this).val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
var rate=$(this).closest('td').nextAll().find('.rate').val();
var status=$(this).closest('td').nextAll().find('.status').val();
var machine=$(this).closest('td').prevAll().find('.machine').val();
let m=array.filter(list=>list.id==id);
if(m==''){

  array.push({'id':id,'remarks':remarks,'rate':rate,'status':status,'machine':machine,'priority':priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.rate=rate;
m.status=status;
m.machine=machine;
m.priority=priority;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}   

});

$('#showdata').on('focusout','.remarks',function(){
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
var priority=$(this).closest('td').prevAll().find('.priority').val();
var rate=$(this).closest('td').prevAll().find('.rate').val();
var status=$(this).closest('td').prevAll().find('.status').val();
var machine=$(this).closest('td').prevAll().find('.machine').val();
let m=array.filter(list=>list.id==id);
if(m==''){

  array.push({'id':id,'remarks':remarks,'rate':rate,'status':status,'machine':machine,'priority':priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.rate=rate;
m.status=status;
m.machine=machine;
m.priority=priority;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}   

});


$('#showdata').on('change','.status',function(){
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
var rate=$(this).closest('td').prevAll().find('.rate').val();
var priority=$(this).closest('td').prevAll().find('.priority').val();
var machine=$(this).closest('td').prevAll().find('.machine').val();
let m=array.filter(list=>list.id==id);
if(m==''){

  array.push({'id':id,'remarks':remarks,'rate':rate,'status':status,'machine':machine,'priority':priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.rate=rate;
m.status=status;
m.machine=machine;
m.priority=priority;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}   

});



$('#showdata').on('change','.machine',function(){
var id=$(this).closest('tr').attr('id');
var machine=$(this).val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
var rate=$(this).closest('td').nextAll().find('.rate').val();
var priority=$(this).closest('td').nextAll().find('.priority').val();
var status=$(this).closest('td').nextAll().find('.status').val();
let m=array.filter(list=>list.id==id);
if(m==''){

  array.push({'id':id,'remarks':remarks,'rate':rate,'status':status,'machine':machine,'priority':priority});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.rate=rate;
m.status=status;
m.machine=machine;
m.priority=priority;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}   

});


 
$('#reset').unbind().click(function(){

  var url='<?php echo url('admin/ResetPriority/')?>';
  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){
       $('.alert-success').addClass('alert').html('Priority is Set to 0').fadeIn('slow').delay(4000).fadeOut('slow');
       show_data();
      
  
   },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });

})

$('#showdata').on('click','.editdata',function () {

$('#myModal').modal('show'); 
var id=$(this).attr('data');

  var url='<?php echo url('admin/ PendingOrdersEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){


 
$('input[name=id]').val(response.id);
$('input[name=product_name]').val(response.product_name);
$('select[name=customer_id]').val(response.customer_id);
$('select[name=product_type_id]').val(response.product_type_id);
$('input[name=weight]').val(response.weight);

$('input[name=polyster_size]').val(response.polyster_size);
$('input[name=materialized]').val(response.materialized);
$('input[name=polyster_weight]').val(response.polyster_weight);
$('input[name=materialized_weight]').val(response.materialized_weight);
$('input[name=PP]').val(response.PP);
$('input[name=PP_Wt]').val(response.PP_Wt);
$('input[name=poly]').val(response.poly);
$('input[name=poly_weight]').val(response.poly_weight);


$('select[name=status]').val(response.status);
 
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})



$('#showdata').on('click','.deletedata',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');


$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/PendingOrdersDelete/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteModal').modal('hide');
        show_data();
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();

    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});




$('#myform').unbind().on('submit',function (e) {
e.preventDefault();
 $('#example1').DataTable().destroy();
  var data=$('#myform').serialize();
  
  count=0;
$.ajax({
      type:'ajax',
      method:'post',
 data:data,
      url:'<?php echo url('admin/UpdateOrders')?>',
      async:false,
      dataType:'json',
       
      success:function(res){

  
         show_data();
             $('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
          $('#example1').DataTable().draw();
      },
      error:function(){
alert('Some Error');
      }
    })




  });



  $('#updatebtn').unbind().click(function(){



  var url='<?php echo url('admin/UpdateOrders')?>';
 
  $.ajax({
   type:'ajax',
    method:'post',
    data:{array:array},
    url:url,
    async:false,
 dataType:'json',
   
    success:function(response){
 
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();
 show_data();
  $('.search').trigger('click');
array=[]
    },
    error:function(){
         
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
  $(".export").click(function(){
 $('#example1').DataTable().destroy();
  $("#example1").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:" Order Report",

    filename:" Order Report",//do not include extension

    fileext:".csv" // file extension

  });
 $('#example1').DataTable().draw();
    
});
  });
</script>

    @endsection('content')
 

@extends('admin/footer')