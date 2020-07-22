<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Report_model extends Model {

 



public static function ShowOrderReport($request){
 
   $from_date=$request->from_dae;
   $to_date=$request->to_dae;
   if($from_date==''){
  $qry=DB::table('orders as o')->select('o.date_commited','o.created_at','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->whereBetween('o.created_at', [$to_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('o.id','desc')->get();
   }
   else if($to_date==''){
  $qry=DB::table('orders as o')->select('o.date_commited','o.created_at','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->whereBetween('o.created_at', [$from_date.' 00:00:00',$from_date.' 23:59:59'])->orderBy('o.id','desc')->get();
   }
   else{

    $qry=DB::table('orders as o')->select('o.date_commited','o.created_at','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->orderBy('o.id','desc')->get();
   }

   



    return $qry;
}




public static function ShowInProcessReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id and o.status="In Process" order by o.id desc');
return $qry;

}


public static function ShowPendingReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id and (o.status="Pending-Lam1" or o.status="Pending-Lam2" or o.status="Pending-Pouching" or o.status="Pending-Slitting" or o.status="Pending-Rewind"  ) order by o.id desc');
return $qry;

}


public static function ShowScheduledReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id and o.status="Scheduled" order by o.id desc');
return $qry;

}


public static function ShowNotStartedReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id and o.status="Not Started" order by o.id desc');
return $qry;

}


public static function ShowReleasedReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id and o.status="Released" order by o.id desc');
return $qry;

}



public static function ShowInProcessFReport($request){
  $from_date=$request->from_date;
  $to_date=$request->to_date;

$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id  and o.date_received>='$from_date' and o.date_received<='$to_date' and o.status='In Process'  order by o.id ");
return $qry;

}



public static function ShowReleasedFReport($request){
  $from_date=$request->from_date;
  $to_date=$request->to_date;

$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id  and o.date_received>='$from_date' and o.date_received<='$to_date' and o.status='Released'  order by o.id ");
return $qry;

}



public static function ShowNotStartedFReport($request){
  $from_date=$request->from_date;
  $to_date=$request->to_date;

$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id  and o.date_received>='$from_date' and o.date_received<='$to_date' and o.status='Not Started'  order by o.id ");
return $qry;

}

public static function ShowPendingFReport($request){
  $from_date=$request->from_date;
  $to_date=$request->to_date;

$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id  and o.date_received>='$from_date' and o.date_received<='$to_date'  and (o.status='Pending-Lam1' or o.status='Pending-Lam2' or o.status='Pending-Pouching' or o.status='Pending-Slitting' or o.status='Pending-Rewind' )   order by o.id ");
return $qry;

}

public static function ShowScheduledFReport($request){
  $from_date=$request->from_date;
  $to_date=$request->to_date;

$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.date_commited,o.date_received,o.qty,pt.name,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c,product_type as pt where p.id=o.product_id  and pt.id=p.product_type_id and c.id=o.customer_id  and o.date_received>='$from_date' and o.date_received<='$to_date' and o.status='Scheduled'  order by o.id ");
return $qry;

}














public static function Show2CReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="2C" and o.status!="Completed"  and o.status!="Cancelled" order by o.priority=0,o.priority  limit 10');
return $qry;

}


public static function Show4CReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="4C" and o.status!="Completed"  and o.status!="Cancelled"  order by o.priority=0,o.priority   limit 10');
return $qry;

}


public static function Show8CReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="8C" and o.status!="Completed"  and o.status!="Cancelled" order by o.priority=0,o.priority   limit 10');
return $qry;

}


public static function Show6CReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="6C" and o.status!="Completed"  and o.status!="Cancelled" order by o.priority=0,o.priority   limit 10');
return $qry;

}


public static function ShowLAMSReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="Lam-S" and o.status!="Completed"  and o.status!="Cancelled" order by o.priority=0,o.priority   limit 10');
return $qry;

}


public static function ShowLAMBReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="Lam-B" and o.status!="Completed"  and o.status!="Cancelled"  order by o.priority=0,o.priority   limit 10');
return $qry;

}


public static function ShowFLEXOSReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="Flexo-S" and o.status!="Completed"  and o.status!="Cancelled" order by o.priority=0,o.priority   limit 10');
return $qry;

}


public static function ShowFLEXOBReport($request){
$qry=DB::select('SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine="Flexo-B" and o.status!="Completed"  and o.status!="Cancelled"  order by o.priority=0,o.priority   limit 10');
return $qry;

}


 

public static function UpdateInProcessStatus($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
             'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}


public static function UpdateReleasedStatus($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
             'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}


public static function UpdatePendingStatus($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
             'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}


public static function UpdateNotStartedStatus($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
             'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}


public static function UpdateScheduledStatus($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
             'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}



public static function UpdateFlexoBMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
             'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}
public static function UpdateFlexoSMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              
              'machine'=>$arr['machine'],
              'priority'=>$arr['priority'],
               'status'=>$arr['status'],

    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}
}

public static function UpdateLamSMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
               'priority'=>$arr['priority'],
               'status'=>$arr['status'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}

public static function UpdateLamBMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
               'priority'=>$arr['priority'],
               'status'=>$arr['status'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}

}

public static function Update2CMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
               'priority'=>$arr['priority'],
               'status'=>$arr['status'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}
}
public static function Update4CMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
               'priority'=>$arr['priority'],
               'status'=>$arr['status'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}
}

public static function Update6CMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
              'status'=>$arr['status'],
             'priority'=>$arr['priority'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}
}
public static function Update8CMachine($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
          
            'remarks'=>$arr['remarks'],
               'priority'=>$arr['priority'],
               'status'=>$arr['status'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}


}

public static function Show2CFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit=='' || $limit==0){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='2C' and o.status!='Completed'  and o.status!='Cancelled'  order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='2C' and o.status!='Completed'  and o.status!='Cancelled'    and  o.status in ('$status')  order by o.priority=0,o.priority   limit $limit ");
}
return $qry;

}





public static function Show4CFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit==''){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='4C' and o.status!='Completed'  and o.status!='Cancelled'   order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='4C'  and o.status!='Completed'  and o.status!='Cancelled'  and  o.status in ('$status')  order by o.priority=0,o.priority   limit $limit ");
}
return $qry;

}



public static function Show6CFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit==''){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='6C' and o.status!='Completed'  and o.status!='Cancelled'  order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='6C' and o.status!='Completed'  and o.status!='Cancelled'  and  o.status in ('$status')  order by o.priority=0,o.priority   limit $limit ");
}
return $qry;

}




public static function Show8CFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit==''){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='8C' and o.status!='Completed'  and o.status!='Cancelled'   order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='8C' and o.status!='Completed'  and o.status!='Cancelled'  and  o.status in ('$status')  order by o.priority=0,o.priority    limit $limit ");
}
return $qry;

}



public static function ShowLAMSFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit==''){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Lam-S' and o.status!='Completed'  and o.status!='Cancelled'   order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Lam-B' and o.status!='Completed'  and o.status!='Cancelled'   and  o.status in ('$status')  order by o.priority=0,o.priority    limit $limit ");
}
return $qry;

}



public static function ShowLAMBFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit==''){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Lam-B'  and o.status!='Completed'  and o.status!='Cancelled'   order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Lam-B' and o.status!='Completed'  and o.status!='Cancelled'   and  o.status in ('$status')  order by o.priority=0,o.priority    limit $limit ");
}
return $qry;

}



public static function ShowFLEXOSFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit=='' || $limit==0){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Flexo-S'  and o.status!='Completed'  and o.status!='Cancelled'   order by o.priority=0,o.priority   limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Flexo-S'  and o.status!='Completed'  and o.status!='Cancelled'   and  o.status in ('$status')  order by o.priority=0,o.priority    limit $limit ");
}
return $qry;

}

public static function ShowFLEXOBFReport($request){
  $status=$request->status;
 
  $limit=$request->limit;
if($limit==''){
  $limit='18446744073709551615';
}
if($status==''){

  $qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Flexo-B' and o.status!='Completed'  and o.status!='Cancelled'   order by o.priority=0,o.priority    limit $limit ");
}
else{
    $status = implode("','",$status);
$qry=DB::select("SELECT o.id as oid,o.machine,o.priority,o.total_polyster_wt,o.status,o.remarks,p.Polyster_size,p.product_name as product_name,c.customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.machine='Flexo-B' and o.status!='Completed'  and o.status!='Cancelled'   and  o.status in ('$status')  order by o.priority=0,o.priority    limit $limit ");
}
return $qry;

}
public static function ShowPolysterReport($request){
$qry=DB::select('SELECT p.Polyster_size,o.machine,sum(o.total_polyster_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status="Scheduled" and p.Polyster_size !=""  GROUP by p.Polyster_size');
return $qry;

}

public static function ShowMPolysterReport($request){
$qry=DB::select('SELECT p.M_Polyster_size,o.machine,sum(o.t_m_polyster_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status="Scheduled" and p.M_Polyster_size !="" GROUP by p.M_Polyster_size');
return $qry;

}

public static function ShowMBoppReport($request){
$qry=DB::select('SELECT p.m_bopp_size,o.machine,sum(o.t_m_bopp_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status="Scheduled" and p.m_bopp_size !="" GROUP by p.m_bopp_size');
return $qry;

}

public static function ShowBoppReport($request){
$qry=DB::select('SELECT p.bopp_size,o.machine,sum(o.t_bopp_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status="Scheduled" and p.bopp_size !="" GROUP by p.bopp_size');
return $qry;

}

public static function ShowPolyReport($request){
$qry=DB::select('SELECT p.poly,o.machine,sum(o.total_poly_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status="Scheduled" and p.poly !="" GROUP by p.poly');
return $qry;

}

public static function ShowMilkyPolyReport($request){
$qry=DB::select('SELECT p.MILKY_POLY_size,o.machine,sum(o.t_milky_poly_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and o.status="Scheduled" and c.id=o.customer_id and p.MILKY_POLY_size !=""  GROUP by p.MILKY_POLY_size');
return $qry;

}

public static function ShowPerlizedReport($request){
$qry=DB::select('SELECT p.PERILIZED_size,o.machine,sum(o.t_perilized_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and o.status="Scheduled" and p.PERILIZED_size !=""  and c.id=o.customer_id GROUP by p.PERILIZED_size');
return $qry;

}



















public static function ShowFPolysterReport($request){
  $status=$request->status;
   $status = implode("','",$status);

$qry=DB::select("SELECT p.Polyster_size,sum(o.total_polyster_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status in ('$status') and p.Polyster_size !=''  GROUP by p.Polyster_size");
return $qry;

}

public static function ShowFMPolysterReport($request){
   $status=$request->status;
   $status = implode("','",$status);
   
$qry=DB::select("SELECT p.M_Polyster_size,sum(o.t_m_polyster_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id and o.status in ('$status') and p.M_Polyster_size !='' GROUP by p.M_Polyster_size");
return $qry;

}

public static function ShowFMBoppReport($request){
    $status=$request->status;
   $status = implode("','",$status);
$qry=DB::select("SELECT p.m_bopp_size,sum(o.t_m_bopp_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id  and o.status in ('$status')  and p.m_bopp_size !='' GROUP by p.m_bopp_size");
return $qry;

}

public static function ShowFBoppReport($request){
  $status=$request->status;
   $status = implode("','",$status);
$qry=DB::select("SELECT p.bopp_size,sum(o.t_bopp_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id  and o.status in ('$status')  and p.bopp_size !='' GROUP by p.bopp_size");
return $qry;

}

public static function ShowFPolyReport($request){
   $status=$request->status;
   $status = implode("','",$status);
$qry=DB::select("SELECT p.poly,sum(o.total_poly_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and c.id=o.customer_id  and o.status in ('$status') and p.poly !='' GROUP by p.poly");
return $qry;

}

public static function ShowFMilkyPolyReport($request){
   $status=$request->status;
   $status = implode("','",$status);
$qry=DB::select("SELECT p.MILKY_POLY_size,sum(o.t_milky_poly_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and o.status in ('$status') and c.id=o.customer_id and p.MILKY_POLY_size !=''  GROUP by p.MILKY_POLY_size");
return $qry;

}

public static function ShowFPerlizedReport($request){
   $status=$request->status;
   $status = implode("','",$status);
$qry=DB::select("SELECT p.PERILIZED_size,sum(o.t_perilized_wt) as total,GROUP_CONCAT(DISTINCT(p.product_name)) as product_name,GROUP_CONCAT(DISTINCT(c.customer_name)) as customer_name from orders as o,product as p,customer as c where p.id=o.product_id and o.status in ('$status') and p.PERILIZED_size !=''  and c.id=o.customer_id GROUP by p.PERILIZED_size");
return $qry;

}













public static function SimpleReportFilter($request){
  $cid=$request->cid;
$pid=$request->pid;
$from_date=$request->from_date;
$to_date=$request->to_date;
$oid=$request->oid;
$all=$request->all;
$qry='';
$status='';
if($all=='Pending'){
$status='and o.status="Pending"';
}
else if($all=='Completed'){
$status='and o.status="Completed"';
}
else{
$status='';
}
if($from_date=='' && $to_date=='' && $oid=='' && $pid==''){


$qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id and c.id='$cid' $status group by o.id order by o.id  desc");
 
}

else if($from_date=='' && $to_date=='' && $oid=='' && $cid==''){


$qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id and p.id='$pid' $status  group by o.id order by o.id  desc");

}

else if($from_date=='' && $to_date=='' && $cid=='' && $pid==''){

$qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id and o.id='$oid' $status   group by o.id order by o.id  desc");
 
}

else if($cid=='' && $oid=='' && $pid==''){
    $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status  group by o.id order by o.id  desc");
 
}


else if($cid=='' && $pid=='' )
{ 
 $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id and o.id='$oid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status group by o.id order by o.id desc");
 
}
else if($cid=='' && $from_date=='' && $to_date=='')
{
     $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id and o.id='$oid' and p.id='$pid' $status group by o.id order by o.id  desc");
 
}
 
else if($cid=='' && $oid=='' )
{
      $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and p.id='$pid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status group by o.id order by o.id  desc");
  
}
else if($pid=='' && $from_date=='' && $to_date=='')
{

      $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and o.id='$oid' and c.id='$cid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date')  $status group by o.id order by o.id  desc");
 
}
else if($pid=='' && $oid=='')
{

      $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and c.id='$cid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status group by o.id order by o.id  desc");

}
else if($from_date=='' && $to_date=='' && $oid=='')
{

      $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and c.id='$cid' and p.id='$pid' $status  group by o.id order by o.id  desc");

}


else if($cid=='' ){
       $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and p.id='$pid'  and o.id='$oid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status group by o.id order by o.id  desc");
 
}
else if($pid=='' ){
       $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and c.id='$cid'  and o.id='$oid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status group by o.id order by o.id desc");


}
else if($from_date=='' && $to_date==''){
 
  $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and c.id='$cid'  and o.id='$oid' and p.id='$pid' $status  group by o.id order by o.id desc");


}

elseif ($oid=='') {
       $qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and c.id='$cid'  and p.id='$pid' and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') $status group by o.id order by o.id desc");
 

}

return $qry;

}






public static function AdvanceReportFilter($request){
  $cid=$request->cid;
$pid=$request->pid;
$from_date=$request->from_date;
$to_date=$request->to_date;
$oid=$request->oid;
$qry='';
if($from_date=='' && $to_date=='' && $oid=='' && $pid==''){
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->orderBy('d.id','desc')->get();
}

else if($from_date=='' && $to_date=='' && $oid=='' && $cid==''){
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('p.id',$pid)->orderBy('d.id','desc')->get();
}

else if($from_date=='' && $to_date=='' && $cid=='' && $pid==''){
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('o.id',$oid)->orderBy('d.id','desc')->get();
}

else if($cid=='' && $oid=='' && $pid==''){
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();
}


else if($cid=='' && $pid=='' )
{
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('o.id',$oid)->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();
}
else if($cid=='' && $from_date=='' && $to_date=='')
{
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('p.id',$pid)->where('o.id',$oid)->orderBy('d.id','desc')->get();
}
 
else if($cid=='' && $oid=='' )
{
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('p.id',$pid)->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();
}
else if($pid=='' && $from_date=='' && $to_date=='')
{
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->where('o.id',$oid)->orderBy('d.id','desc')->get();
}
else if($pid=='' && $oid=='')
{
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();
}
else if($from_date=='' && $to_date=='' && $oid=='')
{
$qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->where('p.id',$pid)->orderBy('d.id','desc')->get();
}


else if($cid=='' ){
 $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('p.id',$pid)->where('o.id',$oid)->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();
}
else if($pid=='' ){
 $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->where('o.id',$oid)->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();

}
else if($from_date=='' && $to_date==''){
 $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->where('p.id',$pid)->where('o.id',$oid)->orderBy('d.id','desc')->get();

}

elseif ($oid=='') {
    $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.created_at','d.rate','d.net_amount','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->where('c.id',$cid)->where('p.id',$pid)->whereBetween('d.created_at',[$from_date.' 00:00:00',$to_date.' 23:59:59'])->orderBy('d.id','desc')->get();

}



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
}














public static function ShowDispatchOrdersByDate($request){
 
   $from_date=$request->from_dae;
   $to_date=$request->to_dae;
   if($from_date==''){
   
$qry=DB::select("SELECT c.customer_name,o.id,d.id as did,o.created_at,p.product_name,pt.name,d.status,o.qty,max(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and b.dispatch_date='$to_date'  group by b.delivery_id   order by b.dispatch_date desc");
   }
   else if($to_date==''){

$qry=DB::select("SELECT c.customer_name,o.id,d.id as did,o.created_at,p.product_name,pt.name,d.status,o.qty,max(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and b.dispatch_date='$from_date'  group by b.delivery_id   order by b.dispatch_date desc");
   }
   else{


$qry=DB::select("SELECT c.customer_name,o.id,d.id as did,o.created_at,p.product_name,pt.name,d.status,o.qty,max(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id  and (b.dispatch_date>='$from_date' and b.dispatch_date<='$to_date') group by b.delivery_id   order by b.dispatch_date desc");
   }

   



    return $qry;
}


public static function OrderCompletion($request){
$id=$request->id;
$qry=DB::table('orders')->where('id',$id)->first();
if($qry->status=='Pending'){
$status='Completed';
}
else{
$status='Pending';
}
DB::table('orders')->where('id',$id)->update(['status'=>$status]);
}


public static function ShowDispatchOrders1($request){
// SELECT  sum(d.rate) as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d
// Inner Join orders as o on o.id=d.order_id
// INNER Join product as p on p.id=d.product_id
// INNER Join customer as c on c.id=d.customer_id
// Inner Join product_type as pt on pt.id=p.product_type_id
// Left Join dispatch_rolls as b on d.id=b.delivery_id
//    group by o.id order by o.id desc
$qry=DB::select("SELECT o.delivery_rate as rate,sum(d.net_amount) as net_amount,c.customer_name,o.id,GROUP_CONCAT(distinct(d.id)) as did,p.product_name,pt.name,o.status,o.qty,GROUP_CONCAT(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p  where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id group by o.id order by o.id  desc");
return $qry;
}


public static function ShowDispatchOrders($request){

$qry=DB::select("SELECT c.customer_name,o.id,d.id as did,p.product_name,pt.name,o.status,o.qty,max(b.dispatch_date) as dispatch_date,sum(b.net_weight) as dispatch_qty FROM delivery_challan as d,dispatch_rolls as b,customer as c,orders as o,product_type as pt,product as p where d.customer_id=c.id and d.product_id=p.id and o.product_id=p.id and p.product_type_id=pt.id and d.order_id=o.id  and d.id=b.delivery_id   group by b.delivery_id order by b.id desc");
return $qry;
}



}