 @extends('admin/header')
 @extends('admin/footer')

@section('content')
 <body  onload="window.print()">

  <style type="text/css" >
      @media print {
 .table td, .table th {
    border: 1px solid #dee2e6!important;
    /* padding: .75rem; */
    padding: 0px!important;
    vertical-align: top;
    border-top: 1px solid #dee2e6!important;
    }
  

    *,td{
  font-size: 25px!important;
}
th{
  font-size: 20px!important;
}
.net{
  font-size: 27px!important;
}
}

</style>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-6 ">
        <div class="row">
        <div class="col-8 text-left" >
      
          <b style="font-size:30px!important">{{$res[0]->customer_name}}</b>
      
      </div>
        <div class="col-4 text-right">
        <span class="text-right pr-3"> {{date('d-m-Y')}}</span>
          
      </div>

</div>
<hr>      </div>
         <div class="col-6 pl-3">
        <div class="row">
        <div class="col-8 text-left">
      
          <b style="font-size:30px!important">{{$res[0]->customer_name}}</b>
      
      </div>
        <div class="col-4 text-right">
        <span class=" text-right"> {{date('d-m-Y')}}</span>
          
      </div>

</div>
<hr>      </div>
      <!-- /.col -->
    </div>
       <div class="row">
      <div class="col-sm-6 pl-2 ">
<div class="col-sm-12 ">
      
     

    
          
            <b> Prduct Name:</b><span> {{$res[0]->product_name}}</span><br>
            
              <b> Product Type:</b><span> {{$res[0]->name}}</span><br>

       <b>Remarks: </b><span style="overflow-wrap: break-word;">{{$res[0]->remarkso}}</span>
            </div>
              <div class="col-sm-12 mt-3">
                <!--   <b>Total Gross Weight </b> <span>{{round($res[0]->net_gross_wt,2)}} Kg</span><br>
      <b>Core Weight </b>= <span>{{round($res[0]->net_cross_wt,2)}} Kg</span><br>
        <b  class="net">Net Weight</b> = <span  class="net">{{round($res[0]->total_net_weight,2)}} Kg</span> -->
        <table class="table table-striped mt-4">
          <thead>
          <tr>
            <th width="10px">#</th>
            <th width="100">Bag/Core</th>
            <th width="100">Gross Wt</th>
            <th width="110">Bag/Core Wt</th>
            <th width="100">Net Wt</th>
            
          </tr>
          </thead>
          <tbody class="">
            <?php $sno=1;
            ?>
            @foreach($res as $r)

          <tr>
            <td>{{$sno}}</td>
            <td>{{$r->bag_detail}}</td>
            <td>{{round($r->gross_wt,2)}}</td>
           <td>{{($r->item=='rolls'?round($r->cross_wt*$r->qty1,2):round($r->cross_wt,2))}}</td>
            <td>{{round($r->net_wt,2)}}</td>
            
          </tr>
          @php $sno++ @endphp 
          @endforeach
      
          </tbody>
          <tfoot>
  <tr>
    <td></td><td><b>NET.</b></td>
    <td ><b>{{round($res[0]->net_gross_wt,2)}} Kg</b></td>
<td><b>{{round($res[0]->net_cross_wt,2)}} Kg</b></td>
    <td><b>{{round($res[0]->total_net_weight,2)}} Kg</b></td></tr>
</tfoot>
        </table>
</div>
        <div class=" col-sm-12">
       

      </div>
        <div class="col-md-12 mt-3">

      <table class="table table-striped table-bordered">
        <thead class="thead thead-dark ">
       <tr>
            <th> # </th>
            <th style="width: 140px">Dispatch Date</th>
            <th > Qty</th>
             <th> Remarks</th>
            <th> Net Wt</th>
          </tr>
        </thead>
<tbody id="showdispatch">
 <?php 
$run=DB::table('dispatch_rolls')->where('delivery_id',$res[0]->delivery_id)->get();
 $c=0;
 $tw=0;
 $tq=0;
 ?>
  @foreach($run as $r)
  <?php $c++;
  $tw+=$r->net_weight;
  $tq+=$r->qty;
  ?>
<tr>
  <td>{{$c}}</td>
   <td>{{$r->dispatch_date}}</td>
    <td>{{$r->qty}}</td>
        <td style="font-size: 2vw!important">{{$r->dispatch_remarks}}</td>
     <td>{{$r->net_weight}}</td>

</tr>
  @endforeach
</tbody>

<tfoot>
  <th></th>
  <th><b>Total</b></th>
  <th> <span id="totalQty">{{$tq}} </span></th>
  <th></th>
 <th> <span id="totalNetWeight">{{$tw}} kg</span></th>
</tfoot>
      </table>
     </div>
      </div>
        <div class="col-sm-6 pl-2">
    <div class="col-sm-12">
        
            <b> Prduct Name:</b><span> {{$res[0]->product_name}}</span><br>
             
              <b> Product Type:</b><span> {{$res[0]->name}}</span><br>

       <b>Remarks: </b><span style="overflow-wrap: break-word;">{{$res[0]->remarkso}}</span>
            </div>
      <div class="col-sm-12  mt-3">
    <!--               <b>Total Gross Weight </b> <span>{{round($res[0]->net_gross_wt,2)}} Kg</span><br>
      <b>Core Weight </b>= <span>{{round($res[0]->net_cross_wt,2)}} Kg</span><br>
        <b  class="net">Net Weight</b> = <span  class="net">{{round($res[0]->total_net_weight,2)}} Kg</span> -->
        <table class="table table-striped mt-4">
          <thead>
          <tr>
            <th width="10px">#</th>
            <th width="100">Bag/Core</th>
            <th width="100">Gross Wt</th>
            <th width="110">Bag/Core Wt</th>
            <th width="100">Net Wt</th>
            
          </tr>
          </thead>
          <tbody class="">
            <?php $sno=1;?>
            @foreach($res as $r)
          <tr>
            <td>{{$sno}}</td>
            <td>{{$r->bag_detail}}</td>
            <td>{{round($r->gross_wt,2)}}</td>
               <td>{{($r->item=='rolls'?round($r->cross_wt*$r->qty1,2):round($r->cross_wt,2))}}</td>
            <td>{{round($r->net_wt,2)}}</td>
            
          </tr>
          @php $sno++ @endphp 
          @endforeach
      
          </tbody>
          <tfoot>
  <tr>
    <td></td><td><b>NET.</b></td>
    <td ><b>{{round($res[0]->net_gross_wt,2)}} Kg</b></td>
<td><b>{{round($res[0]->net_cross_wt,2)}} Kg</b></td>
    <td><b>{{round($res[0]->total_net_weight,2)}} Kg</b></td></tr>
</tfoot>
        </table>
</div>
  <div class="col-md-12 mt-3">

      <table class="table table-striped table-bordered">
        <thead class="thead thead-dark ">
       <tr>
            <th> # </th>
            <th style="width: 140px">Dispatch Date</th>
            <th > Qty</th>
            <th>Remarks</th>
             <th>Net Wt</th>
          </tr>
        </thead>
<tbody id="showdispatch">
 <?php 
$run=DB::table('dispatch_rolls')->where('delivery_id',$res[0]->delivery_id)->get();
 $c=0;
 $tw=0;
 $tq=0;
 ?>
  @foreach($run as $r)
  <?php $c++;
  $tw+=$r->net_weight;
  $tq+=$r->qty;
  ?>
<tr>
  <td>{{$c}}</td>
   <td>{{$r->dispatch_date}}</td>
    <td>{{$r->qty}}</td>
     <td style="font-size: 2vw!important">{{$r->dispatch_remarks}}</td>
     <td>{{$r->net_weight}}</td>

</tr>
  @endforeach
</tbody>

<tfoot>
  <th></th>
  <th><b>Total</b></th>
  <th> <span id="totalQty">{{$tq}} </span></th>
  <th></th>
 <th> <span id="totalNetWeight">{{$tw}} kg</span></th>
</tfoot>
      </table>
     </div>

         
      </div>


     
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
     
      <!-- /.col -->
    
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

   <script src="{{url('public/dist/js/jquery-3.5.1.min.js')}}"></script>
    @endsection('content')