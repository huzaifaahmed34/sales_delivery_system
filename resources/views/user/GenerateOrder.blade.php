@extends('admin/header')
@extends('admin/sidebar')

@section('content')
<style type="text/css">
  .form-group{
    margin-bottom:0!important;

}
.a{
  height: 30px!important;
}
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
        
      <div class="table-responsive">
                <table id="example1" class="table table-sm table-bordered table-striped ">
                  <thead class="thead thead-dark"  >
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
                         <th>Nat.Poly Size </th>
                         <th>Perlized Size </th>
                          <th>Polyster Wt</th>
                      <th>M_Polyster Wt</th>
                      <th>M_BOPP Wt</th>
                      <th>Nat. BOPP Wt</th>
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


<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Product
     
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
         <form id=form1 method="POST" action="<?php echo url('admin/InsertOrder')?>">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
        <b>Product Name : </b><span id="product_name"></span>
   
        {{csrf_field()}}
        <input type="hidden" name="id">
          <input type="hidden" name="product_type_id">
            <input type="hidden" name="customer_id">
        <div class="row"> 
          <div class="col-lg-2">
                      <div class="form-group">
                   <label>Order No</label>
<?php $qry=DB::table('orders')->select('id')->orderBy('id','desc')->first();
if($qry==''){
  echo '<input type="number"  id="orderid" class="form-control" readonly   value="1">';
}
else{?>
              <input type="number"  id="orderid" class="form-control" readonly   value="{{$qry->id+1}}">

<?php
}
?>
                </div>
                    </div>
                     <input type="hidden" class="form-control"  name="weight" id="weight">
          <div class="col-lg-2">
                      <div class="form-group">
                   <label>Quantity</label>

              <input type="number" class="form-control" id="qty" name=qty   value="1">

                </div>
                    </div>
                  
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>Receive Date</label>

              <input type="date" class="form-control" id="date_received" name=date_received   value="{{date('Y-m-d')}}">

                </div>
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Delivery Date</label>

              <input type="date" class="form-control" id="date_commited" name=date_commited placeholder="Enter Product Name"  required>

                </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                   <label>Rate</label>

              <input type="number" class="form-control" id="rate" name=rate placeholder="Enter Rate"  required>

                </div>
                    </div>
                        <div class="col-lg-2">
                      <div class="form-group">
                   <label>Remarks</label>

              <input type="text" class="form-control" id="remarks" name=remarks placeholder="Enter Remarks"  required>

                </div>
              </div>
                             
               <div class="col-lg-2">
                      <div class="form-group">
                   <label>Polyster Size</label>

              <input type="text" class="form-control a" id="polyster_size" name=polyster_size placeholder="Polyster Size" readonly="">

                </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Polyster Wt</label>

              <input type="number" class="form-control a" id="polyster_wt" name=polyster_wt placeholder="Polyster Weight"  readonly="">

                </div>
                    </div>
                    <div class="col-lg-8">
                    </div>
                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_Polyster Size</label>

             
              <input type="text" class="form-control a" id="m_polyster_size" name=m_polyster_size placeholder="M_Polyster Size"  readonly="">
                </div>
                    </div>       
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_Polyster Wt</label>

              <input type="number" class="form-control a" id="m_polyster_wt" name=m_polyster_wt placeholder="M_Polyster Weight"  readonly="">

                </div>
                    </div>
                     <div class="col-lg-8">
                    </div>
                 
                        <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_BOPP Size</label>
          <input type="text" class="form-control a" id="m_bopp_size" name=m_bopp_size placeholder="M_Bopp Size"   readonly="">

                </div>
                    </div>
  
                        <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_BOPP Wt</label>

              <input type="number" class="form-control a" id="m_bopp_wt" name=m_bopp_wt placeholder="M_Bopp Weight"  readonly="">

                </div>
                    </div>                        
                      <div class="col-lg-8">
                    </div>
                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. BOPP Size</label>
   
              <input type="" class="form-control a" id="bopp_size" name=bopp_size placeholder="Bopp Size"   readonly="">
                </div>
                    </div>

                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. BOPP Wt</label>

              <input type="number" class="form-control a" id="bopp_wt" name=bopp_wt placeholder="Bopp Wt"  readonly="">

                </div>
                    </div>
                       <div class="col-lg-8">
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Milky Poly Size</label>

                <input type="" class="form-control a" id="milky_poly_size" name=milky_poly_size placeholder="Milky Poly Size" readonly="">
                </div>
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Milky Poly Wt</label>

              <input type="number" class="form-control a" id="milky_poly_wt" name=milky_poly_wt placeholder="Milky Poly Weight"   readonly="">

                </div>
                    </div>
                    <div class="col-lg-8">
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. Poly Size</label>
   
    <input type="text" class="form-control a" id="poly_size" name=poly_size placeholder="Poly Size"   readonly="">

                </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. Poly Wt</label>

              <input type="number" class="form-control a" id="poly_wt" name=poly_wt placeholder="Poly Weight"   readonly="">

                </div>
                    </div>
                       <div class="col-lg-8">
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Perlized Size</label>
   <input type="text" class="form-control a" id="perilized_size" name=perilized_size placeholder="Perilized Size"  readonly="">
             

                </div>
                    </div>
                              
           
                   
                   
                    
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Perlized Wt</label>

              <input type="number" class="form-control a" id="perilized_wt" name=perilized_wt placeholder="Perilized Weight" readonly="">

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

let m,p,weight,pp,polyster_weight,M_POLYSTER_WT,M_BOPP_WT,BOPP_WT,poly_weight,MILKY_POLY_WT,PERILIZED_WT;
$("#qty").keyup(function(){
var qty=$(this).val();

// let m=$('input[name=materialized_weight]').val();
// let p=$('input[name=polyster_weight]').val();

// let weight=$('input[name=weight]').val();
$('input[name=polyster_wt]').val(((polyster_weight*qty)/weight).toFixed(2));
$('input[name=m_polyster_wt]').val(((M_POLYSTER_WT*qty)/weight).toFixed(2));
 
$('input[name=m_bopp_wt]').val(((M_BOPP_WT*qty)/weight).toFixed(2));
$('input[name=bopp_wt]').val(((BOPP_WT*qty)/weight).toFixed(2));
$('input[name=poly_wt]').val(((poly_weight*qty)/weight).toFixed(2));
$('input[name=milky_poly_wt]').val(((MILKY_POLY_WT*qty)/weight).toFixed(2));
 
  $('input[name=perilized_wt]').val(((PERILIZED_WT*qty)/weight).toFixed(2));

 
});

$('#showdata').on('click','.editdata',function () {

$('#myModal').modal('show'); 
var id=$(this).attr('data');

var product_type_id=$(this).attr('data1');
var customer_id=$(this).attr('data2');
 $('input[name=product_type_id]').val(product_type_id); 
  $('input[name=customer_id]').val(customer_id);  
   var url='<?php echo url('admin/ProductsEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){
 
$('input[name=id]').val(id);
$('#product_name').html(response.product_name);
 
 weight=response.weight; 
 polyster_weight=response.polyster_weight;
M_POLYSTER_WT=response.M_POLYSTER_WT;
M_BOPP_WT=response.M_BOPP_WT;
BOPP_WT=response.BOPP_WT;
poly_weight=response.poly_weight;
MILKY_POLY_WT=response.MILKY_POLY_WT;
 
PERILIZED_WT=response.PERILIZED_WT;

$('input[name=polyster_size]').val(response.polyster_size);
$('input[name=polyster_wt]').val((response.polyster_weight/response.weight).toFixed(2));
$('input[name=m_polyster_size]').val(response.M_POLYSTER_SIZE);
$('input[name=m_polyster_wt]').val((response.M_POLYSTER_WT/response.weight).toFixed(2));
$('input[name=m_bopp_size]').val(response.M_BOPP_SIZE);
$('input[name=m_bopp_wt]').val((response.M_BOPP_WT/response.weight).toFixed(2));
$('input[name=bopp_size]').val(response.BOPP_SIZE);
$('input[name=bopp_wt]').val((response.BOPP_WT/response.weight).toFixed(2));
$('input[name=milky_poly_size]').val(response.MILKY_POLY_SIZE);
 
$('input[name=milky_poly_wt]').val((response.MILKY_POLY_WT/response.weight).toFixed(2));
$('input[name=poly_size]').val(response.poly);
 $('input[name=poly_wt]').val((response.poly_weight/response.weight).toFixed(2));
 $('input[name=perilized_size]').val(response.PERILIZED_SIZE);
  $('input[name=perilized_wt]').val((response.PERILIZED_WT/response.weight).toFixed(2));
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });


  });






//  $('select[name=pid]').change(function () {
//   var id=$(this).val();


//  var cid=$('select[name=cid]').val();
 
//      $.ajax({
//       type:'ajax',
//       method:'get',
//  data:{'id':id,'cid':cid},
//       url:'<?php echo url('admin/ShowByProduct')?>',
//       async:false,
//       dataType:'json',
       
//       success:function(res){
//         var html='';

//       var sno=1;
// var i; 
//    if(res.length!=0){
//  for ( i=0; i <res.length; i++) {
    
// if(res[i].status==1)
// {
//  html+='<tr>'+ '<td><a href=javascript:; style="font-size:30px" data='+res[i].id+'   data1='+res[i].product_type_id+'   data2='+res[i].cid+'  class="editdata text-success"><i class="fa fa-plus-circle"></i></a></td>'+
//  '<td>'+sno+'</td>'+

//                   '<td>'+res[i].product_name+'</td>'+
//              '<td>'+res[i].customer_name+'</td>'+
//               '<td>'+res[i].name+'</td>'+

//                '<td>'+res[i].weight+'</td>'+
//                        '<td><b>'+res[i].polyster_size+'</b></td>'+
//                 '<td>'+res[i].polyster_weight+' Kg</td>'+
//                 '<td><b>'+res[i].materialized+'</b></td>'+
//                 '<td>'+res[i].materialized_weight+' Kg</td>'+
//                 '<td><b>'+res[i].poly+'</b></td>'+
//                 '<td>'+res[i].poly_weight+' Kg</td>'+
//                 '<td><b>'+res[i].PP+'</b></td>'+
//                 '<td>'+res[i].PP_Wt+' Kg</td>'+
           
         
//             '</tr>';
//            sno++;
// }
        
// };
// }
// else{
//   html='<tr><td colspan=10>Not Found</td></tr>';
// }
//  $('#showdata').html(html);
 
//         },
//         });
//  })












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

  var url='<?php echo url('admin/InsertOrder')?>';
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