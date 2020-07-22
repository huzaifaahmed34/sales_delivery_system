@extends('admin/header')
@extends('admin/sidebar')

@section('content')
<style type="text/css">
 
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- /.content-header -->

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

               <div class="col-lg-4">
                      <div class="form-group">
                
              <select  class="form-control" id="pid" name=pid   >
                <option value="">
                  Select Product Type
                </option>

                     @php
                $qr=DB::table('product_type')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->name}}</option>;
             
              @endforeach
              </select>

                </div>
                    </div>

                                <div class="col-lg-4">
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
                    <div class="col-lg-1">
                      <button class="btn btn-primary search">Search</button>
                 </div>
                    </div>
        
      <div class="table-responsive-sm">
                <table id="example1" class="table table-sm table-bordered table-striped ">
                  <thead class="thead thead-dark" style="overflow: hidden;">
                    <tr>
                      <th>Add</th>
                   <th>S#</th>
   <th>Customer</th>
                      <th>Product</th>
                    
                        <th>Type</th>
                         <th>Per</th>
                               <th>Polyster Size</th>
                      <th>M_Polyster Size</th>
                      <th>M_BOPP Size</th>
                      <th>Nat. BOPP Size</th>
                        <th>Milky_Poly Size </th>
                         <th>Nat. Poly Size </th>
                         <th>Perlized Size </th>
                          <th>Polyster Wt</th>
                      <th>M_Polyster Wt</th>
                      <th>M_BOPP Wt</th>
                      <th>Nat.BOPP Wt</th>
                        <th>Milky_Poly Wt </th>
                         <th>Nat.Poly Wt </th>
                         <th>Perlized Wt </th>

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

 


<!--Edit   Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
         <form id=form1 method="POST" action="<?php echo url('admin/InsertCylinderOrder')?>">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     
        {{csrf_field()}}
        <input type="hidden" name="id">
          <input type="hidden" name="product_type_id">
            <input type="hidden" name="customer_id">
        <div class="row"> 
          <div class="col-lg-2">
                      <div class="form-group">
                   <label>Cylinder Order #</label>
<?php $qry=DB::table('cylinder_order')->select('id')->orderBy('id','desc')->first();
if($qry==''){
  echo '<input type="text"  id="orderid" class="form-control" readonly  value="C1">';
}
else{?>
              <input type="text"  id="orderid" class="form-control" readonly   value="C{{$qry->id+1}}">

<?php
}
?>
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
                   <label>Order Reference</label>

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

              <input type="date" class="form-control" id="date_sent" name=date_sent   value="{{date('Y-m-d')}}">

                </div>
                    </div>
                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>Date Received</label>

              <input type="date" class="form-control" id="date_received" name=date_received   value="{{date('Y-m-d')}}">

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
      
      </div>
      <div class="modal-footer">
         <button type="submit"  id="btnUpdate" class="btn btn-info " >Generate Order</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>  </form>
     

  </div>
</div>


</div>
<script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>
<script>
  $(function(){
      let singleSelect =new MultipleSelect('#pid');
            let singleSelect1 =new MultipleSelect('#cid');
    show_data();
function show_data(){
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowProducts')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        var html='';

      var sno=1;
var i;
  $('#example1').DataTable().destroy();
 for ( i=0; i <res.length; i++) {
   
if(res[i].status==1)
{
 html+='<tr>'+ '<td><a href="javascript:;" class="editdata text-success" style="font-size:30px" data='+res[i].id+'   data1='+res[i].product_type_id+'   data2='+res[i].cid+'  ><i class="fa fa-plus-circle"></i></a></td>'+
 '<td>'+sno+'</td>'+

            '<td>'+res[i].customer_name+'</td>'+
            '<td>'+res[i].product_name+'</td>'+
     
              '<td>'+res[i].name+'</td>'+

 

               '<td>'+res[i].weight+'</td>'+
                '<td>'+res[i].polyster_size+'</td>'+
           
                '<td>'+res[i].m_polyster_size+'</td>'+
                '<td>'+res[i].m_bopp_size+'</td>'+
                '<td>'+res[i].bopp_size+'</td>'+
                '<td>'+res[i].milky_poly_size+'</td>'+
                '<td>'+res[i].poly+'</td>'+
                '<td>'+res[i].perilized_size+'</td>'+
                '<td>'+res[i].polyster_weight+'</td>'+
                '<td>'+res[i].m_polyster_wt+'</td>'+
                '<td>'+res[i].m_bopp_wt+'</td>'+

                '<td>'+res[i].bopp_wt+'</td>'+
                '<td>'+res[i].milky_poly_wt+'</td>'+
                '<td>'+res[i].poly_weight+'</td>'+
                '<td>'+res[i].perilized_wt+'</td>'+
           
         
            '</tr>';
           sno++;
}
        
};
 $('#showdata').html(html);
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

$('#showdata').on('click','.editdata',function () {

$('#myModal').modal('show'); 
var id=$(this).attr('data');

var product_type_id=$(this).attr('data1');
var customer_id=$(this).attr('data2');
 $('input[name=product_type_id]').val(product_type_id); 
  $('input[name=customer_id]').val(customer_id);  
 
 
$('input[name=id]').val(id);
 

  });




 




 $('.search').click(function () {
 
 var id=$('select[name=pid]').val();
 var cid=$('select[name=cid]').val();
 
     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id,'cid':cid},
      url:'<?php echo url('admin/ShowByProduct')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
 
        var html='';

      var sno=1;
var i; 
console.log(res.length);
   if(res.length>0){
 for ( i=0; i <res.length; i++) {
    

if(res[i].status==1)
{

 html+='<tr>'+ '<td><a href=javascript:; style="font-size:30px" data='+res[i].id+'   data1='+res[i].product_type_id+'   data2='+res[i].cid+'  class="editdata text-success"><i class="fa fa-plus-circle"></i></a></td>'+
 '<td>'+sno+'</td>'+

    '<td>'+res[i].customer_name+'</td>'+
            '<td>'+res[i].product_name+'</td>'+
     
              '<td>'+res[i].name+'</td>'+

 

               '<td>'+res[i].weight+'</td>'+
                '<td>'+res[i].polyster_size+'</td>'+
           
                '<td>'+res[i].m_polyster_size+'</td>'+
                '<td>'+res[i].m_bopp_size+'</td>'+
                '<td>'+res[i].bopp_size+'</td>'+
                '<td>'+res[i].milky_poly_size+'</td>'+
                '<td>'+res[i].poly+'</td>'+
                '<td>'+res[i].perilized_size+'</td>'+
                '<td>'+res[i].polyster_weight+'</td>'+
                '<td>'+res[i].m_polyster_wt+'</td>'+
                '<td>'+res[i].m_bopp_wt+'</td>'+

                '<td>'+res[i].bopp_wt+'</td>'+
                '<td>'+res[i].milky_poly_wt+'</td>'+
                '<td>'+res[i].poly_weight+'</td>'+
                '<td>'+res[i].perilized_wt+'</td>'+
           
         
            '</tr>';
           sno++;
}
        
};
 $('#showdata').html(html);

}
else{
  html='<tr><td colspan=10>Not Found </td></tr>';
   $('#showdata').html(html);

}

        },
        });
 })






  $('#form1').on('submit',function(e){
    e.preventDefault();
var id=$('input[name=id]').val();

var qty=$('#qty').val();

  var url='<?php echo url('admin/InsertCylinderOrder')?>';
 
var data=$('#form1').serialize();
if(qty=='' || qty==0){
  alert('Enter Quantity');
}
else{ 
  $.ajax({
   
    method:'post',
    data:data,
    url:url,
 
    async:false,
    success:function(response){

       
            $('#myModal').modal('hide');
     
  
$('.alert-success').addClass('alert').html('Order No '+$('#orderid').val()+' has been Generated').fadeIn().delay(4000).fadeOut();
var dval=$('#orderid').val();
$('#orderid').val(parseInt(dval)+parseInt(1));


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Generated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  
}
  });

  });
</script>

    @endsection('content')
 

@extends('admin/footer')