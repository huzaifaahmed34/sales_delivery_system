@extends('admin/header')
@extends('admin/sidebar')

@section('content')

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
        
      <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead class="thead thead-dark">
                    <tr>
                      <th>S#</th>

                      <th>Customers Name</th>
                         <th> Email</th>
                            <th>Phone #</th>
                               <th>City</th>
                                  <th>Address</th>
                                       <th style="width:100px">Status</th>
                       <th>Action</th>
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
           <h4 class="modal-title">Delete Customers</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Customers
     
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
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Edit Customer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=form1>
        {{csrf_field()}}
        <input type="hidden" name="id">
        <div class="row"> 
          <div class="col-lg-6">
                      <div class="form-group">
                   <label>Customer Name</label>

              <input type="text" class="form-control" id="name" name=customer_name placeholder="Enter Customers Name" value={{@$Customers}}>

                </div>
                    </div>
                   
                                <div class="col-lg-6">
                      <div class="form-group">
                   <label>Email</label>

              <input type="email" class="form-control" id="email" name=email placeholder="Enter Customers Email" value={{@$Customers}}>

                </div>
                    </div>
                   
                                <div class="col-lg-6">
                      <div class="form-group">
                   <label>Phone #</label>

              <input type="text" class="form-control" id="phone" name=phone placeholder="Enter Customers Phone No" value={{@$Customers}}>

                </div>
                    </div>
                                <div class="col-lg-6">
                      <div class="form-group">
                   <label>City</label>

              <input type="text" class="form-control" id="city" name=city placeholder="Enter Customers Name" value={{@$Customers}}>

                </div>
                    </div>
                    
                   
                                <div class="col-lg-6">
                      <div class="form-group">
                   <label>Address</label>

              <textarea type="textar" class="form-control" id="address" name=address value={{@$Customers}}>
</textarea>
                </div>
                    </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                   <label>Status</label>

            <select name='status' id=status  class="form-control">
              <option value=1>Active</option>
              <option value=0>In-Active</option>
            </select>

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


</div>
<script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
    show_data();
function show_data(){
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowCustomers')?>',
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
             '<td>'+res[i].email+'</td>'+
              '<td>'+res[i].phone+'</td>'+

               '<td>'+res[i].city+'</td>'+
                '<td>'+res[i].address+'</td>'+
                 '<td >'+status+'</td>'+
           
            '<td><a href=javascript:; data='+res[i].id+' class=editdata><i class="fa fa-edit"></i></a> &nbsp;'+
            // '<a href=javascript:; data='+res[i].id+'  class="deletedata text-danger"><i class="fa fa-trash"></i></a></td>'+
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

  var url='<?php echo url('admin/CustomersEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){

$('input[name=id]').val(response.id);
$('input[name=customer_name]').val(response.customer_name);
$('input[name=email]').val(response.email);
$('input[name=phone]').val(response.phone);
$('input[name=city]').val(response.city);
$('select[name=status]').val(response.status);
$('textarea[name=address]').val(response.address);
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
  var url='<?php echo url('admin/CustomersDelete/')?>/'+id+'';

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

  var url='<?php echo url('admin/CustomersUpdate')?>';
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