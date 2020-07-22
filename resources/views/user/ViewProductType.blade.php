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
           

            <div class="card-body">
       
              <div class="col-lg-12  alert-success">
     
              </div>
        
      <div class="col-lg-12  alert-danger">

              </div>
        
      
                <table id="example1" class="table table-bordered table-striped ">
                  <thead class="thead thead-dark">
                    <tr>
                      <th>S#</th>

                      <th>Product Type Name</th>
                      <th>status</th>
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
  </section>


<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete ProductType</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this ProductType
     
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
           <h4 class="modal-title">Edit Product Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=form1>
        {{csrf_field()}}
        <input type="hidden" name="id">
        <div class="row"> 
          <div class="col-lg-6">
                      <div class="form-group">
                   <label>Product Type Name</label>

              <input type="text" class="form-control" id="name" name=name placeholder="Enter Product Type Name" value={{@$ProductType}}>

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


</div> <script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>

<script>
  $(function(){
    show_data();
function show_data(){
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowProductType')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        var html='';

      var sno=1;
var i;
var status;
 for ( i=0; i <res.length; i++) {

    $('#example1').DataTable().destroy();
if(res[i].status==1)
{status='Active'

}
else{
  status='In-Active'
  }
 html+='<tr>'+
            '<td>'+sno+'</td>'+
            '<td>'+res[i].name+'</td>'+
             '<td>'+status+'</td>'+
           
           
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
   "ordering": true,
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

  var url='<?php echo url('admin/ProductTypeEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){

$('input[name=id]').val(response.id);
$('input[name=name]').val(response.name);
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
  var url='<?php echo url('admin/ProductTypeDelete/')?>/'+id+'';

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

  var url='<?php echo url('admin/ProductTypeUpdate')?>';
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