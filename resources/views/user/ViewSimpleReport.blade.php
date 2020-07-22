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

 
<div class="col-lg-12">
  <label>Show All</label>
  <input type="radio" name="all"  value="" checked="">
<label>Show Pending</label>  <input  name="all" type="radio" value="Pending">
 <label>Show Completed</label>
 <input type="radio" name="all"  value="Completed">
          <div class="row  mt-3 mb-n4">
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
                  

               <select  class="form-control" id="pid" name=pid   >
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
                 <div class="col-lg-1">
                      <div class="form-group">
                  

               <select  class="form-control" id="oid" name=oid   >
                <option value="">
                 Order#
                </option>

                     @php
                $qr=DB::table('orders')->where('is_deleted',0)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->id}}</option>;
             
              @endforeach
              </select>
            </div>

                </div>
                 <div class="col-lg-2">
                      <div class="form-group">
                  

             <input type="date" name="from_date" id="from_date" class="form-control" value="">
             <label>From Date (Dispatch)</label>
            </div>

                </div>

  <div class="col-lg-2">
                      <div class="form-group">
                  

             <input type="date" name="to_date" id="to_date" class="form-control" value="{{date('Y-m-d')}}">
             <label>To Date (Dispatch)</label>
            </div>

                
                </div>

  <div class="col-lg-3">
                      <div class="form-group">
                  

             <button class="btn btn-info search">Search</button>
              <button class="btn btn-success export">Export</button> 
            </div>

                
                </div>

</div>

           
   <div class="table-responsive" >
                <table id="example4" style="overflow:hidden" class="table table-bordered table-striped ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
                
 <th>Sno</th>

                 <th>Status</th> 
                 <th>Odr #</th>
                  <th>Dly #</th>
                       <th >Customer</th>
                        <th >Product</th>
                         <th>Type</th>
                         <th>Order Qty</th>
                           <th>Dispatch Qty</th>
                         
                           
                                    <th class="px-3">Dispatch Date</th>
          <th>Rate</th>
             <th>Net Amount</th>
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

<!-- Delete Modal -->
<div id="dispatchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title"> Order Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to Change Order Status
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDispatch" class="btn btn-primary " >Submit</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> <script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
    
 


    $('.printorder').click(function(){
        
        $("#example4").print({
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







$('#showdata1').unbind().on('click','.dispatchdata',function(){

$('#dispatchModal').modal('show');
var id=$(this).attr('data');

  
$('#btnDispatch').unbind().click(function(){
     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id},
      url:'<?php echo url('admin/OrderCompletion')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
     $('#dispatchModal').modal('hide');
 show_data1();
  
        },
        error:function(){
alert('Data Not Found');

        }

});
   });
 
})








 show_data1();
function show_data1(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowDispatchOrders1')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      let style='';
      var sno=1;
      var html='';
 for ( i=0; i <res.length; i++) {
  
  if(res[i].dispatch_date!=null){
var str=res[i].dispatch_date.split(',');

str=str.join('/');
}
else{
  str='Not Dispatched';
}

if(res[i].status=='Completed'){
 html+='<tr style="background:#189835;color:white"> '+        
   '<td>'+sno+'</td>'+

'<td> '+res[i].status+'</td>'+
              '<td>'+res[i].id+'</td>'+
            '<td>'+res[i].did+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
             '<td>'+(res[i].dispatch_qty).toFixed(1)+'</td>'+
          
                 
                '<td >'+str+'</td>'+
                   '<td >'+res[i].rate+'</td>'+
                      '<td >'+(res[i].rate*res[i].dispatch_qty).toFixed(1)+'</td>'+
                      
                      '</tr>';
}
else{
   html+='<tr  > '+        
   '<td>'+sno+'</td>'+

'<td> '+res[i].status+'</td>'+
              '<td>'+res[i].id+'</td>'+
            '<td>'+res[i].did+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
             '<td>'+(res[i].dispatch_qty).toFixed(1)+'</td>'+
          
                 
                '<td >'+str+'</td>'+
                   '<td >'+res[i].rate+'</td>'+
                      '<td >'+(res[i].rate*res[i].dispatch_qty).toFixed(1)+'</td>'+
                      
                      '</tr>';

}                
         
           sno++;
         $('#showdata1').html(html);
};


        },
        });



      }
 


 
 $('.search').click(function () {
  var cid=$('#cid').val();
    var pid=$('#pid').val();
        var from_date=$('#from_date').val();
     var to_date=$('#to_date').val();
     var oid=$('#oid').val();
 var all=$('input[name=all]:checked').val();


     $.ajax({
      type:'ajax',
      method:'get',
 data:{'cid':cid,'oid':oid,'pid':pid,'to_date':to_date,'from_date':from_date,'all':all},
      url:'<?php echo url('admin/SimpleReportFilter')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
  var status;
      var i;
      var sno=1;
      var html='';
var style='';
 for ( i=0; i <res.length; i++) {
  $('#example4').DataTable().destroy();
  if(res[i].dispatch_date!=null){
var str=res[i].dispatch_date.split(',');

str=str.join('/');
}
else{
  str='Not Dispatched';
}
if(res[i].status=='Completed'){
 html+='<tr style="background:#189835;color:white"> '+        
   '<td>'+sno+'</td>'+

'<td> '+res[i].status+'</td>'+
              '<td>'+res[i].id+'</td>'+
            '<td>'+res[i].did+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
             '<td>'+(res[i].dispatch_qty).toFixed(1)+'</td>'+
          
                 
                '<td >'+str+'</td>'+
                   '<td >'+res[i].rate+'</td>'+
                      '<td >'+(res[i].rate*res[i].dispatch_qty).toFixed(1)+'</td>'+
                      
                      '</tr>';
}
else{
   html+='<tr  > '+        
   '<td>'+sno+'</td>'+

'<td> '+res[i].status+'</td>'+
              '<td>'+res[i].id+'</td>'+
            '<td>'+res[i].did+'</td>'+
            
 
               '<td>'+res[i].customer_name+'</td>'+

                '<td>'+res[i].product_name+'</td>'+

                '<td>'+res[i].name+'</td>'+
                    '<td>'+res[i].qty+'</td>'+
             '<td>'+(res[i].dispatch_qty).toFixed(1)+'</td>'+
          
                 
                '<td >'+str+'</td>'+
                   '<td >'+res[i].rate+'</td>'+
                      '<td >'+(res[i].rate*res[i].dispatch_qty).toFixed(1)+'</td>'+
                      
                      '</tr>';

}                
         
           sno++;
         $('#showdata1').html(html);
};
$('#example4').DataTable().draw();
}
 

        
        });
 })



      $(".export").click(function(){
 $('#example4').DataTable().destroy();
  $("#example4").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:"Simple;,.'' Order Report",

    filename:"Simple Order Report",//do not include extension

    fileext:".csv" // file extension

  });
 $('#example4').DataTable().draw();
});
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

 



});
</script>





     @endsection('content')
 

@extends('admin/footer')