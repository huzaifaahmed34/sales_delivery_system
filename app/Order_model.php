<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order_model extends Model {





public static function InsertOrder($request){
    $data=array(
        'customer_id'=>$request->customer_id,
        'product_id'=>$request->id,
         'qty'=>$request->qty,
           'rate'=>$request->rate,
            'remarks'=>$request->remarks,
          'date_received'=>$request->date_received,
           'date_commited'=>$request->date_commited,
  
     'total_polyster_wt'=>round($request->polyster_wt,2),
      
      'total_poly_wt'=>round($request->poly_wt,2),
       't_m_polyster_wt'=>round($request->m_polyster_wt,2),
        't_m_bopp_wt'=>round($request->m_bopp_wt,2),
         't_bopp_wt'=>round($request->bopp_wt,2),
          't_milky_poly_wt'=>round($request->milky_poly_wt,2),
           't_perilized_wt'=>round($request->perilized_wt,2),

    );


    DB::table('orders')->insert($data);
}



public static function ResetPriority($request){
    DB::table('orders')->update(['priority'=>0]);
}

public static function UpdateOrders($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
           'status'=>$arr['status'],
            'remarks'=>$arr['remarks'],
                'priority'=>$arr['priority'],
                    'rate'=>$arr['rate'],
             'machine'=>$arr['machine']
    );
    DB::table('orders')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}


  // $count=$request->count;

  //   for($i=1;$i<=$count;$i++){
  //         $status=$request->status[$i];
           
  //      $remarks=$request->remarks[$i];
  //        $rate=$request->rate[$i];
  //               $priority=$request->priority[$i];

  //    $data1=array(
  //          'status'=>$status,
  //           'remarks'=>$remarks,
  //               'priority'=>$priority,
  //                   'rate'=>$rate,
  //            'machine'=>$request->machine[$i]
  //   );
  
    // DB::table('orders')->where('id',$request->id[$i])->update($data1);



}

public static function AddRate($request){
    $data=array(
        'rate'=>$request->customer_id,
         
    );
    DB::table('orders')->insert($data);
}

public static function OrderPending($request){
    $id=$request->id;
    $data=array(
       
            'status'=>1,
        
        'updated_at'=>date('Y-m-d h:i:s')
    );
    DB::table('orders')->where('id',$id)->update($data);
}
public static function OrderCompleted($request){
    $id=$request->id;
    $data=array(
       
            'status'=>0,
        
        'updated_at'=>date('Y-m-d h:i:s')
    );
    DB::table('orders')->where('id',$id)->update($data);
}


public static function ShowOrders($request){
 
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.created_at','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->orderBy('o.id','desc')->get();



    return $qry;
}



public static function FilterOrder($request){
 
$type=$request->type1;
  $cid=$request->cid1;
    $priority=$request->priority1;
      $status=$request->status1;
         $machine=$request->machine1;
  if($cid=='' && $priority=='' && $type=='' && $status==''  && $machine=='' ){
 
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->orderBy('o.id','desc')->get();
  } 
  

elseif($cid=='' && $priority=='' && $type=='' && $machine==''){
  
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->whereIn('o.status',$status)->orderBy('o.id','desc')->get();
  }elseif($status=='' && $priority=='' && $type=='' && $machine==''){
  
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->orderBy('o.id','desc')->get();
  }elseif($cid=='' && $status=='' && $type=='' && $machine==''){
  
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.priority','!=',0)->orderBy('o.id','desc')->get();
  }

elseif($cid=='' && $status=='' && $priority=='' && $machine==''){
  
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('pt.id',$type)->orderBy('o.id','desc')->get();
  }

elseif($cid=='' && $status=='' && $type=='' && $priority==''){
  
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.machine',$machine)->orderBy('o.id','desc')->get();
  }


 


  elseif($cid=='' && $priority=='' && $type==''){
  
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->whereIn('o.status',$status)->where('o.machine',$machine)->orderBy('o.id','desc')->get();
  }
    elseif($cid=='' && $priority=='' && $status==''){

    
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->whereIn('p.product_type_id',$type)->where('o.machine',$machine)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $type=='' && $status==''){
        
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.priority','!=',0)->where('o.machine',$machine)->orderBy('o.id','desc')->get();

    }
      elseif($priority=='' && $type=='' && $status==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->where('o.machine',$machine)->orderBy('o.id','desc')->get();

    }

     elseif($priority=='' && $type=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->whereIn('o.status',$status)->orderBy('o.id','desc')->get();

    }

     elseif($priority=='' && $status=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }
    elseif($type=='' && $status=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->where('o.priority','!=','0')->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $status=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.priority','!=','0')->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }

     elseif($priority=='' && $type==''){
        
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->whereIn('o.status',$status)->where('o.machine',$machine)->where('o.customer_id',$cid)->orderBy('o.id','desc')->get();

    }
     elseif($priority=='' && $status==''){
    
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->where('o.machine',$machine)->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }
    elseif($priority=='' && $cid==''){
          
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->whereIn('o.status',$status)->where('o.machine',$machine)->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $type==''){
          
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->whereIn('o.status',$status)->where('o.machine',$machine)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $status==''){
       
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('pt.id',$type)->where('o.machine',$machine)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($status=='' && $type==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->where('o.machine',$machine)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }






elseif($status=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->where('o.type',$type)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }

    elseif($type=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->whereIn('o.status',$status)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('pt.id',$type)->whereIn('o.status',$status)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($type=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->whereIn('o.status',$status)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
      elseif($priority=='' && $machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.customer_id',$cid)->whereIn('o.status',$status)->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }




     elseif($status==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.machine',$machine)->where('o.customer_id',$cid)->where('pt.id',$type)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($cid==''){
      
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.machine',$machine)->whereIn('o.status',$status)->where('pt.id',$type)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($type==''){
          
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.machine',$machine)->where('o.customer_id',$cid)->whereIn('o.status',$status)->where('o.priority','!=',0)->orderBy('o.id','desc')->get();

    }
     elseif($priority==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.machine',$machine)->whereIn('o.status',$status)->where('o.customer_id',$cid)->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }
     elseif($machine==''){
         
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.priority','!=',0)->whereIn('o.status',$status)->where('o.customer_id',$cid)->where('pt.id',$type)->orderBy('o.id','desc')->get();

    }
    else{
     
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.machine',$machine)->where('pt.id',$type)->where('o.customer_id',$cid)->whereIn('o.status',$status)->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->where('o.priority','!=',0)->orderBy('o.id','desc')->get();
 
    
}
 return $qry;
}



public static function ShowPendingOrder($request){
  
   $qry=DB::table('orders as o')->select('o.date_commited','o.machine','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.t_perilized_wt','t_bopp_wt','t_milky_poly_wt','t_m_bopp_wt','t_m_polyster_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.rate','o.delivery_rate','o.total_poly_wt','o.total_polyster_wt','o.date_received','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.weight','o.remarks','o.rate','o.priority','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','!=','Cancelled')->where('o.status','!=','Completed')->orderBy('o.id','desc')->get();

$html='';
 

    return $qry;
}
public static function ShowCompletedOrder($request){
 
   
   $qry=DB::table('orders as o')->select('o.date_commited','o.rate','o.delivery_rate','o.total_poly_wt','o.total_materialized_wt','o.total_polyster_wt','o.total_pp_wt','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_type_id','pt.name','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('product_type as pt','pt.id','=','p.product_type_id')->where('o.status','Completed')->orderBy('o.id','desc')->get();



    return $qry;
}


public static function ShowByProduct($request){
  $pid=$request->id;
  $cid=$request->cid;
  if($cid==''){
   $qry=DB::table('product as p')->select('p.id','c.id as cid','p.product_type_id','p.product_name','pt.name','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','p.status','p.weight','c.customer_name')->join('product_type as pt','pt.id','=','p.product_type_id')->join('customer as c','c.id','=','p.customer_id')->where('pt.is_deleted',0)->where('c.is_deleted',0)->where('p.is_deleted',0)->orderBy('p.id','desc')->where('p.product_type_id',$pid)->get();
  }
    elseif($pid==''){
           $qry=DB::table('product as p')->select('p.id','c.id as cid','p.product_type_id','p.product_name','pt.name','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','p.status','p.weight','c.customer_name')->join('product_type as pt','pt.id','=','p.product_type_id')->join('customer as c','c.id','=','p.customer_id')->where('pt.is_deleted',0)->where('c.is_deleted',0)->where('p.is_deleted',0)->orderBy('p.id','desc')->where('p.customer_id',$cid)->get();

    }
    else{
       $qry=DB::table('product as p')->select('p.id','c.id as cid','p.product_type_id','p.product_name','pt.name','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','p.status','p.weight','c.customer_name')->join('product_type as pt','pt.id','=','p.product_type_id')->join('customer as c','c.id','=','p.customer_id')->where('pt.is_deleted',0)->where('c.is_deleted',0)->where('p.is_deleted',0)->where(['p.product_type_id'=>$pid,'p.customer_id'=>$cid])->orderBy('p.id','desc')->get();
    }
 
    return $qry;
}


public static function ShowByCustomer($request){
  $pid=$request->id;
  $cid=$request->cid;
  if($pid==''){
   $qry=DB::table('product as p')->select('p.id','c.id as cid','p.product_type_id','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.status','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product_type as pt','pt.id','=','p.product_type_id')->join('customer as c','c.id','=','p.customer_id')->where('pt.is_deleted',0)->where('c.is_deleted',0)->where('p.is_deleted',0)->orderBy('p.id','desc')->where('p.customer_id',$cid)->get();
  }
    else{
         $qry=DB::table('product as p')->select('p.id','c.id as cid','p.product_type_id','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.status','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product_type as pt','pt.id','=','p.product_type_id')->join('customer as c','c.id','=','p.customer_id')->where('pt.is_deleted',0)->where('c.is_deleted',0)->where('p.is_deleted',0)->where(['p.product_type_id'=>$pid,'p.customer_id'=>$cid])->orderBy('p.id','desc')->get();

    }
 
    return $qry;
}
public static function CustomersEdit($request){
    $qry=DB::table('customer')->where('id',$request->id)->first();
    return $qry;
}
public static function CustomersDelete($request){
    $data=array(
        'is_deleted'=>1,
        'deleted_at'=>date('Y-m-d h:i:s')
    );
    $qry=DB::table('customer')->where('id',$request->id)->update($data);
    return $qry;
}
}