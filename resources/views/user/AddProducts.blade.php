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
    <div class="content-header mt-n4">
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
        
 
                <form id="form1" action="<?php echo url('admin/InsertProducts')?>"   method="POST" enctype="multipart/form-data">


                <div class="row">
 {{ csrf_field() }}                    <!---Form Start-->

                 
                   
                 
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
                         <div class="col-lg-3">
                      <div class="form-group">
                   <label>Products Name</label>

              <input type="text" class="form-control" id="product_name" name=product_name placeholder="Enter Products Name" value={{@$Products}}>

                </div>
                    </div>
                                <div class="col-lg-3">
                      <div class="form-group">
                   <label>Weight(Kg)</label>

              <input type="number" class="form-control" id="weight" name=weight placeholder="Enter Weight" value={{@$Products}}>

                </div>
                    </div>
                                 <div class="col-lg-2">
                      <div class="form-group">
                   <label>Polyster Size</label>
    <select  class="form-control" id="polyster_size" name=polyster_size   >
               <option value="">
                  Select Polyster Size
                </option>
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
                
<option value="">
                  Select M Polyster Size
                </option>
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
                
<option value="">
                  Select M_BOPP Size
                </option>
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
       
<option value="">
                  Select BOPP Size
                </option>
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
               <option value="">
                  Select Milky Poly Size
                </option>
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
                    <option value="">
                  Select  Poly Size
                </option>
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
                   <label>Perlized Size</label>
 <select  class="form-control" id="perilized_size" name=perilized_size   >
                
       <option value="">
                  Select Perlized Size
                </option>
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
        let singleSelect =new MultipleSelect('#customer_id');
            let singleSelect1 =new MultipleSelect('#product_type_id');
              let singleSelec2 =new MultipleSelect('#polyster_size');

                let singleSelect3 =new MultipleSelect('#poly_size');
                  let singleSelect4 =new MultipleSelect('#m_bopp_size');
                    let singleSelect5 =new MultipleSelect('#m_polyster_size');
                      let singleSelect6 =new MultipleSelect('#bopp_size');
                        let singleSelect7 =new MultipleSelect('#perilized_size');
                          let singleSelect8 =new MultipleSelect('#milky_poly_size');
 
$('#form1').on('submit',function (e) {
  e.preventDefault(e);
	var data=$('#form1').serialize();
	var url='<?php echo url('admin/InsertProducts')?>';

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
$('span .content').html('');
			}
			if(response.error){
if('product_name' in response.error){
  $('#product_name').addClass('is-invalid');

      }
      else{
       $('#product_name').removeClass('is-invalid');
      }
     
    if('polyster_weight' in response.error){
  $('#polyster_weight').addClass('is-invalid');

      }
      else{
       $('#polyster_weight').removeClass('is-invalid');
      }

    if('polyster_size' in response.error){
  $('#polyster_size').addClass('is-invalid');

      }
      else{
       $('#polyster_size').removeClass('is-invalid');
      }

    if('product_type_id' in response.error){
   $('#product_type_id').next().attr('style','border:1px solid red');

      }
      else{
     $('#product_type_id').next().removeAttr('style','border:1px solid red');
      }

    if('customer_id' in response.error){
  $('#customer_id').next().attr('style','border:1px solid red');

      }
      else{
       $('#customer_id').next().removeAttr('style','border:1px solid red');
}
    if('weight' in response.error){
  $('#weight').addClass('is-invalid');

      }
      else{
       $('#weight').removeClass('is-invalid');
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