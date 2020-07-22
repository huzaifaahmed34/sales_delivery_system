@extends('admin/header')
@extends('admin/sidebar')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style type="text/css">
   
  </style>

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
        
      <div class="table-responsive">
                <table id="example1"  class="table  table-sm table-bordered table-hovered  table-striped w-100"  style="background: ">
                  <thead class="thead thead-dark">
                    <tr>
                      <th scope="col">S#</th>
   <th scope="col">Customer</th>
                      <th scope="col">Product</th>
                    
                        <th scope="col">Type</th>
                         <th scope="col">Per</th>
                               <th scope="col">Polyster Size</th>
                      <th scope="col">M_Polyster Size</th>
                      <th scope="col">M_BOPP Size</th>
                      <th scope="col">Nat. BOPP Size</th>
                        <th scope="col">Milky_Poly Size </th>
                         <th scope="col">Nat. Poly Size </th>
                         <th scope="col">Perlized Size </th>
                          <th scope="col">Polyster Wt</th>
                      <th scope="col">M_Polyster Wt</th>
                      <th scope="col">M_BOPP Wt</th>
                      <th scope="col">Nat. BOPP Wt</th>
                        <th scope="col">Milky_Poly Wt </th>
                         <th scope="col">Nat. Poly Wt </th>
                         <th scope="col">Perlized Wt </th>
                         
                                       <th scope="col" style="width:100px">Status</th>
                       <th scope="col">Action</th>
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
           <h4 class="modal-title">Delete Products</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Products
     
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
           <h4 class="modal-title">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=form1>
        {{csrf_field()}}
        <input type="hidden" name="id">
        <div class="row"> 
     
                 
                                <div class="col-lg-3">
                      <div class="form-group">
                   <label>  Select Product Type</label>

              <select  class="form-control" id="product_type_id" name=product_type_id   >
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
                   
                                <div class="col-lg-3">
                      <div class="form-group">
                   <label>   Select Customer</label>

               <select  class="form-control" id="customer_id" name=customer_id   >
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
                   <label>Products Name</label>

              <input type="text" class="form-control" id="product_name" name=product_name placeholder="Enter Products Name" value={{@$Products}}>

                </div>
                    </div>
                                <div class="col-lg-2">
                      <div class="form-group">
                   <label>Weight(Kg)</label>

              <input type="number" class="form-control" id="weight" name=weight placeholder="Enter Weight" value={{@$Products}}>

                </div>
                    </div> 

      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Status</label>

            <select name='status' id=status  class="form-control">
              <option value=1>Active</option>
              <option value=0>In-Active</option>
            </select>

                </div>
                    </div>
                                              <div class="col-lg-2">
                      <div class="form-group">
                   <label>Polyster Size</label>
    <select  class="form-control" id="polyster_size" name=polyster_size   >
              
                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
               <?php
               if($q->Polyster_size!=''){?>
                <option value="{{$q->Polyster_size}}">{{$q->Polyster_size}}</option>;
             <?php
           }
             ?>
              @endforeach
              </select>

                </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Polyster Wt</label>

              <input type="number" class="form-control" id="polyster_wt" name=polyster_wt placeholder="Polyster Weight" value={{@$Products}}>

                </div>
                    </div>
                    <div class="col-lg-8">
                    </div>
                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_Polyster Size</label>

                   <select  class="form-control" id="m_polyster_size" name=m_polyster_size   >
                

                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
                <?php
               if($q->M_Polyster_size!=''){?>
                <option value="{{$q->M_Polyster_size}}">{{$q->M_Polyster_size}}</option>;
             <?php 
}
             ?>
              @endforeach
              </select>

                </div>
                    </div>       
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_Polyster Wt</label>

              <input type="number" class="form-control" id="m_polyster_wt" name=m_polyster_wt placeholder="M_Polyster Weight" value={{@$Products}}>

                </div>
                    </div>
                     <div class="col-lg-8">
                    </div>
                 
                        <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_BOPP Size</label>
    <select  class="form-control" id="m_bopp_size" name=m_bopp_size   >
                

                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
                <?php
               if($q->M_Bopp_size!=''){?>

                <option value="{{$q->M_Bopp_size}}">{{$q->M_Bopp_size}}</option>;
             <?php }
             ?>
              @endforeach
              </select>

                </div>
                    </div>
  
                        <div class="col-lg-2">
                      <div class="form-group">
                   <label>M_BOPP Wt</label>

              <input type="number" class="form-control" id="m_bopp_wt" name=m_bopp_wt placeholder="M_Bopp Weight" value={{@$Products}}>

                </div>
                    </div>                        
                      <div class="col-lg-8">
                    </div>
                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. BOPP Size</label>
    <select  class="form-control" id="bopp_size" name=bopp_size   >
       

                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
                 <?php
               if($q->Bopp_size!=''){?>
                <option value="{{$q->Bopp_size}}">{{$q->Bopp_size}}</option>;
              <?php }
              ?>
              @endforeach
              </select>

                </div>
                    </div>

                       <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. BOPP Wt</label>

              <input type="number" class="form-control" id="bopp_wt" name=bopp_wt placeholder="Bopp Wt" value={{@$Products}}>

                </div>
                    </div>
                       <div class="col-lg-8">
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Milky Poly Size</label>

                  <select  class="form-control" id="milky_poly_size" name=milky_poly_size   >
               
                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
                <?php
               if($q->Milky_Poly_size!=''){?>
                <option value="{{$q->Milky_Poly_size}}">{{$q->Milky_Poly_size}}</option>;
             <?php } ?>
              @endforeach
              </select>

                </div>
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Milky Poly Wt</label>

              <input type="number" class="form-control" id="milky_poly_wt" name=milky_poly_wt placeholder="Milky Poly Weight" value={{@$Products}}>

                </div>
                    </div>
                    <div class="col-lg-8">
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. Poly Size</label>
   <select  class="form-control" id="poly_size" name=poly_size   >
             
                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
                <?php
               if($q->Poly_size!=''){?>
                <option value="{{$q->Poly_size}}">{{$q->Poly_size}}</option>;
             <?php } ?>
              @endforeach
              </select>

                </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Nat. Poly Wt</label>

              <input type="number" class="form-control" id="poly_wt" name=poly_wt placeholder="Poly Weight" value={{@$Products}}>

                </div>
                    </div>
                       <div class="col-lg-8">
                    </div>
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Perilized Size</label>
 <select  class="form-control" id="perilized_size" name=perilized_size   >
                

                     @php
                $qr=DB::table('size')->get();
                  @endphp
                @foreach($qr as $q )
                  <?php
               if($q->Perilized_size!=''){?>
                <option value="{{$q->Perilized_size}}">{{$q->Perilized_size}}</option>;
             <?php } ?>
              @endforeach
              </select>
             

                </div>
                    </div>
                              
           
                   
                   
                    
                      <div class="col-lg-2">
                      <div class="form-group">
                   <label>Perlized Wt</label>

              <input type="number" class="form-control" id="perilized_wt" name=perilized_wt placeholder="Perilized Weight" value={{@$Products}}>

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
 for ( i=0; i <res.length; i++) {
     $('#example1').DataTable().destroy();
if(res[i].status==1)
{status='<a href="#"  class="btn btn-success btn-xs" disabled>Active</a>'

}
else{
  status='<a href="#"  class="btn btn-danger btn-xs" disabled>Inactive</a>'
  }

 html+='<tr>'+
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

                 '<td >'+status+'</td>'+
           
            '<td><a href=javascript:; data='+res[i].id+' class=editdata><i class="fa fa-edit"></i></a> &nbsp;'+
            '<a href=javascript:; data='+res[i].id+'  class="deletedata text-danger"><i class="fa fa-trash"></i></a></td>'+
            '</tr>';
           sno++;
        
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

  var url='<?php echo url('admin/ProductsEdit/')?>/'+id+'';

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

$('input[name=polyster_wt]').val(response.polyster_weight);
 
 $('input[name=m_polyster_wt]').val(response.M_POLYSTER_WT);
 $('input[name=m_bopp_wt]').val(response.M_BOPP_WT);
 $('input[name=bopp_wt]').val(response.BOPP_WT);

 $('input[name=poly_wt]').val(response.poly_weight);
 $('input[name=perilized_wt]').val(response.PERILIZED_WT);
 $('input[name=milky_poly_wt]').val(response.MILKY_POLY_WT);
 
$('select[name=polyster_size]').val(response.polyster_size);
$('select[name=m_polyster_size]').val(response.M_POLYSTER_SIZE);
$('select[name=m_bopp_size]').val(response.M_BOPP_SIZE);
$('select[name=bopp_size]').val(response.BOPP_SIZE);
$('select[name=milky_poly_size]').val(response.MILKY_POLY_SIZE);
 
$('select[name=poly_size]').val(response.poly);
$('select[name=perilized_size]').val(response.PERILIZED_SIZE);
     


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
  var url='<?php echo url('admin/ProductsDelete/')?>/'+id+'';

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

  var url='<?php echo url('admin/ProductsUpdate')?>';
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