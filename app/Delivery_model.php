<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Delivery_model extends Model {



public static function InsertDeliveryChallan($request){
  $total_net_wt=0;
  $total_gross_wt=0;
  $total_cross_wt=0;
  $totalRolls=0;
  $remarks='';
  $rate=0;
if($request->list==''){

 foreach($request->list1 as $list1) {
    $total_net_wt=$list1[4];
     $total_gross_wt=$list1[2];
  $total_cross_wt+=$list1[3];
  $remarks=$list1[5];
  $rate=$list1[10];
  $totalRolls=$list1[6];
  if($rate==''){
$rate=0;
  }else{
$rate=$list1[10];
  }
  
   }
DB::table('orders')->where('id',$request->id)->update(['delivery_rate'=>$rate]);
DB::update('update delivery_challan set rate='.$rate.',net_amount=total_net_weight*'.$rate.' where order_id='.$request->id.'');
    $data=array(
        'customer_id'=>$request->cid,
        'product_id'=>$request->product_id,
         'order_id'=>$request->id,
          'item'=>'rolls',
           'total_net_weight'=>round($total_net_wt,2),
           'total_rolls'=>$totalRolls,
         'net_gross_wt'=>round($total_gross_wt,2),
         'net_cross_wt'=>round($total_cross_wt,2),
         'remarks'=>$remarks,
            'rate'=>$rate,
         'net_amount'=>round($total_net_wt,2)*$rate
          
          
    );
     DB::table('delivery_challan')->insert($data);
        $id = DB::getPdo()->lastInsertId();
 
    foreach($request->list1 as $list1) {
    
     $data3=array(
      'delivery_id'=>$id,
      'bag_detail'=>$list1[1],
      'qty'=>$list1[7],
      'cross_wt'=>round($list1[9],2),
        'core_no'=>round($list1[8],2),
         'gross_wt'=>'',
            'net_wt'=>'',
     
    );

$qry=DB::table('bag_info')->insert($data3);
 // $id1= DB::getPdo()->lastInsertId();
 //    $data4=array(
 //      'bag_id'=>$id1,
 //       'qty'=>$list1[6],
 //     );
 //    $qry=DB::table('core')->insert($data4);
 }

}
else{
    foreach($request->list as $list) {
    $total_net_wt+=$list[4];
     $total_gross_wt+=$list[2];
  $total_cross_wt+=$list[3];
  $remarks=$list[5];
  $rate=$list[6];
   }
DB::table('orders')->where('id',$request->id)->update(['delivery_rate'=>$rate]);
DB::update('update delivery_challan set rate='.$rate.',net_amount=total_net_weight*'.$rate.' where order_id='.$request->id.'');

    $data=array(
        'customer_id'=>$request->cid,
        'product_id'=>$request->product_id,
         'order_id'=>$request->id,
          'item'=>'bags',
         'total_net_weight'=>round($total_net_wt,2),
         'net_gross_wt'=>round($total_gross_wt,2),
         'net_cross_wt'=>round($total_cross_wt,2),
         'remarks'=>$remarks,
         'rate'=>$rate,
          'net_amount'=>round($total_net_wt,2)*$rate
 
          
    );
     DB::table('delivery_challan')->insert($data);
        $id = DB::getPdo()->lastInsertId();
 
    foreach($request->list as $list) {
  
     $data3=array(
      'delivery_id'=>$id,
      'bag_detail'=>$list[1],
      'cross_wt'=>round($list[3],2),
         'gross_wt'=>round($list[2],2),
            'net_wt'=>round($list[4],2),
     
    );

$qry=DB::table('bag_info')->insert($data3);
 }

 
  

    
  }
   
}
 




public static function InsertDirectDelivery($request){

$id=$request->id;
$cid=$request->cid;
$product_id=$request->product_id;
$remarks=$request->remarks;
$qty=$request->qty;
$wt=$request->wt;
$item=$request->item;
if($item=='bag'){
$item='bags';
}
else{
$item='rolls';
}
DB::table('delivery_challan')->insert(['order_id'=>$id,'customer_id'=>$cid,'product_id'=>$product_id,'item'=>$item]);
   $lastInsertId = DB::getPdo()->lastInsertId();


DB::table('dispatch_rolls')->insert(['delivery_id'=>$lastInsertId,'net_weight'=>round($wt,1),'qty'=>$qty,'dispatch_date'=>date('Y-m-d'),'dispatch_remarks'=>$remarks]);



  }
  
  
public static function UpdateDispatch($request){
   $id=$request->dispatch_id;
   $data=array(
    'qty'=>$request->dispatch_qty,
    'net_weight'=>$request->dispatch_wt,
    'dispatch_date'=>$request->dispatch_date,
    'dispatch_remarks'=>$request->dispatch_remarks
    );
   DB::table('dispatch_rolls')->where('id',$id)->update($data);


}

public static function DeleteDispatch($request){
   $id=$request->id;
   DB::table('dispatch_rolls')->where('id',$id)->delete();
   }
   public static function DeleteDelivery($request){
   $id=$request->id;
   DB::table('dispatch_rolls')->where('delivery_id',$id)->delete();
   DB::table('delivery_challan')->where('id',$id)->delete();
     DB::table('bag_info')->where('delivery_id',$id)->delete();
   }
   


public static function showRollsCore($request){
   $id=$request->id;

$qry=DB::table('delivery_challan as d')->leftJoin('bag_info as b','b.delivery_id','=','d.id')->where('d.id',$id)->get();
 return $qry;
 }

public static function DeliveryChallanUpdate($request){
   $id=$request->id;
 $delivery_id=$request->delivery_id;
 $gross_wt=round($request->gross_wthidden,2);
$cross_wt=round($request->core_wthidden,2);
$net_wt=round($request->net_wthidden,2);
DB::update('update delivery_challan set net_gross_wt=net_gross_wt+('.round($request->gross_wt,2).'-'.round($gross_wt,2).'),total_net_weight=total_net_weight+('.round($request->net_wt,2).'-'.round($net_wt,2).'),net_cross_wt=net_cross_wt+('.round($request->core_wt,2).'-'.round($cross_wt,2).'),net_amount=rate*total_net_weight where id='.$delivery_id.'');

   $data=array('bag_detail'=>$request->bag,
      'cross_wt'=>round($request->core_wt,2),
         'gross_wt'=>round($request->gross_wt,2),
            'net_wt'=>round($request->net_wt,2),
          );
   DB::table('bag_info')->where('id',$id)->update($data);
}







public static function DeliveryChallanUpdate1($request){
   $id=$request->id1;
 $delivery_id=$request->delivery_id1;
 $gross_wt=round($request->gross_wthidden1,2);
 $qty=$request->qty1;
 $core_wt=$request->core_wt1;
$cross_wt=round($request->core_wthidden1,2);
$net_wt=round($request->net_wthidden1,2);
$tcore=round($core_wt*$qty,2);
DB::update('update delivery_challan set total_net_weight=total_net_weight+('.$cross_wt.'-'.$tcore.'),net_cross_wt=net_cross_wt+('.$tcore.'-'.$cross_wt.')
  ,net_amount=rate*total_net_weight where id='.$delivery_id.'');

   $data=array('bag_detail'=>$request->bag1,
      'cross_wt'=>round($request->core_wt1,2),
         'core_no'=>round($request->core_no1,2),
            'qty'=>round($request->qty1,2),
          );
   DB::table('bag_info')->where('id',$id)->update($data);
}








public static function DispatchDelivery($request){
   $id=$request->id;
    $qry=DB::table('bag_info')->where('id',$id)->first();
    if($qry->dispatch_status=='Dispatched'){
return 'ok';
    }
    else{
      DB::table('dispatch_rolls')->insert(['delivery_id'=>$request->did,'net_weight'=>$request->net_wt, 'dispatch_date'=>date('Y-m-d')]);
   $data=array(
    'dispatch_status'=>'Dispatched',
     'dispatch_date'=>date('Y-m-d'), 
          );
   DB::table('bag_info')->where('id',$id)->update($data);
    }

}
public static function AddBag($request){
 
   $data=array(
  'delivery_id'=>$request->didadd,
      'bag_detail'=>$request->bagadd,
       
      'cross_wt'=>round($request->core_wtadd,2),

         'gross_wt'=>round($request->gross_wtadd,2),
            'net_wt'=>round($request->net_wtadd,2), 
          );
   DB::table('bag_info')->insert($data);
   DB::update("update delivery_challan set net_amount=net_amount+(rate*$request->net_wtadd),total_net_weight=total_net_weight+'$request->net_wtadd',net_cross_wt=net_cross_wt+$request->core_wtadd,net_gross_wt=net_gross_wt+'$request->gross_wtadd' where id='$request->didadd'");
}
     
public static function AddRolls($request){
 $qry=DB::table('delivery_challan')->where('id',$request->didadd1)->first();
  $list=$request->list1;
 if($list!=''){
foreach ($list as $l) {
  # c
   $data=array(
  'delivery_id'=>$request->id,
      'bag_detail'=>$l[0],
       'qty'=>$l[1],
       'core_no'=>$l[2],
      'cross_wt'=>round($l[3],2),

          );
   DB::table('bag_info')->insert($data);
   }
}
   DB::update("update delivery_challan set total_net_weight=$request->net_wt,net_gross_wt=$request->gross,remarks='$request->remarks',total_rolls=$request->qty,net_cross_wt=$request->totalcore,net_amount=total_net_weight*rate where id=$request->id");
}
     



public static function showDispatchRolls($request){
   $id=$request->id;
 $qry=DB::select("SELECT * FROM dispatch_rolls WHERE delivery_id='$id'");
 return $qry;


 }
public static function DispatchDelivery1($request){
   $id=$request->id;
  $qry1=DB::table('delivery_challan')->where('id',$id)->first();
   $qry=DB::select("SELECT  sum(qty) as qty,sum(net_weight) as net_weight FROM `dispatch_rolls` WHERE delivery_id='$id'");
  
   
   $total=$qry1->total_rolls-$qry[0]->qty;
    $total1=$qry1->total_net_weight-$qry[0]->net_weight;
    
  DB::table('dispatch_rolls')->insert(['delivery_id'=>$id,'qty'=>$request->rolls,'net_weight'=>round($request->net_weightdispatch,2),'dispatch_date'=>date('Y-m-d')]);
 
return 'true';

 
}


public static function AddRate($request){
   $id=$request->id;
   $data=array(
    'delivery_rate'=>$request->rate,    
          );
   DB::table('orders')->where('id',$id)->update($data);
DB::update('update delivery_challan set rate='.$request->rate.' ,net_amount=total_net_weight*'.$request->rate.' where order_id='.$id.'');
}

public static function ViewRate($request){
   $id=$request->id;
   return DB::table('orders')->where('id',$id)->first();

}



public static function DeliveryChallanDelete1($request){
   $id=$request->id;
  $cross_wt=round($request->cross_wt,2);

 DB::update('UPDATE `delivery_challan` SET  net_cross_wt=net_cross_wt-'.$cross_wt.',total_net_weight=total_net_weight+'.$cross_wt.',net_amount=rate*(total_net_weight) where id='.$request->delivery_id.'');
 

   DB::table('bag_info')->where('id',$id)->delete(); 

}
public static function DeliveryChallanDelete($request){
   $id=$request->id;
   $gross_wt=round($request->gross_wt,2);
$cross_wt=round($request->cross_wt,2);
$net_wt=round($request->net_wt,2);
 DB::update('UPDATE `delivery_challan` SET  net_cross_wt=net_cross_wt-'.$cross_wt.',net_gross_wt=net_gross_wt-'.$gross_wt.',total_net_weight=total_net_weight-'.$net_wt.',net_amount=rate*(total_net_weight) where id='.$request->delivery_id.'');
 

   DB::table('bag_info')->where('id',$id)->delete(); 

}

public static function DeliveryChallanEdit($request){
   $id=$request->id;

  $qry=DB::table('bag_info')->where('id',$id)->first();
  return $qry;
}

public static function CustomerSearch($request){
 
   $cid=$request->cid;

   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.customer_id',$cid)->orderBy('o.id','desc')->get();



    return $qry;
}


public static function ShowCustomerD($request){
  $id=$request->cid;
 $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$id)->orderBy('d.id','desc')->get();

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
}
 
public static function ShowDeliveryChallan($request){
  
   $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->orderBy('d.id','desc')->get();



    return $qry;
}

public static function ChallanPrint($id){
  
   $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.remarks as remarkso','o.remarks','o.date_commited','b.qty as qty1','o.date_received','d.total_net_weight','d.net_cross_wt','d.net_gross_wt','o.qty','b.bag_detail','b.net_wt','b.gross_wt','b.cross_wt','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','pt.name','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('product_type as pt','pt.id','=','p.product_type_id')->leftJoin('bag_info as b','d.id','=','b.delivery_id')->join('customer as c','c.id','=','d.customer_id')->join('orders as o','o.id','=','d.order_id')->where('d.id',$id)->get();



    return $qry;
}
 
 



 public static function ShowBagsInfo($request){
  $html='';
   $sno=0;
   $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.created_at','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->orderBy('d.id','desc')->paginate(10);
   foreach ($qry as $res) {
    $sno++;
       $html.='<tr>
 <td>'.$sno.'</td>
  <td>'.$res->oid.'</td>

               
             <td>'.$res->customer_name.'</td>
              <td style=width:100px>'.$res->date_commited.'</td>

             <td>'.$res->product_name.'</td>
              <td colspan=5></td>
               
       
               </tr>';
               $qry1=DB::table('bag_info')->where('delivery_id',$res->delivery_id)->get();
               foreach ($qry1 as $res1) {
       $html.='<tr>
 <td></td>
  <td></td>
   <td></td>
    
     <td></td>
      <td></td>
  <td>'.$res1->bag_detail.'</td>

               
             <td>'.$res1->gross_wt.'</td>
              <td style=width:100px>'.$res1->cross_wt.'</td>

             <td>'.$res1->net_wt.'</td>
             <td><a href=javascript:; style="font-size:30px" data='.$res->id.'   class="editdata text-primary"><i class="fa fa-edit" style="font-size:20px!important"></i></a> <a href=javascript:; style="font-size:30px" data='.$res->id.'     class="deletedata text-danger"><i class="fa fa-trash"  style="font-size:20px!important"></i></a></td>
       
               </tr>';
             }
   }
 
 $html.='<tr><td>'.$qry->links().'</td></tr>';


    return $html;
}
 
}