@extends('admin/header')
@extends('admin/sidebar')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

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
                
              <select  class="form-control" id="supplier_id" name=supplier_id   >
                <option value="">
                  Select Cylinder Supplier
                </option>

                     @php
                $qr=DB::table('cylinder_supplier')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->supplier_name}}</option>;
             
              @endforeach
              </select>

                </div>
                    </div>

                                <div class="col-lg-2">
                      <div class="form-group">
                  
               <select  class="form-control" id="cid" name=cid   >
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
                  
               <select  class="form-control" id="type" name=type   >
                <option value="">
                  Select Type
                </option>

                    
                <option value="New">New</option>
                 <option value="Repair">Repair</option>;
              
              </select>
            </div>

                </div>
                   <div class="col-lg-2">
                      <div class="form-group">
                  
               <select  class="form-control" id="status" name=status   >
                <option value="">
                  Select Status
                </option>

                 

                <option value="Sent To Supplier">Sent To Supplier</option>
                 <option value="Received From Supplier">Received From Supplier</option>;
              
              </select>
            </div>

                </div>
                    <div class="col-lg-1">
                      <button class="btn btn-primary search">Search</button>
                 </div> 
                  <div class="col-lg-3 text-right">
                     <button id="export" class="export btn btn-success btn-md">Export</button>
                 </div>  
                    </div>
        

          <form id="myform">
      <div class="table-responsive">
  {{csrf_field()}}
 <input type="button" id="updatebtn" class="btn btn-info mb-2" value="Update">
  
  <input type="hidden"  name="count" id="count" >
                <table id="example1"  class=" table table-sm table-bordered table-striped " style="width:100%" >
                  <thead class="thead thead-dark" style="background: ">
                    <tr> 
                      <th>Sno</th>

                        
                          <th>Cyl. Odr No</th>
                    
                       <th>Order Ref</th>
                        <th class="px-4">Cylinder Supplier </th>
                         
              <th >Customer</th>
                      <th  class="px-5">Product</th>
                      
                         <th >Type</th>
                         <th>Mat Type</th>  
                         <th>Qty</th>
                           <th>Cyl. Size</th>
                         
                            <th>Status</th>
                          <th style="padding-left:30px;padding-right: 32px; ">Date Sent</th>
                      
                           <th style="padding-left:26px;padding-right: 10px; ">Expected Rec. Date</th>
                                 <th style="padding-left:26px;padding-right: 10px; ">Date Received</th>
                                   <th>Remarks</th>
                                 <th class="noExl">Action</th>
                            
                         <th class="noExl" style="visibility: hidden;">id</th>
                                       
                      
                     
                    </tr>
                  </thead>
                  <tbody id=showdata>
 
            
                  </tbody>
                </table>
                </div>
</form>
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
           <h4 class="modal-title">Delete Cylinder Orderr</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Cylinder Order
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->


<!--Edit   Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Edit Cylinder Order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=form1>
        {{csrf_field()}}
        <input type="hidden" name="id">
         <input type="hidden" name="customer_id">
        <div class="row"> 
                           <div class="col-lg-3">
                      <div class="form-group">
                     <label>  Product</label>
              <select  class="form-control" id="product_id" name=product_id   required>
                <option value="">
                  Select Product
                </option>

                     @php
                $qr=DB::table('product')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->product_name}}</option>;
             
              @endforeach
              </select>

                </div>
                    </div>
                           <div class="col-lg-3">
                      <div class="form-group">
                     <label> Cylinder Supplier</label>
              <select  class="form-control" id="supplier_id" name=supplier_id   required>
                <option value="">
                  Select Cylinder Supplier
                </option>

                     @php
                $qr=DB::table('cylinder_supplier')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->supplier_name}}</option>;
             
              @endforeach
              </select>

                </div>
                    </div>
          <div class="col-lg-2">
                      <div class="form-group">
                   <label>Order Ref</label>

              <input type="text" class="form-control" id="order_reference" name=order_reference  required>

                </div>
                    </div>
         <div class="col-lg-2">
                      <div class="form-group">
                   <label>Mat Type</label>
 <select name="mat_type" class="form-control" required>
   <option value="">Select Type</option>
    <option value="Nylon">Nylon</option>
     <option value="Cylinder">Cylinder</option>
 </select>

                </div>
                    </div>
          <div class="col-lg-2" >
                      <div class="form-group">
                   <label>Type</label>
 <select name="type" class="form-control" required>
   <option value="">Select Type</option>
    <option value="New">New</option>
     <option value="Repair">Repair</option>
 </select>

                </div>
                    </div>

          <div class="col-lg-1">
                      <div class="form-group">
                   <label>Qty</label>

              <input type="number" class="form-control" id="qty" name=qty   value="1">

                </div>
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Cylinder Size</label>

              <input type="text" class="form-control" id="size" name=size  required="">

                </div>
                    </div>
                  
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>Date Sent</label>

              <input type="date" class="form-control" id="date_sent" name=date_sent   >

                </div>
                    </div>
                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>Date Received</label>

              <input type="date" class="form-control" id="date_received" name=date_received    >

                </div>
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Expected Rec. Date</label>

              <input type="date" class="form-control" id="expected_date" name=expected_date placeholder="Expected Rec. Date"  required>

                </div>
                    </div>
                   
                        <div class="col-lg-3">
                      <div class="form-group">
                   <label>Remarks</label>

              <input type="text" class="form-control" id="remarks" name=remarks placeholder="Enter Remarks"  required>

                </div>
              </div>
                   
          </div>
        </form>
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnUpdate" class="btn btn-info " >Update</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 

</div> <script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
    show_data();
function show_data(){
  var status='';
  var count=0;
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowCylinderOrders')?>',
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

 if(res[i].status=='Received From Supplier'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='Sent To Supplier'){
  color="background:#ffc107;color:black";
 }
 

 html+='<tr id='+res[i].oid+'  style='+color+'>'+        
    '<td>'+sno+'</td>'+
   

               
            '<td>C'+res[i].oid+'</td>'+
          
             '<td >'+res[i].order_reference+'</td>'+
              '<td>'+res[i].supplier_name+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+
                '<td>'+res[i].product_name+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].type+'</span><select  name="type['+sno+']"" class="type" style="width:60px">'+
                   '<option value="" >Select Type</option>'+
                        '<option value="New" '+(res[i].type=='New'?'Selected':'')+'>New</option>'+
                         '<option value="Repair"  '+(res[i].type=='Repair'?'Selected':'')+'>Repair</option>'+
                         
                        '</select></td>'+
                      '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].mat_type+'</span><select  name="mat_type['+sno+']""  class="mat_type">'+
                   '<option value="">Select</option>'+
                        '<option value="Nylon" '+(res[i].mat_type=='Nylon'?'Selected':'')+'>Nylon</option>'+
                         '<option value="Cylinder"  '+(res[i].mat_type=='Cylinder'?'Selected':'')+'>Cylinder</option>'+
                         
                        '</select></td>'+
                    
                      '<td>'+res[i].qty+'</td>'+
                       '<td>'+res[i].size+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].status+'</span><select  name="status['+sno+']""   class="status" style="width:100px">'+
                         '<option value="">Select Status</option>'+
                        '<option value="Sent To Supplier" '+(res[i].status=='Sent To Supplier'?'Selected':'')+'>Sent To Supp</option>'+
                         '<option value="Received From Supplier"  '+(res[i].status=='Received From Supplier'?'Selected':'')+'>Rec From Supp</option>'+
                         
                        '</select></td>'+
                
                     '<td>'+res[i].date_sent+'</td>'+
                    
                     '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].expected_date+'</span><input type="date"  class="expected_date" value='+res[i].expected_date+' name="expected_date['+sno+']"" style="width:125px"></td>'+
                       '<td>'+res[i].date_received+'</td>'+
                    '<td><span style="visibility:hidden;font-size:0px!important;" >'+res[i].remarks+'</span><input value='+res[i].remarks+'   class="remarks" name="remarks['+sno+']"" style="width:200px"></td>'+
              
            '<td><a href=javascript:; data='+res[i].oid+' class=editdata><i class="fa fa-edit"></i></a> &nbsp;'+
            '<a href=javascript:; data='+res[i].oid+'  class="deletedata text-danger"><i class="fa fa-trash"></i></a></td>'+
               
                 '<td class="noExl" style="visibility:hidden"><input value="'+res[i].oid+'" name=id['+sno+']></td>'+
             
                      
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



      }
 

$('#product_id').change(function(){
var pid=$(this).val();

     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':pid},
      url:'<?php echo url('admin/changeProduct')?>',
      async:false,
      dataType:'json',
     success:function(res){
      $('input[name=customer_id]').val(res.customer_id);
      },
    });

});


 $('.search').unbind().click(function () {
 count=0;
 var supplier_id=$('select[name=supplier_id]').val();
 var cid=$('select[name=cid]').val();
  var type=$('select[name=type]').val();
   var status=$('select[name=status]').val();
  

     $.ajax({
      type:'ajax',
      method:'get',
 data:{'supplier_id':supplier_id,'cid':cid,type:type,status:status},
      url:'<?php echo url('admin/FilterCorder')?>',
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
 

 if(res[i].status=='Received From Supplier'){
  color="background:#28a745;color:white";
 }
 else if(res[i].status=='Sent To Supplier'){
  color="background:#ffc107;color:black";
 }
 html+='<tr id='+res[i].oid+'  style='+color+' >'+        
    '<td>'+sno+'</td>'+
   

               
            '<td>C'+res[i].oid+'</td>'+
          
             '<td >'+res[i].order_reference+'</td>'+
              '<td>'+res[i].supplier_name+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+
                '<td>'+res[i].product_name+'</td>'+
                  '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].type+'</span><select  name="type['+sno+']"" class="type" style="width:60px">'+
                   '<option value="" >Select Type</option>'+
                        '<option value="New" '+(res[i].type=='New'?'Selected':'')+'>New</option>'+
                         '<option value="Repair"  '+(res[i].type=='Repair'?'Selected':'')+'>Repair</option>'+
                         
                        '</select></td>'+
                      '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].mat_type+'</span><select  name="mat_type['+sno+']""  class="mat_type">'+
                   '<option value="">Select</option>'+
                        '<option value="Nylon" '+(res[i].mat_type=='Nylon'?'Selected':'')+'>Nylon</option>'+
                         '<option value="Cylinder"  '+(res[i].mat_type=='Cylinder'?'Selected':'')+'>Cylinder</option>'+
                         
                        '</select></td>'+
                    
                      '<td>'+res[i].qty+'</td>'+
                       '<td>'+res[i].size+'</td>'+
                        '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].status+'</span><select  name="status['+sno+']""   class="status" style="width:100px">'+
                         '<option value="">Select Status</option>'+
                        '<option value="Sent To Supplier" '+(res[i].status=='Sent To Supplier'?'Selected':'')+'>Sent To Supp</option>'+
                         '<option value="Received From Supplier"  '+(res[i].status=='Received From Supplier'?'Selected':'')+'>Rec From Supp</option>'+
                         
                        '</select></td>'+
                
                     '<td>'+res[i].date_sent+'</td>'+
                    
                     '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].expected_date+'</span><input type="date"  class="expected_date" value='+res[i].expected_date+' name="expected_date['+sno+']"" style="width:125px"></td>'+
                       '<td>'+res[i].date_received+'</td>'+
                    '<td><span style="visibility:hidden;font-size:0px!important;">'+res[i].remarks+'</span><input value='+res[i].remarks+'   class="remarks" name="remarks['+sno+']"" style="width:200px"></td>'+
              
            '<td><a href=javascript:; data='+res[i].oid+' class=editdata><i class="fa fa-edit"></i></a> &nbsp;'+
            '<a href=javascript:; data='+res[i].oid+'  class="deletedata text-danger"><i class="fa fa-trash"></i></a></td>'+
               
                 '<td class="noExl" style="visibility:hidden"><input value="'+res[i].oid+'" name=id['+sno+']></td>'+
             
                      
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




$('#showdata').on('click','.editdata',function () {

$('#myModal').modal('show'); 
var id=$(this).attr('data');

  var url='<?php echo url('admin/CylinderOrderEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){

  
$('input[name=id]').val(response.oid);
$('input[name=qty]').val(response.qty);

$('input[name=date_sent]').val(response.date_sent);
$('input[name=date_received]').val(response.date_received);
$('input[name=expected_date]').val(response.expected_date);
$('input[name=remarks]').val(response.remarks);

$('input[name=size]').val(response.size);

$('input[name=customer_id]').val(response.cid);
$('input[name=order_reference]').val(response.order_reference);
$('select[name=mat_type]').val(response.mat_type);
$('select[name=type]').val(response.type);
$('select[name=product_id]').val(response.product_id);
$('select[name=supplier_id]').val(response.sid);
 
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})




let array=[];

$('#showdata').on('change','.type',function(){ 
var id=$(this).closest('tr').attr('id');
var type=$(this).val();
var mat_type=$(this).closest('td').nextAll().find('.mat_type').val();
  
var status=$(this).closest('td').nextAll().find('.status').val();
var expected_date=$(this).closest('td').nextAll().find('.expected_date').val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'type':type,'mat_type':mat_type,'status':status,'expected_date':expected_date,'remarks':remarks});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.type=type;
m.status=status;
m.mat_type=mat_type;
m.expected_date=expected_date;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});



$('#showdata').on('change','.mat_type',function(){ 
var id=$(this).closest('tr').attr('id');
var mat_type=$(this).val();
var type=$(this).closest('td').prevAll().find('.type').val();
  
var status=$(this).closest('td').nextAll().find('.status').val();
var expected_date=$(this).closest('td').nextAll().find('.expected_date').val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'type':type,'mat_type':mat_type,'status':status,'expected_date':expected_date,'remarks':remarks});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.type=type;
m.status=status;
m.mat_type=mat_type;
m.expected_date=expected_date;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});


$('#showdata').on('change','.status',function(){ 
var id=$(this).closest('tr').attr('id');
var status=$(this).val();
var type=$(this).closest('td').prevAll().find('.type').val();
  
var mat_type=$(this).closest('td').prevAll().find('.mat_type').val();
var expected_date=$(this).closest('td').nextAll().find('.expected_date').val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'type':type,'mat_type':mat_type,'status':status,'expected_date':expected_date,'remarks':remarks});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.type=type;
m.status=status;
m.mat_type=mat_type;
m.expected_date=expected_date;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});



$('#showdata').on('focusout','.expected_date',function(){ 
var id=$(this).closest('tr').attr('id');
var expected_date=$(this).val();
var type=$(this).closest('td').prevAll().find('.type').val();
  
var mat_type=$(this).closest('td').prevAll().find('.mat_type').val();
var status=$(this).closest('td').prevAll().find('.status').val();
var remarks=$(this).closest('td').nextAll().find('.remarks').val();
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'type':type,'mat_type':mat_type,'status':status,'expected_date':expected_date,'remarks':remarks});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.type=type;
m.status=status;
m.mat_type=mat_type;
m.expected_date=expected_date;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});


$('#showdata').on('focusout','.remarks',function(){ 
var id=$(this).closest('tr').attr('id');
var remarks=$(this).val();
var type=$(this).closest('td').prevAll().find('.type').val();
  
var mat_type=$(this).closest('td').prevAll().find('.mat_type').val();
var status=$(this).closest('td').prevAll().find('.status').val();
var expected_date=$(this).closest('td').prevAll().find('.expected_date').val();
let m=array.filter(list=>list.id==id);

if(m==''){

  array.push({'id':id,'type':type,'mat_type':mat_type,'status':status,'expected_date':expected_date,'remarks':remarks});

}
else{
   m=m.reduce(items=>{
    return items;
   })
m.remarks=remarks;
m.type=type;
m.status=status;
m.mat_type=mat_type;
m.expected_date=expected_date;
let n=array.filter(list=>list.id!=id);

array=[...n,m];
}    
});














$('#showdata').on('click','.deletedata',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');


$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/CylinderOrderDelete/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteModal').modal('hide');
        show_data();
        $('#cid').val('');
           $('#supplier_id').val('');
            $('#type').val('');
                $('#status').val('');
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();

    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});

  $('#btnUpdate').unbind().click(function(){
var id=$('input[name=id]').val();

  var url='<?php echo url('admin/CylinderOrderUpdate')?>';
var data=$('#form1').serialize();
  $.ajax({
   
    method:'post',
    data:data,
    url:url,
 
    async:false,
    success:function(response){

       
            $('#myModal').modal('hide');
        show_data();
 $('#cid').val('');
           $('#supplier_id').val('');
            $('#type').val('');
                $('#status').val('');
  
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
  

  $('#updatebtn').unbind().click(function(){
 
$('#example1').DataTable().destroy();
 
  count=0;
$.ajax({
      type:'ajax',
      method:'post',
 data:{array:array},
      url:'<?php echo url('admin/UpdateCylinderOrders')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
$('#example1').DataTable().draw();
      $('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
         show_data();
         array=[];
       $('.search').trigger('click');
      },
      error:function(){
alert('Some Error');
      }
    })




  });



$(".export").click(function(){
 $('#example1').DataTable().destroy();
  $("#example1").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:"Cylinder Order Report",

    filename:"Cylinder Order Report",//do not include extension

    fileext:".csv" // file extension

  });
 $('#example1').DataTable().draw();
    
});


 
  });
</script>

    @endsection('content')
 

@extends('admin/footer')