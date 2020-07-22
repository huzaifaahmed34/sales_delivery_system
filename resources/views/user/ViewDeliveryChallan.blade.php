@extends('admin/header')
 
@section('content')
<style type="text/css">
  .navbar,.content-wrapper{
    margin-left:0px!important;
  }
  .td p{
font-size: 12px !important;
  }
  th{
    border: 1px solid black!important;
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
 <div class="col-lg-5 mt-1 mb-n4">
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

            <div class="card-body">
       
              <div class="col-lg-12  alert-success">
     
              </div>
        
      <div class="col-lg-12  alert-danger">

              </div>
        
      <div class="table-responsive">
                <table  border=3 style="width: 100%" class="table-responsive table-bordered table-striped ">
                  <thead class="thead thead-dark bg-dark" >
                    <tr>
                   <th >Odr #</th>
 <th>Dly Id</th>
              
                       <th class="">Customer Name</th>
                     
                         <th class="">Product Name</th>
                            <th class="">Date</th>
                         <th>Bag Detail</th>
                           <th class="">Qty</th>
                           <th>Gross Wt</th>
                             <th>Core Wt</th>
                               <th class="">Net Wt</th>
                               <th class="">Rate</th>
                                <th class="">Net Amount</th>
                                 

                                    <th  >Dispatch Qty</th>  
                                     <th >Dispatch Date</th>
                                    <th  class="">Dispatch Status</th>
        <th class="px-3">Action</th>
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
              '.($res->item=='rolls'?'
              <td><a href=javascript:; style="font-size:30px" data='.$res->delivery_id.'    class="dispatchdata1 text-primary bold">Dispatch</a></td>
              ':'<td></td>').'
                  <td><a href=javascript:; style="font-size:30px" data='.$res->delivery_id.' data1='.$res->item.'   class="AddData title="Add Rolls/Bags" text-dark"><i class="fa fa-plus my-2" style=font-size:20px></i></a>
                  <a href=javascript:; style="font-size:30px" data='.$res->delivery_id.'    class="printdata text-dark"><i class="fa fa-print my-2" style=font-size:20px></i></a> 
                  <a href=javascript:; style="font-size:10px" data='.$res->delivery_id.'    class="deleteDelivery text-danger"><i class="fa fa-trash-alt my-2" style=font-size:20px></i></a></td>
       
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
               <td><a href=javascript:; style="font-size:30px" data='.$res1->id.' data1='.$res->delivery_id.' data2='.$res1->net_wt.'  id="dispatchdata" class="dispatchdata text-primary bold">'.$res1->dispatch_status.'</a></td>
             <td><a href=javascript:; style="font-size:30px" data='.$res1->id.' data1='.$res1->delivery_id.'  net_wt='.$res1->net_wt.' gross_wt='.$res1->gross_wt.' cross_wt='.$res1->cross_wt.'    class="editdata text-primary"><i class="fa fa-edit" style="font-size:20px!important"></i></a> <a href=javascript:; style="font-size:30px" data='.$res1->id.' data1='.$res1->delivery_id.'  net_wt='.$res1->net_wt.' gross_wt='.$res1->gross_wt.' cross_wt='.$res1->cross_wt.'    class="deletedata text-danger"><i class="fa fa-trash"  style="font-size:20px!important"></i></a></td>
       
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
             <td><a href=javascript:; style="font-size:30px" data='.@$res->oid.' data1='.@$net_wt.'  class="addrate text-primary"><i class="fa fa-plus-circle" title="Add/Update Rate" style="font-size:20px!important"></i></a> </td>
       
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
                <td> <a href="javascript:;" class="editdispatch"  data='.$d->id.' dispatch_qty="'.$d->qty.'"  dispatch_remarks="'.$d->dispatch_remarks.'" dispatch_wt="'.$d->net_weight.'"  dispatch_date="'.$d->dispatch_date.'"><i class="far fa-edit"></i></a>
              <a href="javascript:;" class="deletedispatch" data='.$d->id.'><i class="text-danger fas fa-trash-alt"></i></a></td>
       
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
           <td><a href=javascript:; style="font-size:30px" data='.$res1->id.' data1='.$res1->delivery_id.'  net_wt='.$res->total_net_weight.' gross_wt='.$res->net_gross_wt.' cross_wt='.$res1->cross_wt*$res1->qty.'    class="editdata1 text-primary"><i class="fa fa-edit" style="font-size:20px!important"></i></a> <a href=javascript:; style="font-size:30px" data='.$res1->id.' data1='.$res1->delivery_id.'  net_wt='.$res->total_net_weight.' gross_wt='.$res->net_gross_wt.' cross_wt='.$res1->cross_wt*$res1->qty.'   class="deletedata1 text-danger"><i class="fa fa-trash"  style="font-size:20px!important"></i></a></td>
        
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
              <td><a href=javascript:; style="font-size:30px" data='.@$res->oid.' data1='.@$net_wt.'  class="addrate text-primary"><i class="fa fa-plus-circle" title="Add/Update Rate" style="font-size:20px!important"></i></a> </td>
       
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


              <td> <a href="javascript:;" class="editdispatch" data='.$d->id.' dispatch_qty="'.$d->qty.'"  dispatch_remarks="'.$d->dispatch_remarks.'" dispatch_date="'.$d->dispatch_date.'" dispatch_wt="'.$d->net_weight.'"><i class="far fa-edit"></i></a>
              <a href="javascript:;" class="deletedispatch" data='.$d->id.' ><i class="text-danger fas fa-trash-alt"></i></a></td>
       
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
            <div class="col-lg-12 text-center"> 
              {{ $qry->links() }}
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
           <h4 class="modal-title">Delete Delivery Challan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Delivery Challan
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->



<!-- Delete Modal -->
<div id="deleteModalDispatch" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete Dispatch</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Dispatch
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDeleteDispatch" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->




<!-- Delete Modal -->
<div id="deleteDeliveryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete Delivery Challan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Delivery Challan
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btndeleteDelivery" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->



<!-- Delete Modal -->
<div id="dispatchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Dispatch Delivery Challan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to Dispatch this Delivery Challan
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDispatch" class="btn btn-primary " >Dispatch</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="dispatchModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Dispatch Delivery Challan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
        <div class="row mb-2">
        <div class="col-md-3">
 
        <label>Enter Rolls</label>
     <input type="text" class="form-control" name="rolls" placeholder="Enter Roll Qty">
     </div>
        <div class="col-md-3">
      
        <label>Net weight </label>
     <input type="text" class="form-control" name="net_weightdispatch" placeholder="Enter Net Weight">
     </div>
   </div>
     <div class="col-md-12">
      <table class="table table-striped table-bordered">
        <thead class="thead thead-dark text-center">
       
            <th>#</th>
            <th>Dispatch Date</th>
            <th>Dispatch Qty</th>
            <th>Dispatch Weight</th>
          </tr>
        </thead>
<tbody id="showdispatch">
  
</tbody>

<tfoot>
  <th></th>
  <th></th>
  <th>Total Qty : <span id="totalQty"></span></th>
 <th>Total Net Weight : <span id="totalNetWeight"></span></th>
</tfoot>
      </table>
     </div>
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDispatch1" class="btn btn-primary " >Dispatch</button>
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
           <h4 class="modal-title">Edit Delivery Challan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=form1>
        {{csrf_field()}}
        <input type="hidden" name="id">
        <input type="hidden" name="delivery_id">
         <input type="hidden" name="core_wthidden">
          <input type="hidden" name="net_wthidden">
           <input type="hidden" name="gross_wthidden">
 
        <div class="row"> 
          <div class="col-lg-3">
                      <div class="form-group">
                   <label>Bag Detail </label>

              <input type="text" class="form-control" id="bag" name=bag   >

                </div>
                    </div>
                       <div class="col-lg-3">
                      <div class="form-group">
                   <label>Gross Wt</label>

              <input type="text" class="form-control" id="gross_wt" name=gross_wt   >

                </div>
                    </div>
                  
                     <div class="col-lg-3">
                      <div class="form-group">
                   <label>Core Wt</label>

              <input type="text" class="form-control" id="core_wt" name=core_wt   >

                </div>
                    </div>
                  
                     <div class="col-lg-3">
                      <div class="form-group">
                   <label>Net Wt</label>

              <input type="text" class="form-control" id="net_wt" name=net_wt  readonly >

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






 















<!--Edit   Modal -->
<div id="EditModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Edit Core Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=formUpdate>
        {{csrf_field()}}
       <input type="hidden" name="id1">
        <input type="hidden" name="delivery_id1">
         <input type="hidden" name="core_wthidden1">
          <input type="hidden" name="net_wthidden1">
           <input type="hidden" name="gross_wthidden1">
 
        <div class="row"> 
                    <div class="col-lg-12">
      <p><b>Core Weight : <span id=spancore></span></b></p>
    </div>
          <div class="col-lg-3">
                      <div class="form-group">
                   <label>Bag Detail </label>

              <input type="text" class="form-control" id="bag1" name=bag1   >

                </div>
                    </div>
                       <div class="col-lg-3">
                      <div class="form-group">
                   <label>Qty</label>

              <input type="text" class="form-control" id="qty1" name=qty1   >

                </div>
                    </div>
                  
                       <div class="col-lg-3">
                      <div class="form-group">
                   <label>Core No</label>

              <input type="text" class="form-control" id="core_no1" name=core_no1   >

                </div>
                    </div>
                  
                     <div class="col-lg-3">
                      <div class="form-group">
                   <label>Core Wt</label>

              <input type="text" class="form-control" id="core_wt1" name=core_wt1   >

                </div>
                    </div>
                  
                    
                   
          </div>
        </form>
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnUpdate1" class="btn btn-info " >Update</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!--Edit   Modal -->
<div id="AddModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Add Bags</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=formadd>
        {{csrf_field()}}
    
        <input type="hidden" name="didadd">
    
 
        <div class="row"> 
          <div class="col-lg-3">
                      <div class="form-group">
                   <label>Bag </label>

              <input type="text" class="form-control" id="bagadd" name=bagadd  value="Bag"  >

                </div>
                    </div>
                       <div class="col-lg-3">
                      <div class="form-group">
                   <label>Gross Wt</label>

              <input type="text" class="form-control" id="gross_wtadd" name=gross_wtadd   >

                </div>
                    </div>
                  
                     <div class="col-lg-3">
                      <div class="form-group">
                   <label>Core Wt</label>

              <input type="text" class="form-control" id="core_wtadd" name=core_wtadd   >

                </div>
                    </div>
                  
                     <div class="col-lg-3">
                      <div class="form-group">
                   <label>Net Wt</label>

              <input type="text" class="form-control" id="net_wtadd" name=net_wtadd  readonly >

                </div>
                    </div>
                   
          </div>
        </form>
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnAdd" class="btn btn-info " >Add</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!--Edit   Modal -->
<div id="AddModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Add Rolls</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=formadd1>
        {{csrf_field()}}
        
        <input type="hidden" name="didadd1">
         
 
        <div class="row"> 
          
                      
          <div class="col-lg-2 rolldiv"  >
                      <div class="form-group">
                   <label>Rolls Qty</label>

              <input type="number" value="Rolls" class="form-control"  id="addbag" name=addbag >

                </div>
                    </div>
                         <div class="col-lg-2">
                      <div class="form-group">
                   <label>Gross Weight</label>

              <input type="number" class="form-control" id="addgross_wt" name=addgross_wt placeholder="Kg"  >

                </div>
                    </div>
                      <div class="col-lg-2" id="core_wtdiv">
                      <div class="form-group">
                   <label>Total Core Wt</label>

              <input type="number" class="form-control" id="addcore_wt" name=addcore_wt placeholder="Kg"  >

                </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                   <label>Remarks</label>

              <input type="text"  class="form-control" id="addremarks" name=addremarks>

                </div>
                    </div>
                             <div class="col-lg-2" id="netdiv">
                      <div class="form-group">
                   <label>Net Weight</label>

              <input type="number" value=0 readonly class="form-control" id="addnet_wt" name=addnet_wt>

                </div>
                    </div>
 
                    <div class="col-lg-12 headerdiv"   >
                   
                      <h5>Enter Core Details : </h5>
                       <hr>
                  </div>
                         <div class="col-lg-2 ml-5" id="corediv"  >
                      <div class="form-group">
                   <label>Qty</label>

              <input type="number" value=0  class="form-control" id="addcore_qty" name=addcore_qty>

                </div>
                    </div>
                      <div class="col-lg-2" id="corediv1"  >
                      <div class="form-group">
                   <label>Core No</label>

              <input type="number" value=0  class="form-control" id="addcore_no" name=addcore_no>

                </div>
                    </div>
                      <div class="col-lg-2" id="corediv2"  >
                      <div class="form-group">
                   <label>Core Wt</label>

              <input type="number" value=0  class="form-control" id="addcore_wt_rolls" name=addcore_wt_rolls>

                </div>
                    </div>
                      <div class="col-lg-1">
                      <div class="form-group">
                  <button type="button" id="btnappend" style="margin-top: 32px;padding-bottom: 8px;padding-top: 8px" class=" btn btn-primary btn-sm">ADD</button>
                </div>
                    </div>
                            
     
                    
                   
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <th>Sno</th>
                  <th >Bag/Core Detail</th>
                    <th id=qty  >Rolls Qty</th>
                   <th id=coreth  >Core No</th>
                  
                      <th>Core Weight</th>
 
                       


              </thead>
              <tbody id="showdata1"></tbody>
              
            </table>
          </div>
                    </div>
                  
                   
                  
                   
              </form>
     
    
      <div class="modal-footer">
         <button type="button" id="btnAdd1" class="btn btn-info " >Add</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>













<!--Edit   Modal -->
<div id="ModalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Add/Update Rate</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=form3>
        {{csrf_field()}}

        <input type="hidden" name="did">
        <input type="hidden" name="net_amount_hidden">
    
        <div class="row"> 
          <div class="col-lg-12">
                      <div class="form-group">
                   <label>Rate</label>

              <input type="text" class="form-control" id="rate" name=rate   >

                </div>
                    </div>
               
                   
          </div>
        </form>
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnaddrate" class="btn btn-info " >Update</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!--Edit   Modal -->
<div id="editDModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Edit Dispatch Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
      <form id=formdisatch>
        {{csrf_field()}}
       <input type="hidden" name="dispatch_id">
    
 
        <div class="row"> 
                   
          <div class="col-lg-3">
                      <div class="form-group">
                   <label>Dispatch Bags/Rolls </label>

              <input type="text" class="form-control" id="dispatch_qty" name=dispatch_qty   >

                </div>
                    </div>
                       <div class="col-lg-3">
                      <div class="form-group">
                   <label>Dispatch Net Wt</label>

              <input type="text" class="form-control" id="dispatch_wt" name=dispatch_wt   >

                </div>
                    </div>
                  
                       <div class="col-lg-3">
                      <div class="form-group">
                   <label>Remarks</label>

              <input type="text" class="form-control" id="dispatch_remarks" name=dispatch_remarks   >

                </div>
                    </div>
                  
                     <div class="col-lg-3">
                      <div class="form-group">
                   <label>Dispatch Date</label>

              <input type="date" class="form-control" id="dispatch_date" name=dispatch_date   >

                </div>
                    </div>
                  
                    
                   
          </div>
        </form>
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnUpdateDispatch" class="btn btn-info " >Update</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




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




 
$('#showdata').unbind().on('click','.dispatchdata1',function(){
$('#dispatchModal1').modal('show');
var id=$(this).attr('data');

     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id},
      url:'<?php echo url('admin/showDispatchRolls')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
       var html='';
var sno=0;
var totalroll=0;
var total_net_weight=0;
       for(var i=0;i<res.length;i++){
totalroll+=parseInt(res[i].qty);
total_net_weight+=parseFloat(res[i].net_weight);
        sno++
html+='<tr><td>'+sno+'</td>'+
        '<td>'+res[i].dispatch_date+'</td>'+
          '<td>'+res[i].qty+' Rolls</td>'+
            '<td>'+res[i].net_weight+' KG</td>'+
        '</tr>'
       }

       $('#totalQty').html(totalroll);
       $('#totalNetWeight').html(total_net_weight);
   $('#showdispatch').html(html);
        },
        error:function(){
alert('Data Not Found');

        }

});
var net_wt=$(this).attr('data1');

$('#btnDispatch1').unbind().click(function(){
  var rolls=$('input[name=rolls]').val();
    var net_weightdispatch=$('input[name=net_weightdispatch]').val();


     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id,'rolls':rolls,'net_weightdispatch':net_weightdispatch},
      url:'<?php echo url('admin/DispatchDelivery1')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        if(res.success){
     $('#dispatchModal').modal('hide');
     
     location.reload();
   }else{
    alert('Exceeding Dispatch Qty');
   }
        },
        error:function(){
alert('Data Not Found');

        }

});
   });
 
})







var list=[];
var list1=[];
var add1=0;
var bags='';
var bagsplit=0;
var totcore=0;
 
$("#addgross_wt").keyup(function(){
var gross_wt=$(this).val();

 let core=$('input[name=addcore_wt]').val();
 
 
$('input[name=addnet_wt]').val(gross_wt-core);
});
  

$("#addcore_wt").keyup(function(){
var core_wt=$(this).val();

 let gross=$('input[name=addgross_wt]').val();
 $('input[name=addnet_wt]').val(gross-core_wt);
 

});

$('#btnappend').unbind().click(function(){
   
bags++;
      var bag_detail='Core'+bags;

var core=$('#addcore_wt_rolls').val();
var core_no=$('#addcore_no').val();
var qty=$('#addcore_qty').val();
totcore+=parseInt(core*qty);
list.push([bag_detail,qty,core_no,core]);
list1.push([bag_detail,qty,core_no,core]);
var totalcore=$('#addcore_wt').val();
$('#addcore_wt').val(totcore);
var net=$('#addnet_wt').val();
var addgross_wt=$('#addgross_wt').val();
var totalcore=$('#addcore_wt').val();
$('#addnet_wt').val(addgross_wt-totalcore);
  var html='';
   var sno=0;
   
for(var i=0;i<list.length;i++){
  sno++;
  html+='<tr>'+
    '<td>'+sno+'</td>'+
    '<td>'+list[i][0]+'</td>'+
     '<td>'+list[i][1]+'</td>'+
      '<td>'+list[i][2]+'</td>'+

  '<td>'+list[i][3]+'</td>'+ 
   '</tr>';
}
$('#showdata1').html(html);
});

$('#showdata').on('click','.AddData',function(){

list=[];
list1=[];
var id=$(this).attr('data');
var item=$(this).attr('data1');
var data='';
bags=0;
totcore=0;
 
if(item=='bags'){
$('#AddModal').modal('show');
$('input[name=didadd]').val(id);
}
else{

$('#AddModal1').modal('show');
$('input[name=didadd1]').val(id);
   $.ajax({
      type:'ajax',
      method:'get',
     data:{'id':id},
      url:'<?php echo url('admin/showRollsCore')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        if(res.length>0){
        $('#addbag').val(res[0].total_rolls);
         $('#addgross_wt').val(res[0].net_gross_wt);
          $('#addcore_wt').val(res[0].net_cross_wt);
           $('#addremarks').val(res[0].remarks);
            $('#addnet_wt').val(res[0].total_net_weight);
   var html='';
   var sno=0;var i;
   for(i=0;i<res.length;i++){
list.push([res[i].bag_detail,res[i].qty,res[i].core_no,res[i].cross_wt]);
     bags=res[i].bag_detail[4];
     totcore+=parseInt(res[i].cross_wt*res[i].qty);
   } 
 
for(var j=0;j<list.length;j++){
  sno++;
  html+='<tr>'+
    '<td>'+sno+'</td>'+
    '<td>'+list[j][0]+'</td>'+
     '<td>'+list[j][1]+'</td>'+
      '<td>'+list[j][2]+'</td>'+

  '<td>'+list[j][3]+'</td>'+ 
   '</tr>';
}
$('#showdata1').html(html);
}
 

 
        },
        error:function(){
alert('Data Not Found');

        }

});


}})

$('#btnAdd').unbind().click(function(){
var data=$('#formadd').serialize();
     $.ajax({
      type:'ajax',
      method:'get',
     data:data,
      url:'<?php echo url('admin/AddBag')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
     $('#AddModal').modal('hide');
     location.reload();
        },
        error:function(){
alert('Data Not Found');

        }

});
   });



$('#btnAdd1').unbind().click(function(){
      
     var id= $('input[name=didadd1]').val();
       var qty=$('#addbag').val(); 
        var gross=$('#addgross_wt').val();
         var totalcore=$('#addcore_wt').val();
         var remarks=$('#addremarks').val();
         var net_wt=$('#addnet_wt').val();
 
     $.ajax({
      type:'ajax',
      method:'get',
     data:{list1:list1,id:id,qty:qty,gross:gross,totalcore:totalcore,remarks:remarks,net_wt:net_wt},
      url:'<?php echo url('admin/AddRolls')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
     $('#AddModal1').modal('hide');
     location.reload();
        },
        error:function(){
alert('Data Not Found');

        }

});
   });



$('#showdata').on('click','#dispatchdata',function(){

$('#dispatchModal').modal('show');
var id=$(this).attr('data');
var net_wt=$(this).attr('data2');
var did=$(this).attr('data1');
 
$('#btnDispatch').click(function(){
     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id,'net_wt':net_wt,'did':did},
      url:'<?php echo url('admin/DispatchDelivery')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
     $('#dispatchModal').modal('hide');
     location.reload();
        },
        error:function(){
alert('Data Not Found');

        }

});
   });
 
})







$('#showdata').on('click','.addrate',function(){
$('#ModalAdd').modal('show');
var id=$(this).attr('data');
  
     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id},
      url:'<?php echo url('admin/ViewRate')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
$('input[name=did]').val(res.id);     
$('input[name=rate]').val(res.delivery_rate);
// $('input[name=net_amount_hidden]').val(res.total_net_weight);
        },
        error:function(){
alert('Data Not Found');

        }

});
})










$('#btnaddrate').click(function(){
  var rate=$('input[name=rate]').val();
var id=$('input[name=did]').val();
var net_wt=$('input[name=net_amount_hidden]').val();

     $.ajax({
      type:'ajax',
      method:'get',
 data:{'id':id,'net_wt':net_wt,'rate':rate},
      url:'<?php echo url('admin/AddRate')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
$('#ModalAdd').modal('hide'); 
location.reload();
        },
        error:function(){
alert('Data Not Added');

        }

});


})
 $('select[name=cid]').change(function () {
  var cid=$(this).val();
 
     $.ajax({
      type:'ajax',
      method:'get',
 data:{'cid':cid},
      url:'<?php echo url('admin/ShowCustomerD')?>',
      async:false,
      dataType:'html',
       
      success:function(res){
  
        

 $('#showdata').html(res);

}
 

        
        });
 })









 
$("#gross_wt").keyup(function(){
var gross_wt=$(this).val();

 let core=$('input[name=core_wt]').val();
 
 
$('input[name=net_wt]').val(gross_wt-core);
});
 
$("#core_wt").keyup(function(){
var core_wt=$(this).val();

 let gross=$('input[name=gross_wt]').val();
 $('input[name=net_wt]').val(gross-core_wt);
 
});

$("#gross_wtadd").keyup(function(){
var gross_wtadd=$(this).val();

 let core_wtadd=$('input[name=core_wtadd]').val();
 
 
$('input[name=net_wtadd]').val(gross_wtadd-core_wtadd);
});
 
$("#core_wtadd").keyup(function(){
var core_wtadd=$(this).val();

 let gross_wtadd=$('input[name=gross_wtadd]').val();
 $('input[name=net_wtadd]').val(gross_wtadd-core_wtadd);
 
});


$('#showdata').on('click','.editdata',function () {

$('#myModal').modal('show'); 
var id=$(this).attr('data');
var delivery_id=$(this).attr('data1');
var cross_wt=$(this).attr('cross_wt');
var gross_wt=$(this).attr('gross_wt');
var net_wt=$(this).attr('net_wt');

 $('input[name=core_wthidden]').val(cross_wt);
 $('input[name=net_wthidden]').val(net_wt);
 $('input[name=delivery_id]').val(delivery_id);
$('input[name=gross_wthidden]').val(gross_wt);

  var url='<?php echo url('admin/DeliveryChallanEdit/')?>';

  $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
  
$('input[name=id]').val(response.id); 
 $('input[name=core_wt]').val(response.cross_wt);
 $('input[name=net_wt]').val(response.net_wt);
 $('input[name=bag]').val(response.bag_detail);
$('input[name=gross_wt]').val(response.gross_wt);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})












$('#showdata').on('click','.editdispatch',function () {

$('#editDModal').modal('show'); 
var id=$(this).attr('data');
var dispatch_qty=$(this).attr('dispatch_qty');
var dispatch_remarks=$(this).attr('dispatch_remarks');
var dispatch_date=$(this).attr('dispatch_date');
 var dispatch_wt=$(this).attr('dispatch_wt');

 $('input[name=dispatch_qty]').val(dispatch_qty);
 $('input[name=dispatch_remarks]').val(dispatch_remarks);
 $('input[name=dispatch_date]').val(dispatch_date);
$('input[name=dispatch_id]').val(id);
$('input[name=dispatch_wt]').val(dispatch_wt);

   
 



});






$('#showdata').on('click','.editdata1',function () {

$('#EditModal').modal('show'); 
 
var id=$(this).attr('data');
var delivery_id=$(this).attr('data1');
var cross_wt=$(this).attr('cross_wt');
var gross_wt=$(this).attr('gross_wt');
var net_wt=$(this).attr('net_wt');

 $('input[name=id1]').val(id);
 $('input[name=core_wthidden1]').val(cross_wt);

 $('input[name=net_wthidden1]').val(net_wt);

 $('input[name=delivery_id1]').val(delivery_id);

 $('input[name=gross_wthidden1]').val(gross_wt);
$('#spancore').html(cross_wt);
  var url='<?php echo url('admin/DeliveryChallanEdit/')?>';

  $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
  
$('input[name=id1]').val(response.id); 
 $('input[name=core_wt1]').val(response.cross_wt);
 $('input[name=qty1]').val(response.qty);
 $('input[name=bag1]').val(response.bag_detail);
$('input[name=core_no1]').val(response.core_no);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})











$('#showdata').on('click','.deleteDelivery',function () {

$('#deleteDeliveryModal').modal('show'); 

var id=$(this).attr('data');
 
$('#btndeleteDelivery').unbind().click(function(){
  var url='<?php echo url('admin/DeleteDelivery/')?>';
 
  $.ajax({
    type:'ajax',
    method:'get',
    data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteDeliveryModal').modal('hide');
       
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();
 location.reload(true);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});




$('#showdata').on('click','.deletedispatch',function () {

$('#deleteModalDispatch').modal('show'); 

var id=$(this).attr('data');
 
$('#btnDeleteDispatch').unbind().click(function(){
  var url='<?php echo url('admin/DeleteDispatch/')?>';
 
  $.ajax({
    type:'ajax',
    method:'get',
    data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteModalDispatch').modal('hide');
       
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();
 location.reload(true);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});






$('#showdata').on('click','.deletedata1',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');
var delivery_id=$(this).attr('data1');
var cross_wt=$(this).attr('cross_wt');
var gross_wt=$(this).attr('gross_wt');
var net_wt=$(this).attr('net_wt');
  
$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/DeliveryChallanDelete1/')?>';
 
  $.ajax({
    type:'ajax',
    method:'get',
    data:{'id':id,'delivery_id':delivery_id,'gross_wt':gross_wt,'cross_wt':cross_wt,'net_wt':net_wt},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteModal').modal('hide');
       
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();
 location.reload(true);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});



$('#showdata').on('click','.deletedata',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');
var delivery_id=$(this).attr('data1');
var cross_wt=$(this).attr('cross_wt');
var gross_wt=$(this).attr('gross_wt');
var net_wt=$(this).attr('net_wt');
  
$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/DeliveryChallanDelete/')?>';
 

  $.ajax({
    type:'ajax',
    method:'get',
    data:{'id':id,'delivery_id':delivery_id,'gross_wt':gross_wt,'cross_wt':cross_wt,'net_wt':net_wt},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteModal').modal('hide');
       
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();
 location.reload(true);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});

  $('#btnUpdate').unbind().click(function(){
var id=$('input[name=id]').val();


  var url='<?php echo url('admin/DeliveryChallanUpdate')?>';
var data=$('#form1').serialize();

  $.ajax({
   
    method:'get',
    data:data,
    url:url,
 
    async:false,
    success:function(response){

       
            $('#myModal').modal('hide');
      location.reload();
  
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
  $('#showdata').on('click','.printdata',function(){
  var id=$(this).attr('data');
window.location.href='{{url("admin/ChallanPrint")}}/'+id+'';
});



 $('#btnUpdateDispatch').unbind().click(function(){
 

  var url='<?php echo url('admin/UpdateDispatch')?>';
var data=$('#formdisatch').serialize();
 
  $.ajax({
   
    method:'post',
    data:data,
    url:url,
 
    async:false,
    success:function(response){

       
            $('#editDModal').modal('hide');
      location.reload();
  
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });


  $('#btnUpdate1').unbind().click(function(){
var id=$('input[name=id1]').val();


  var url='<?php echo url('admin/DeliveryChallanUpdate1')?>';
var data=$('#formUpdate').serialize();

  $.ajax({
   
    method:'get',
    data:data,
    url:url,
 
    async:false,
    success:function(response){

       
            $('#EditModal').modal('hide');
      location.reload();
  
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
  $('#showdata').on('click','.printdata',function(){
  var id=$(this).attr('data');
window.location.href='{{url("admin/ChallanPrint")}}/'+id+'';
});



  });
</script>

    @endsection('content')
 

@extends('admin/footer')