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
        
 
           

                <div class="row">
 {{ csrf_field() }}                    <!---Form Start-->
 <div class="col-lg-12">
 <label>Import excel file of list items in this format</label>
                  <table class="table">
                    <thead>
                    <tr>

                      <th>Polyster Size</th>
                      <th>M_Polyster Size</th>
                      <th>M_Bopp Size</th>
                      <th>Bopp Size</th>
                        <th>Milky_Poly Size </th>
                         <th>Poly Size </th>
                         <th>Perilized Size </th>
                         <th>Delux</th>
                    </tr>
                  </thead>
                  </table>
                    @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('admin/importExcel') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
      
     </table>
    </div>
   </form>

</div>


                </div>

 
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
// $('#form1').on('submit',function (e) {
//   e.preventDefault(e);
// 	var data=$('#form1').serialize();
// 	var url='<?php echo url('admin/InsertSize')?>';

// 	$.ajax({
// 		type:'ajax',
// 		method:'post',
//     data:new FormData(this),
       
//           contentType:false,
//               cache:false,

//         processData:false,
// 		url:url,
		
// 		async:false,
//        beforeSend: function(){
//  $("#gif").removeAttr('style','display:none');
//     },      complete: function(){
//       $("#gif").attr('style','display:none');
//       },

 
// 		success:function(response){
//         $("#gif").removeAttr('style','display:none');
// 			if(response.success){
// $('input').removeClass('is-invalid');
// $('.alert-success').addClass('alert').html('Data Inserted Successfully').fadeIn().delay(4000).fadeOut();
// $('#form1')[0].reset();
// 			}
// 			if(response.error){
// if('name' in response.error){
//   $('#name').addClass('is-invalid');

//       }
//       else{
//        $('#name').removeClass('is-invalid');
//       }
      


// }

// 		},
// 		error:function(){
// 		$('.alert-danger').addClass('alert').html('Data not Inserted Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
	
// 		}
// 	});

// });
})
</script>
  
     @endsection('content')
 

@extends('admin/footer')