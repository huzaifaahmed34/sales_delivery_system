@extends('admin/header')
 
@section('content')
<style type="text/css">
  .navbar,.content-wrapper{
    margin-left:0px!important;
  }
@media print {
  * {
    color: black;
  }
  #example3,#example4{
   margin-top: 30px
  }
  h1{  
    text-align: center;
    margin-bottom: 20px;

  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
 <style type="text/css">
   td{
  
    text-align: center
   }
   .bold{
    font-weight: bold;
   }
 </style>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-12">
          <div class="card">
        
            <!-- /.card-header -->
            <div class="row  mt-3 mb-n4">
 <div class="col-lg-2">
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
                 <div class="col-lg-2">
                      <div class="form-group">
                  

               <select  class="form-control" id="pid" name=pid   >
                <option value="">
                  Select Product
                </option>

                     @php
                $qr=DB::table('product')->where('is_deleted',0)->where('status',1)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->product_name}}</option>;
             
              @endforeach
              </select>
            </div>

                </div>
                 <div class="col-lg-2">
                      <div class="form-group">
                  

               <select  class="form-control" id="oid" name=oid   >
                <option value="">
                  Select Order No
                </option>

                     @php
                $qr=DB::table('orders')->where('is_deleted',0)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->id}}</option>;
             
              @endforeach
              </select>
            </div>

                </div>
                 <div class="col-lg-2">
                      <div class="form-group">
                  

             <input type="date" name="from_date" id="from_date" class="form-control" value="{{date('Y-m-d')}}">
             <label>From Date</label>
            </div>

                </div>

  <div class="col-lg-2">
                      <div class="form-group">
                  

             <input type="date" name="to_date" id="to_date" class="form-control" value="{{date('Y-m-d')}}">
             <label>To Date</label>
            </div>

                
                </div>

  <div class="col-lg-2">
                      <div class="form-group">
                  

             <button class="btn btn-info search">Search</button>
              <button class="btn btn-success export">Export</button>
            </div>

                
                </div>

</div>

            <div class="card-body">
       
              <div class="col-lg-12  alert-success">
     
              </div>
        
      <div class="col-lg-12  alert-danger">

              </div>
        
      <div class="table-responsive ">
                <table  border=3 style="width: 100%" class="exporttable table-bordered table-striped ">
                  <thead class="thead thead-dark bg-dark " >
                    <tr>
              <th >Odr #</th>
 <th>Dly Id</th>
              
                       <th class="px-4">Customer Name</th>
                     
                         <th class="px-4">Product Name</th>
                            <th class="px-4">Date</th>
                         <th>Bag Detail</th>
                           <th class="px-4">Qty</th>
                           <th>Gross Wt</th>
                             <th>Core Wt</th>
                               <th class="px-4">Net Wt</th>
                               <th class="px-4">Rate</th>
                                <th class="px-4">Net Amount</th>
                                 

                                    <th class="px-2">Dispatch Qty</th>  
                                     <th class="px-4">Dispatch Date</th>
                                    <th >Dispatch Status</th>
    
                    </tr>
                  </thead>
                  <tbody id=showdata>

<?php
 
$html='';
              foreach($qry as $res) {
                    
     $core_wt=0;
     $gross_wt=0;
     $net_wt=0;
          $run=DB::select("select group_concat(dispatch_date) as dispatch_date,sum(qty) as qty,sum(net_weight) as net_weight from dispatch_rolls where delivery_id='$res->delivery_id'  group by delivery_id");
            
       $html.='<tr>
        <td class="">'.$res->oid.'</td>
  <td class="">'.$res->delivery_id.'</td>


               
             <td class="bold">'.$res->customer_name.'</td>
          

             <td class="bold">'.$res->product_name.'</td>
                 <td style=width:100px class="">'.date('Y-m-d',strtotime($res->created_at)).'</td>
              <td colspan=7></td>
              
            
              <td >  </td>
             


                '.($res->item=='rolls'?'
            
              <td class="td"><p>'.(empty($run[0]->dispatch_date)?'':$run[0]->dispatch_date).'</p></td>
              ':'<td></td>').'
           <td></td>
                 
       
               </tr>';
if($res->item=='bags'){
               
               $qry1=DB::table('bag_info')->where('delivery_id',$res->delivery_id)->get();
               

               foreach ($qry1 as $res1) {
                 $net_wt+=$res1->net_wt;
                $gross_wt+=$res1->gross_wt;
                $core_wt+=$res1->cross_wt;
       $html.='<tr>
 <td></td>
  <td></td>
   <td></td>
    <td></td>
     
      <td></td>
  <td class="">'.$res1->bag_detail.'</td>
<td></td>
               
             <td class="">'.$res1->gross_wt.'</td>
              <td style=width:100px class="">'.$res1->cross_wt.'</td>

             <td class="">'.$res1->net_wt.'</td>
              <td></td>
               <td></td>
                 <td></td>
                <td>'.$res1->dispatch_date.'</td>
         <td>'.$res1->dispatch_status.'</td>
       
               </tr>';
             }
             $html.='<tr  >
 <td></td>
  <td></td>
   <td></td>
    <td></td>
     
      <td><b>Total Amount</b></td>
  <td></td>

               <td></td>
             <td class="bold">'.$gross_wt.'kg</td>
              <td style=width:100px class="bold">'.$core_wt.'kg</td>

             <td class="bold" style="color: #2f25c7;">'.$net_wt.'kg</td>
              <td class="bold">Rs '.$res->rate.'/Kg</td>
               <td class="bold">Rs '.$res->net_amount.' </td>
                 
                   '.(!empty($run[0]->net_weight) ?'<td style="border-bottom:2px solid"><b>'.$run[0]->net_weight.' Kg</b></td>
                  <td style="border-bottom:2px solid"></td>':'<td ></td>
                  <td ></td>').'
                  <td></td>
             
       
               </tr>';


      $dis=DB::table('dispatch_rolls')->where('delivery_id',@$res->delivery_id)->get();
 
foreach ($dis as $d) {
       $html.='<tr  >
 <td></td>
  <td></td>
   <td></td>
    <td></td>
     
      <td></td>
  <td></td>

               <td></td>
             <td class="bold"> </td>
              <td style=width:100px class="bold"> </td>

             <td class="bold" > </td>
              <td class="bold"> </td>
               <td class="bold"> <b></b></td>
                <td><b>'.$d->net_weight.' Kg</b></td>
                  <td><b>'.$d->dispatch_date.'</b></td>
                <td></td>
              
       
               </tr>

               ';


}

$html.='<tr style="border-bottom:2px solid grey">
<td colspan=16> </td></tr>';




   }
   else{



$total_qty=0;

 
               $qry1=DB::table('bag_info')->where('delivery_id',$res->delivery_id)->get();
          

     foreach ($qry1 as $res1) {
                $total_qty+=$res1->qty;
       $html.='<tr>
 <td></td>
  <td></td>
   <td></td>
    <td></td>
     
      <td></td>
  <td class="">'.$res1->bag_detail.'@'.$res1->cross_wt.'x'.$res1->qty.'</td>
<td>'.$res1->qty.' Rolls</td>
               
             <td class=""></td>
              <td style=width:100px class="">'.$res1->cross_wt*$res1->qty.'</td>

             <td class=""></td>
              <td></td>
               <td></td>
                <td></td>
                  <td></td>
               <td></td>
     
        
               </tr>';
             }
             $html.='<tr ">
 <td></td>
  <td></td>
   <td></td>
    <td></td>
     
      <td><b>Total Amount</b></td>
  <td></td>

               <td><b>'.$total_qty.' Rolls</b></td>
             <td class="bold">'.$res->net_gross_wt.'kg</td>
              <td style=width:100px class="bold">'.$res->net_cross_wt.'kg</td>

             <td class="bold" style="color: #2f25c7;">'.$res->total_net_weight.'kg</td>
              <td class="bold">Rs '.$res->rate.'/Kg</td>
               <td class="bold">Rs '.$res->net_amount.' </td>
               '.(!empty($run[0]->net_weight) ?'<td style="border-bottom:2px solid"><b>'.$run[0]->net_weight.' Kg</b></td>
                  <td style="border-bottom:2px solid"></td>':'<td ></td>
                  <td ></td>').'
               
                <td></td>
         
       
               </tr>

               ';

      $dis=DB::table('dispatch_rolls')->where('delivery_id',@$res->delivery_id)->get();
 
foreach ($dis as $d) {
       $html.='<tr  >
 <td></td>
  <td></td>
   <td></td>
    <td></td>
     
      <td></td>
  <td></td>

               <td></td>
             <td class="bold"> </td>
              <td style=width:100px class="bold"> </td>

             <td class="bold" > </td>
              <td class="bold"> </td>
               <td class="bold"> <b></b></td>
                <td><b>'.$d->net_weight.' Kg</b></td>
                  <td><b>'.$d->dispatch_date.'</b></td>
                <td></td>


              
       
               </tr>

               ';


}

$html.='<tr style="border-bottom:2px solid grey">
<td colspan=16> </td></tr>';



   }
 }
   echo $html;
            
?>

                  </tbody>


                </table>
                </div>

            </div>
             <div class="col-lg-12 text-center " > {{ $qry->links() }} 
 </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 


 




</div>
<script src="{{asset('public/dist/js/jquery-3.5.1.min.js')}}"></script>
<script>
  $(function(){
   
function show_data(){
    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/ShowBagsInfo')?>',
      async:false,
      dataType:'html',
       
      success:function(res){
 
 
 $('#example1').DataTable().destroy();
 $('#example1').DataTable().draw();
  $('#showdata').html(res);
 
        },
        });



      }

$(".export").click(function(){
 
  $(".exporttable").table2excel({

    // exclude CSS class

    exclude:".noExl",

    name:"Advance Order Report",

    filename:"Advance Order Report",//do not include extension

    fileext:".csv" // file extension

  });
 
});


 
 $('.search').click(function () {
  var cid=$('#cid').val();
    var pid=$('#pid').val();
        var from_date=$('#from_date').val();
     var to_date=$('#to_date').val();
     var oid=$('#oid').val();

     $.ajax({
      type:'ajax',
      method:'get',
 data:{'cid':cid,'oid':oid,'pid':pid,'to_date':to_date,'from_date':from_date},
      url:'<?php echo url('admin/AdvanceReportFilter')?>',
      async:false,
      dataType:'html',
       
      success:function(res){

 $('#showdata').html(res);

}
 

        
        });
 })



 

  });
</script>

    @endsection('content')
 

@extends('admin/footer')