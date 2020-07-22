@extends('admin/header')
@extends('admin/sidebar')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style type="text/css">
    #gif{
              z-index: 1000;
    top: 40%;
    left: 50%;
    right: 10%;
    justify-content: center;
    position: fixed;
           }
  </style>
   
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
  <img src="{{asset('public/dist/img/gif.gif')}}" style="display:none;" width="90px;" id=gif>

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
        
 
                <form id="form1" action="<?php echo url('admin/InsertProductType')?>"   method="POST" enctype="multipart/form-data">


                <div class="row">
 {{ csrf_field() }}                    <!---Form Start-->

                      <div class="col-lg-6">
                      <div class="form-group">
                   <label>Product Type Name</label>

              <input type="text" class="form-control" id="name" name=name placeholder="Enter Product Type Name" >

                </div>
                    </div>
                  



                    <div class="col-lg-12 text-right mt-2">
                     <input type="submit" class="btn btn-info btn-md " id=add  value="Add"  >
                    </div>

                </div>


                  </form>

                    <!---End Form-->
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        </div>

      </div>
    </section>
  </div>
   <script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>
<script>

  $(function(){
$('#form1').on('submit',function (e) {
  e.preventDefault(e);
	var data=$('#form1').serialize();
	var url='<?php echo url('admin/InsertProductType')?>';

	$.ajax({
		type:'ajax',
		method:'post',
    data:new FormData(this),
       
          contentType:false,
              cache:false,

        processData:false,
		url:url,
		
		async:false,
       beforeSend: function(){
 $("#gif").removeAttr('style','display:none');
    },      complete: function(){
      $("#gif").attr('style','display:none');
      },

 
		success:function(response){
        $("#gif").removeAttr('style','display:none');
			if(response.success){
$('input').removeClass('is-invalid');
$('.alert-success').addClass('alert').html('Data Inserted Successfully').fadeIn().delay(4000).fadeOut();
$('#form1')[0].reset();
			}
			if(response.error){
if('name' in response.error){
  $('#name').addClass('is-invalid');

      }
      else{
       $('#name').removeClass('is-invalid');
      }
      


}

		},
		error:function(){
		$('.alert-danger').addClass('alert').html('Data not Inserted Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
	
		}
	});

});
})
</script>
  
     @endsection('content')
 

@extends('admin/footer')