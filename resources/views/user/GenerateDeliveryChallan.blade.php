@extends('admin/header')
@extends('admin/sidebar')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-12">
          <div class="card">
         

            <div class="card-body">
       
              <div class="col-lg-12  alert-success">
     
              </div>
        
      <div class="col-lg-12  alert-danger">

              </div>
                <div class="row">

            
                    <div class="col-lg-3">
                 </div>
                                <div class="col-lg-5">
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
                    </div>
        
      <div class="table-responsive-sm ">
                <table id="example1" class="table table-sm table-bordered table-bDelivery Challaned table-striped ">
                  <thead class="thead thead-dark">
                    <tr>
                      <th>Add</th>
                      <th>S#</th>

                 <th>Order #</th>
                       <th>Customer Name</th>
                        <th >Date</th>
                         <th>Product Name</th>
                           <th>Qty</th>
                            <th> Weight</th>
                             <th>Polyster Wt</th>
                      <th>M_Polyster Wt</th>
                      <th>M_BOPP Wt</th>
                      <th>Nat. BOPP Wt</th>
                        <th>Milky_Poly Wt </th>
                         <th>Nat. Poly Wt </th>
                         <th>Perilized Wt </th>
                    </tr>
                  </thead>
                  <tbody id=showdata >

                  
            
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
         <form id=form1 method="POST" action="<?php echo url('admin/InsertDeliveryChallan')?>">
      <div class="modal-header">
           <h4 class="modal-title">Enter Bag Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
           <div class="row"> 
              <div class="col-lg-2">
        <b>Order No : </b><span id="product_name"></span><br>
   
        {{csrf_field()}}
        <input type="hidden" name="id">
          <input type="hidden" name="product_id">
       
            <input type="hidden" name="rollshidden">
            <input type="hidden" name="customer_id">
     
                  <label>Bags</label>
          <input type="radio" name="bag_item" id=bag_item checked="" value="bag">
          <label>Rolls</label>
          <input type="radio" name="bag_item" id=roll_item value="rolls">
        </div>
  
          <div class="col-lg-1">
                      <div class="form-group">
                   <label>Dly No</label>
<?php $res=DB::table('delivery_challan')->orderBy('id','desc')->first();

$id='';
if($res!=''){
    $id=$res->id+1;
}else{
     $id=1;
}
?>
              <input type="text" placeholder="" id=delivery_id class="form-control" readonly="" value="{{$id}}" >

                </div>
                    </div>
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>Rate</label>

              <input type="number" class="form-control" id="rate" name=rate placeholder="Enter rate"  >

                </div>
                    </div>
          <div class="col-lg-2 rolldiv ml-5" style="display:none">
                      <div class="form-group">
                   <label>Rolls Qty</label>

              <input type="number" value="Rolls" class="form-control"  id="bag" name=bag >

                </div>
                    </div>
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>Gross Weight</label>

              <input type="number" class="form-control" id="gross_wt" name=gross_wt placeholder="Kg"  >

                </div>
                    </div>
                      <div class="col-lg-2" id="core_wtdiv">
                      <div class="form-group">
                   <label>Empty/Core Wt</label>

              <input type="number" class="form-control" id="core_wt" name=core_wt placeholder="Kg"  >

                </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Remarks</label>

              <input type="text"  class="form-control" id="remarks" name=remarks>

                </div>
                    </div>
                             <div class="col-lg-2" id="netdiv">
                      <div class="form-group">
                   <label>Net Weight</label>

              <input type="number" value=0 readonly class="form-control" id="net_wt" name=net_wt>

                </div>
                    </div>
 
                    <div class="col-lg-12 headerdiv" style="display:none" >
                   
                      <h5>Enter Core Details : </h5>
                       <hr>
                  </div>
                         <div class="col-lg-2 ml-5" id="corediv" style="display:none">
                      <div class="form-group">
                   <label>Qty</label>

              <input type="number" value=0  class="form-control" id="core_qty" name=core_qty>

                </div>
                    </div>
                      <div class="col-lg-2" id="corediv1" style="display:none">
                      <div class="form-group">
                   <label>Core No</label>

              <input type="number" value=0  class="form-control" id="core_no" name=core_no>

                </div>
                    </div>
                      <div class="col-lg-2" id="corediv2" style="display:none">
                      <div class="form-group">
                   <label>Core Wt</label>

              <input type="number" value=0  class="form-control" id="core_wt_rolls" name=core_wt_rolls>

                </div>
                    </div>
                      <div class="col-lg-1">
                      <div class="form-group">
                  <button type="button" id="btnadd" style="margin-top: 32px;padding-bottom: 8px;padding-top: 8px" class=" btn btn-primary btn-sm">ADD</button>
                </div>
                    </div>
                            
     
                    
                   
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <th>Sno</th>
                  <th >Bag/Core Detail</th>
                    <th id=qty style="display:none">Rolls Qty</th>
                   <th id=coreth style="display: none">Core No</th>
                 
                    <th id="gors">Gross Weight</th>
                      <th>Core Weight</th>

                      <th id="net">Net Weight</th>
                       


              </thead>
              <tbody id="showdata1"></tbody>
              <tfoot id="showrolls" style="display:none">
                <tr><td></td>
                  <td><b>Gross Wt</b></td>
                  <td id="total_gross_wt" style="font-weight: bold"></td>
                  <td></td>
                </tr>
                <tr><td></td>
                  <td><b>Total Core Wt</b></td>
                  <td id="total_core_wt" style="font-weight: bold"></td>
                  <td></td>
                </tr>
                 <tr><td></td>
                  <td><b>Net Wt</b></td>
                  <td id="total_net_wt" style="font-weight: bold"></td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
      <div class="row directdiv" >
<div class="col-lg-12 text-center">
  <hr>
        <h5>OR Direct Dispatch Bags/Rolls</h5>
      </div>
      
           <div class="col-lg-3">
                      <div class="form-group">
                   <label>Dispatch Qty</label>

              <input type="number"  class="form-control" id="directqty" name=directqty>

                </div>
                    </div>
           <div class="col-lg-3">
                      <div class="form-group">
                   <label>Dispatch Weight</label>

              <input type="number"  class="form-control" id="directwt" name=directwt>

                </div>
                    </div>
           <div class="col-lg-3">
                      <div class="form-group">
                   <label>Remarks</label>

              <input type="text"  class="form-control" id="directremarks" name=directremarks>

                </div>
                    </div>
                         <div class="col-lg-3" style="margin-top: 30px">
                      <div class="form-group">
                 
            <button  type=button class="btn btn-danger directdispatch">Direct Dispatch</button>
                </div>
                    </div>
      
      </div>
      </div>
      <div class="modal-footer">
         <button type="submit"  id="btnUpdate" class="btn btn-info " >Generate Delivery Challan</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>  </form>
     

  </div>
</div>


</div>
<script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
    show_data();



dcount=0;


    
function show_data(){
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowPendingOrders')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        var html='';

      var sno=1;
var i;

     $('#example1').DataTable().destroy();
 for ( i=0; i <res.length; i++) {
  
 
 html+='<tr>'+ 
 '<td><a href="javascript:;" class="editdata text-success" style="font-size:30px" data='+res[i].oid+'   data1='+res[i].pid+'    data2='+res[i].cid+' data3='+res[i].delivery_rate+' ><i class="fa fa-plus-circle"></i></a></td>'+
 '<td>'+sno+'</td>'+
  '<td>'+res[i].oid+'</td>'+

               
             '<td>'+res[i].customer_name+'</td>'+
              '<td style=width:100px>'+res[i].date_commited+'</td>'+

             '<td>'+res[i].product_name+'</td>'+
              '<td>'+res[i].qty+'</td>'+
        '<td>'+res[i].weight +'</td>'+
        '<td>'+res[i].total_polyster_wt+'</td>'+
                     '<td>'+res[i].t_m_polyster_wt+'</td>'+
                '<td>'+res[i].t_m_bopp_wt+'</td>'+
                '<td>'+res[i].t_bopp_wt+'</td>'+
                '<td>'+res[i].t_milky_poly_wt+'</td>'+
                '<td>'+res[i].total_poly_wt+'</td>'+
                '<td>'+res[i].t_perilized_wt+'</td>'+
       
           
         
            '</tr>';
           sno++;

        
};
 $('#showdata').html(html);

 $('#example1').DataTable().draw();
        },
        });



      }
 
$("#gross_wt").keyup(function(){
var gross_wt=$(this).val();

 let core=$('input[name=core_wt]').val();
 
 
$('input[name=net_wt]').val(gross_wt-core);
});
 
$("#core_wt").keyup(function(){
var core_wt=$(this).val();

 let gross=$('input[name=gross_wt]').val();
 $('input[name=net_wt]').val(gross-core_wt);
 

});




$('#showdata').on('click','.editdata',function () {

$('#myModal').modal('show'); 
var id=$(this).attr('data');
var product_id=$(this).attr('data1');
var customer_id=$(this).attr('data2');
var delivery_rate=$(this).attr('data3');
 $('input[name=product_id]').val(product_id); 
  $('input[name=customer_id]').val(customer_id);  
   $('#product_name').html(id);
$('input[name=id]').val(id);
$('input[name=rate]').val(delivery_rate);

  });








 $('select[name=cid]').change(function () {
  var cid=$(this).val();


 var id=$('select[name=pid]').val();
 
     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id,'cid':cid},
      url:'<?php echo url('admin/CustomerSearch')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
 
        var html='';

      var sno=1;
var i;  
   if(res.length>0){

     $('#example1').DataTable().destroy();
 for ( i=0; i <res.length; i++) {
    
 
 html+='<tr>'+ '<td><a href=javascript:; style="font-size:30px" data='+res[i].oid+'   data1='+res[i].pid+'   data2='+res[i].cid+'  class="editdata text-success"><i class="fa fa-plus-circle"></i></a></td>'+
 '<td>'+sno+'</td>'+
 
  '<td>'+res[i].oid+'</td>'+

               
             '<td>'+res[i].customer_name+'</td>'+
              '<td style=width:100px>'+res[i].date_commited+'</td>'+

             '<td>'+res[i].product_name+'</td>'+
                  '<td>'+res[i].qty+'</td>'+
        '<td>'+res[i].weight +'</td>'+
        '<td>'+res[i].total_polyster_wt+'</td>'+
                     '<td>'+res[i].t_m_polyster_wt+'</td>'+
                '<td>'+res[i].t_m_bopp_wt+'</td>'+
                '<td>'+res[i].t_bopp_wt+'</td>'+
                '<td>'+res[i].t_milky_poly_wt+'</td>'+
                '<td>'+res[i].total_poly_wt+'</td>'+
                '<td>'+res[i].t_perilized_wt+'</td>'+       
            '</tr>';
           sno++;

        
};
 $('#showdata').html(html);

     $('#example1').DataTable().draw();
}
else{
  html='<tr><td colspan=10>Not Found </td></tr>';
   $('#showdata').html(html);

}

        },
        });
 })


 
var list=[];

var list1=[];
$('#showdata1').on('click', '.delete', function() {
    $(this).parent().parent('tr').remove();
var m=$(this).parent().parent('tr').attr('id');
 
if(list[m][0]==m){
   
list[m]=[];
}; 

});



var count=0;
var count1=0;
var add1=1;
var add2=1;
var total_core_wt=0;
var total_qty=0;

$('.directdispatch').unbind().click(function(){
var qty=$('input[name=directqty]');
var wt=$('input[name=directwt');
var remarks=$('input[name=directremarks]');
var id=$('input[name=id]').val();
var product_id=$('input[name=product_id]').val();
var cid=$('input[name=customer_id]').val();
var item=$('input[name=bag_item]:checked').val();
var r='';
if(qty.val()==''){
qty.addClass('is-invalid');
}
else{
qty.removeClass('is-invalid');
r+='1';
}
if(wt.val()==''){
wt.addClass('is-invalid');
}
else{
wt.removeClass('is-invalid');
r+='1';
}
if(remarks.val()==''){
remarks.addClass('is-invalid');
}
else{
r+='1';
remarks.removeClass('is-invalid');
}
if(r=='111'){
     var url='<?php echo url('admin/InsertDirectDelivery')?>';
  
  $.ajax({
   
    method:'get',
    data:{id:id,cid:cid,product_id:product_id,remarks:remarks.val(),qty:qty.val(),wt:wt.val(),item:item},
    url:url,
  

 
    async:false,
    success:function(response){
      dcount++;
list=[];
list1=[];
count1=[];
add1=1;
add2=1;
total_core_wt=0;
total_qty=0;
count=0;
var dval=$('#delivery_id').val();

$('input[name=bag_item][value=bag]').prop('checked','checked');
$('.rolldiv').attr('style','display:none');
  $('input[name=rate]').removeAttr('readonly','true'); 
 $('.headerdiv').attr('style','display:none');
   $('#bag').removeAttr('readonly','true');
$('#gross_wt').removeAttr('readonly','true');
$('#remarks').removeAttr('readonly','true');
  $('#gors').removeAttr('style','display:none');
$('#net').removeAttr('style','display:none');
$('#netdiv').removeAttr('style','display:none');
$('#showrolls').attr('style','display:none');
$('#qty').attr('style','display:none');
 
$('#corediv').attr('style','display:none');
$('#corediv1').attr('style','display:none');
$('#core_wtdiv').removeAttr('style','display:none');
$('#coreth').attr('style','display:none');
 
$('#corediv2').attr('style','display:none');
 $('#btnadd').removeAttr('disabled','true');

$('#showdata1 tr').remove();

       
            $('#myModal').modal('hide');
     
  
$('.alert-success').addClass('alert').html('Delivery Challan # '+$('#delivery_id').val()+' Generated Successfully').fadeIn().delay(4000).fadeOut();
 
$('#delivery_id').val(parseInt(dval)+parseInt(1));
 

    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Generated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });

}
});













$('#core_qty').keyup(function(){

  var tot=$('input[name=bag]').val();
  var dif=tot-total_qty-$(this).val();
  console.log(dif);
if(dif<0){
  $('#btnadd').attr('disabled','true');
}
else{
   $('#btnadd').removeAttr('disabled','true');
}

});


$('input[name=bag_item]').change(function(){
var val=$(this).val();
count=0;
count1=0;
add1=1;
add2=1;


if(val=='bag'){
   
$('.rolldiv').attr('style','display:none');

   $('#bag').removeAttr('readonly','true');
$('#gross_wt').removeAttr('readonly','true');
  $('#gors').removeAttr('style','display:none');
$('#net').removeAttr('style','display:none');
$('#netdiv').removeAttr('style','display:none');
$('#showrolls').attr('style','display:none');
$('#qty').attr('style','display:none');
 $('#remarks').removeAttr('readonly','true');
$('#corediv').attr('style','display:none');
$('#corediv1').attr('style','display:none');
$('#core_wtdiv').removeAttr('style','display:none');
$('#coreth').attr('style','display:none');
  $('input[name=rate]').removeAttr('readonly','true');
$('#corediv2').attr('style','display:none');
 $('#btnadd').removeAttr('disabled','true'); 
 $('.headerdiv').attr('style','display:none');
}
else{
   $('.headerdiv').removeAttr('style','display:none');
$('#netdiv').attr('style','display:none');
$('.rolldiv').removeAttr('style','display:none');
  $('#gors').attr('style','display:none');
$('#net').attr('style','display:none');
$('#showrolls').removeAttr('style','display:none');
$('#qty').removeAttr('style','display:none'); 
$('#corediv').removeAttr('style','display:none');
$('#core_wtdiv').attr('style','display:none');
  $('input[name=rate]').removeAttr('readonly','true');
$('#corediv1').removeAttr('style','display:none');
$('#corediv2').removeAttr('style','display:none');
 
$('#coreth').removeAttr('style','display:none');
 
}
});
  $('#btnadd').unbind().on('click',function(){
 var val=$('input[name=bag_item]:checked').val();
 
 if(val=='bag'){

  list1=[];
  $('#gors').removeAttr('style','display:none');

$('#net').removeAttr('style','display:none');
    if(  $('#core_wt').val()=='' || $('#gross_wt').val()=='' || $('#net_wt').val()=='' ){

          
 

      if($('#core_wt').val()=='' ){
        $('#core_wt').addClass('is-invalid');
      }

      else{
         $('#core_wt').removeClass('is-invalid');
      }

      if($('#gross_wt').val()=='' ){
        $('#gross_wt').addClass('is-invalid');
      }

      else{
         $('#gross_wt').removeClass('is-invalid');
      }

      if($('#net_wt').val()=='' ){
        $('#net_wt').addClass('is-invalid');
      }

      else{
         $('#net_wt').removeClass('is-invalid');
      }
    }
    else{

   $('#bag').removeAttr('readonly','true');

   $('#showrolls').attr('style','display:none');

$('#gross_wt').removeAttr('readonly','true');
var bag='Bag'+add1;
add1++;
 
var core=$('#core_wt').val();
var gross=$('#gross_wt').val();
var net=$('#net_wt').val();  
var remarks=$('#remarks').val(); 
var rate=$('#rate').val(); 

 var i=0;

list.push([count,bag,gross,core,net,remarks,rate]);
   $('input[name=remarks]').attr('readonly','true');
    $('input[name=rate]').attr('readonly','true');
        var html='';
var sno=0;
          for(i=0; i<list.length; i++){
                  sno++
        if(list[i]==''){

        }else{  
            html +='<tr id='+list[i][0]+'>'+
            '<td>'+sno+'</td>'+
                            '<td >'+list[i][1]+'</td>'+
                               '<td >'+list[i][2]+'</td>'+
                                 '<td >'+list[i][3]+'</td>'+
                                   '<td >'+list[i][4]+'</td>'+
                        
        //     '<td>' +'<button type="button "class="btn btn-danger btn-sm delete">' +'Remove' +
        // '</button>' +'</td>' +
        '</tr>';
            }     
          
              
          }  
   count++;
 $("#showdata1").html(html);

   
 $('#bag').val('');
$('#core_wt').val('');
 $('#gross_wt').val('');
 $('#net_wt').val(0);
 // console.log(list);

  
}


}

else
{
list=[];






if(  $('#core_qty').val()==''  || $('#core_no').val()==''  || $('#remarks').val()=='' || $('#bag').val()=='' || $('#gross_wt').val()=='' ){

          
 

      if($('#core_qty').val()=='' ){
        $('#core_qty').addClass('is-invalid');
      }

      else{
         $('#core_qty').removeClass('is-invalid');
      }
     if($('#gross_wt').val()=='' ){
        $('#gross_wt').addClass('is-invalid');
      }

      else{
         $('#gross_wt').removeClass('is-invalid');
      }

        if($('#bag').val()=='' ){
        $('#bag').addClass('is-invalid');
      }

      else{
         $('#bag').removeClass('is-invalid');
      }


      if($('#core_no').val()=='' ){
        $('#core_no').addClass('is-invalid');
      }

      else{
         $('#core_no').removeClass('is-invalid');
      }
         if($('#remarks').val()=='' ){
        $('#remarks').addClass('is-invalid');
      }

      else{
         $('#remarks').removeClass('is-invalid');
      }
    }
    else{

      var qty=$('input[name=core_qty]').val();   
total_qty+=parseInt(qty);

if(total_qty>$('input[name=bag]').val()){
  $('#btnadd').attr('disabled','true');
  alert('Rolls Completed');
}
else{
   $('#btnadd').removeAttr('disabled','true');


$('#gors').attr('style','display:none');
$('#net').attr('style','display:none'); 
 
   $('#bag').attr('readonly','true');
   $('#gross_wt').attr('readonly','true');
$('#showrolls').removeAttr('style','display:none');
 
   
var bag='Core'+add2;
add2++;
var qty=$('#bag').val(); 
var core=$('#core_wt_rolls').val();
var gross=$('#gross_wt').val();
var net=$('#net_wt').val();  
var remarks=$('#remarks').val();
var core_no=$('#core_no').val();
var rate=$('#rate').val();
var roll_qty=$('#core_qty').val();
var core_wt_rolls=$('#core_wt_rolls').val();
$('input[name=rollshidden]').val(total_qty);
 var i=0;
 total_core_wt+=(parseFloat(core)*parseFloat(roll_qty));
$('#total_gross_wt').html(gross);
$('#total_core_wt').html(total_core_wt);
$('#total_net_wt').html(gross-total_core_wt);
list1.push([count,bag,gross,core*roll_qty,gross-total_core_wt,remarks,qty,roll_qty,core_no,core_wt_rolls,rate]);
   $('input[name=remarks]').attr('readonly','true');
    $('input[name=rate]').attr('readonly','true');
        var html='';
var sno=0;
          for(i=0; i<list1.length; i++){
                  sno++
        if(list1[i]==''){

        }else{  
            html +='<tr id='+list1[i][0]+'>'+
            '<td>'+sno+'</td>'+
                            '<td >'+list1[i][1]+'</td>'+
                             '<td >'+list1[i][7]+'</td>'+
                              '<td >'+list1[i][8]+'</td>'+
                                
                                 '<td >'+list1[i][9]+'</td>'+
                                   
                        
        //     '<td>' +'<button type="button "class="btn btn-danger btn-sm delete">' +'Remove' +
        // '</button>' +'</td>' +
        '</tr>';
            }     
          
              
          }  
   count1++;
 $("#showdata1").html(html);

    
$('#core_wt').val('');
  
 // console.log(list);

  
}

}





}


  })






  $('#form1').on('submit',function(e){
    e.preventDefault();
var id=$('input[name=id]').val();
var product_id=$('input[name=product_id]').val();
var cid=$('input[name=customer_id]').val();
 
  var url='<?php echo url('admin/InsertDeliveryChallan')?>';
  
  $.ajax({
   
    method:'get',
    data:{list:list,list1:list1,id:id,cid:cid,product_id:product_id},
    url:url,
  

 
    async:false,
    success:function(response){
      dcount++;
list=[];
list1=[];
count1=[];
add1=1;
add2=1;
total_core_wt=0;
total_qty=0;
count=0;
var dval=$('#delivery_id').val();

$('input[name=bag_item][value=bag]').prop('checked','checked');
$('.rolldiv').attr('style','display:none');
  $('input[name=rate]').removeAttr('readonly','true');

   $('#bag').removeAttr('readonly','true');
$('#gross_wt').removeAttr('readonly','true');
$('#remarks').removeAttr('readonly','true');
  $('#gors').removeAttr('style','display:none');
$('#net').removeAttr('style','display:none');
$('#netdiv').removeAttr('style','display:none');
$('#showrolls').attr('style','display:none');
$('#qty').attr('style','display:none'); 
 $('.headerdiv').attr('style','display:none');
$('#corediv').attr('style','display:none');
$('#corediv1').attr('style','display:none');
$('#core_wtdiv').removeAttr('style','display:none');
$('#coreth').attr('style','display:none');
 
$('#corediv2').attr('style','display:none');
 $('#btnadd').removeAttr('disabled','true');

$('#showdata1 tr').remove();

       
            $('#myModal').modal('hide');
     
  
$('.alert-success').addClass('alert').html('Delivery Challan # '+$('#delivery_id').val()+' Generated Successfully').fadeIn().delay(4000).fadeOut();
 
$('#delivery_id').val(parseInt(dval)+parseInt(1));
 

    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Generated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
 
  });
  });
</script>

    @endsection('content')
 

@extends('admin/footer')