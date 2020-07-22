@extends('admin/header')
@extends('admin/sidebar')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
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
        
      <div class="table-responsive">
                <table id="example1"  class=" table  table-striped " style="width:100%" >
                  <thead class="thead thead-dark" style="background: ">
                    <tr>  
  <th>Sno</th>
                        
                        <th>Order No</th>
                       
                     
                    
                       <th>Date Received</th>
                        <th>Date Commited </th>
                         <th> Customer Name</th>
                            <th> Product Name</th>
                               <th>Product Type</th>
                                <th>QTY</th>
                                  <th>Weight</th>
                                  <th>Polister Size</th>
                                    <th>Polister Weight</th>
                                  <th>Materialized</th>
                                    <th>Materialized Weight</th>
                                      <th>Poly </th>
                                    <th>Poly Weight</th>
                                     <th>PP </th>
                                    <th>PP WT</th>
                                       
                      
                     
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
           <h4 class="modal-title">Delete Completed Orders</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Completed Orders
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->

 
</div>
 <script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
    show_data();
function show_data(){
  var status='';
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowCompletedOrder')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      var status;
      var i;
      var sno=1;
      var html='';
 for ( i=0; i <res.length; i++) {
     $('#example1').DataTable().destroy();
 

 html+='<tr>'+        
  '<td>'+sno+'</td>'+
   
             
            '<td>'+res[i].oid+'</td>'+
           
             '<td>'+res[i].date_received+'</td>'+
              '<td>'+res[i].date_commited+'</td>'+
 
               '<td>'+res[i].customer_name+'</td>'+
                '<td>'+res[i].product_name+'</td>'+
                '<td>'+res[i].name+'</td>'+
                     '<td>'+res[i].qty+'</td>'+
                '<td>'+res[i].weight+'</td>'+
                '<td>'+res[i].polyster_size+'</td>'+
                '<td>'+res[i].total_polyster_wt+'</td>'+
              '<td>'+res[i].materialized+'</td>'+
                  '<td>'+res[i].total_materialized_wt+'</td>'+
                   '<td>'+res[i].poly+'</td>'+
                    '<td>'+res[i].total_poly_wt+'</td>'+
                      '<td>'+res[i].PP+'</td>'+
                         '<td>'+res[i].total_PP_Wt+'</td>'+
                      '</tr>';
                
         
           sno++;
        
};
 $('#showdata').html(html);

 $('#example1').DataTable().draw();
        },
        });



      }

$('#showdata').on('click','.pending',function(){
  var id=$(this).attr('data');
 
  var url='<?php echo url('admin/OrderPending')?>';

  $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){

 show_data();
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });

})




$('#showdata').on('click','.status',function(){
  var id=$(this).attr('data');
 
  var url='<?php echo url('admin/OrderCompleted')?>';

  $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){

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

  var url='<?php echo url('admin/Completed OrdersEdit/')?>/'+id+'';

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
  var url='<?php echo url('admin/Completed OrdersDelete/')?>/'+id+'';

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

  $('#btnUpdate').unbind().click(function(){
var id=$('input[name=id]').val();

  var url='<?php echo url('admin/Completed OrdersUpdate')?>';
var data=$('#form1').serialize();
  $.ajax({
   
    method:'post',
    data:data,
    url:url,
 
    async:false,
    success:function(response){

       
            $('#myModal').modal('hide');
        show_data();

  
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
  });
</script>

    @endsection('content')
 

@extends('admin/footer')