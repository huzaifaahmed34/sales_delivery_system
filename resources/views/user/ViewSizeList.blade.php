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

              <form id="form1">
                  <div class="row mb-3">
                    <div class="col-lg-2">
                      <input type="" name="polyster_size1" placeholder="Polyster Size" class="form-control">
                    </div>
                      <div class="col-lg-2">
                      <input type="" name="m_polyster_size1" placeholder="M_Polyster Size" class="form-control">
                    </div>
                      <div class="col-lg-2">
                      <input type="" name="m_bopp_size1" placeholder="M_Bopp Size" class="form-control">
                    </div>
                      <div class="col-lg-1">
                      <input type="" name="bopp_size1" placeholder="Bopp Size" class="form-control">
                    </div>
                      <div class="col-lg-2">
                      <input type="" name="milky_poly_size1" placeholder="Milky_Poly Size" class="form-control">
                    </div>  <div class="col-lg-1">
                      <input type="" name="poly_size1" placeholder="Poly Size" class="form-control">
                    </div>
                      <div class="col-lg-1">
                      <input type="" name="perlized_size1" placeholder="Perlized Size" class="form-control">
                    </div>
                        <div class="col-lg-1">
                     
 <input type="submit" name="" value="ADD" class="btn btn-primary mb-2">
                    </div>


                  </div>
</form>
<hr>
               <form id="myform">

                {{csrf_field()}}
                <div class="row">

             
 

 <input type="hidden"  name="count" id="count" >

 <div class="col-lg-12">

 
 <input type="submit" name="" value="Update" class="btn btn-success mb-2">
   <div class="table-responsive">
                <table id="" class="table table-bordered table-striped ">
                  <thead class="thead thead-dark" style="overflow: hidden;">
  
    <tr> <th> Sno</th>
     <th>Polyster Size</th>
                      <th>M_Polyster Size</th>
                      <th>M_Bopp Size</th>
                      <th>Bopp Size</th>
                        <th>Milky_Poly Size </th>
                         <th>Poly Size </th>
                            <th>Perlized Size </th>
                               <th>Action </th>
                         


    </tr>

    </thead>
    
    <tbody id="showdata">
     </tbody>

  </table>

</div>
</div>
</form>


                    </div>
        
      


</div>
</div>
</div>
</div>
</div>
</section></div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete  Size Row</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this  Size Row
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->
<script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>
<script>
  $(function(){
 var count=0;
   

    show_data();
   
function show_data(){
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowSize')?>',
     
      dataType:'json',
        async:false,
      success:function(res){
        var html='';

      var sno=1;
var i;      $('#example1').DataTable().draw();

 for ( i=0; i <res.length; i++) {
   
 html+='<tr scope="row"  id='+res[i].id+'>'+ 
 '<td>'+sno+'</td>'+
          '<td class="Polyster_size"><input value="'+(res[i].Polyster_size==null?'':res[i].Polyster_size)+'" name="Polyster_size['+sno+']"></td>'+
            '<td class="M_Polyster_size" ><input value="'+(res[i].M_Polyster_size==null?'':res[i].M_Polyster_size)+'" name="M_Polyster_size['+sno+']""></td>'+
              '<td class="M_Bopp_size" ><input value="'+(res[i].M_Bopp_size==null?'':res[i].M_Bopp_size)+'" name="M_Bopp_size['+sno+']""></td>'+

                '<td class="Bopp_size" ><input value="'+(res[i].Bopp_size==null?'':res[i].Bopp_size)+'" name="Bopp_size['+sno+']""></td>'+

                  '<td class="Milky_Poly_size" ><input value="'+(res[i].Milky_Poly_size==null?'':res[i].Milky_Poly_size)+'" name="Milky_Poly_size['+sno+']""></td>'+

                    '<td class="Poly_size" ><input value="'+(res[i].Poly_size==null?'':res[i].Poly_size)+'" name="Poly_size['+sno+']""></td>'+
                     '<td class="Perlized" ><input value="'+(res[i].Perilized_size==null?'':res[i].Perilized_size)+'" name="Perilized_size['+sno+']""></td>'+
                     '<td><a href="javascript:;" data='+res[i].id+' class="deletedata text-danger">Delete</a></td>'
         '<td class="" style="visibility:hidden"><input value="'+res[i].id+'" name=id['+sno+']></td>'+

              

         
            '</tr>';
           sno++;
    count++;
    
};
     
 $('#showdata').html(html);

  $('input[name=count]').val(count);
 


        },
        });
      }
 

 

$('#showdata').on('click','.deletedata',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');


$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/SizeDelete/')?>/'+id+'';

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
  var data=$('#myform').serialize();
   
  count=0;
$.ajax({
      type:'ajax',
      method:'post',
 data:data,
      url:'<?php echo url('admin/UpdateSize')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      $('.alert-success').addClass('alert').html('Data Inserted/Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
      },
      error:function(){
alert('Some Error');
      }
    })




  });
 

$('#form1').unbind().on('submit',function (e) {
e.preventDefault();
  var data=$('#form1').serialize();
  
  count=0;
$.ajax({
      type:'ajax',
      method:'get',
 data:data,
      url:'<?php echo url('admin/AddInsertSize')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
      $('.alert-success').addClass('alert').html('Data Inserted Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
      show_data();
      },
      error:function(){
alert('Some Error');
      }
    })




  });
 
  });
</script>

    @endsection('content')
 

@extends('admin/footer')