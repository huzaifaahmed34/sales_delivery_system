<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CylinderOrder_model extends Model {





public static function InsertCylinderOrder($request){
    $data=array(

        'customer_id'=>$request->customer_id,
        'product_id'=>$request->id,
         'qty'=>$request->qty,
           'order_reference'=>$request->order_reference,
            'remarks'=>$request->remarks,
            'size'=>$request->size,
            'date_received'=>$request->date_received,
          'mat_type'=>$request->mat_type,
           'type'=>$request->type,
            'qty'=>$request->qty,
             'date_sent'=>$request->date_sent,
            'expected_date'=>$request->expected_date,
              'remarks'=>$request->remarks,
                'supplier_id'=>$request->supplier_id,
  
      

    );


    DB::table('cylinder_order')->insert($data);
}

public static function CylinderOrderUpdate($request){
    $data=array(

        'customer_id'=>$request->customer_id,
        'product_id'=>$request->product_id,
         'qty'=>$request->qty,
           'order_reference'=>$request->order_reference,
            'remarks'=>$request->remarks,
            'size'=>$request->size,
            'date_received'=>$request->date_received,
          'mat_type'=>$request->mat_type,
           'type'=>$request->type,
            'qty'=>$request->qty,
             'date_sent'=>$request->date_sent,
            'expected_date'=>$request->expected_date,
              'remarks'=>$request->remarks,
                'supplier_id'=>$request->supplier_id,
  
      

    );


    DB::table('cylinder_order')->where('id',$request->id)->update($data);
}


 

public static function CylinderOrderDelete($request){

DB::table('cylinder_order')->where('id',$request->id)->delete();
}
public static function UpdateCylinderOrders($request){
  $array=$request->array;
 if($array!=''){
  foreach ($array as $arr) {
    $data1=array(
                    'status'=>$arr['status'],
            'remarks'=>$arr['remarks'],
                'type'=>$arr['type'],
                 'expected_date'=>$arr['expected_date'],
                     
             'mat_type'=>$arr['mat_type']
    );
    DB::table('cylinder_order')->where('id',$arr['id'])->update($data1);

  }
}else{
  return 'so';
}
  
 
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

 
public static function ShowCylinderOrders($request){
 
   
   $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->orderBy('o.id','desc')->get();



    return $qry;
}
 
public static function changeProduct($request){
 $id=$request->id;
   
  $qry=DB::table('product')->where('id',$id)->first();



    return $qry;
}
 

public static function CylinderOrderEdit($request){
 $id=$request->id;
   
   $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','o.supplier_id as sid','o.product_id','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->orderBy('o.id','desc')->where('o.id',$id)->first();



    return $qry;
}
 

public static function FilterCorder($request){
  $supplier_id=$request->supplier_id;
  $cid=$request->cid;
    $type=$request->type;
      $status=$request->status;
  if($cid=='' && $supplier_id=='' && $type=='' && $status==''){
  $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.expected_date','o.size','o.date_received','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->orderBy('o.id','desc')->get();
  } 
  elseif($cid=='' && $supplier_id=='' && $type==''){
  $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.expected_date','o.size','o.date_received','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.status',$status)->orderBy('o.id','desc')->get();
  }
    elseif($cid=='' && $supplier_id=='' && $status==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.type',$type)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $type=='' && $status==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.supplier_id',$supplier_id)->orderBy('o.id','desc')->get();

    }
      elseif($supplier_id=='' && $type=='' && $status==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->orderBy('o.id','desc')->get();

    }
     elseif($supplier_id=='' && $type==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.status',$status)->orderBy('o.id','desc')->get();

    }
     elseif($supplier_id=='' && $status==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.type',$type)->orderBy('o.id','desc')->get();

    }
    elseif($supplier_id=='' && $cid==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.status',$status)->where('o.type',$type)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $type==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.status',$status)->where('o.supplier_id',$supplier_id)->orderBy('o.id','desc')->get();

    }
     elseif($cid=='' && $status==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.type',$type)->where('o.supplier_id',$supplier_id)->orderBy('o.id','desc')->get();

    }
     elseif($status=='' && $type==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.supplier_id',$supplier_id)->orderBy('o.id','desc')->get();

    }
     elseif($status==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.supplier_id',$supplier_id)->where('o.type',$type)->orderBy('o.id','desc')->get();

    }
     elseif($cid==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.status',$status)->where('o.supplier_id',$supplier_id)->where('o.type',$type)->orderBy('o.id','desc')->get();

    }
     elseif($type==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.supplier_id',$supplier_id)->where('o.status',$status)->orderBy('o.id','desc')->get();

    }
     elseif($supplier_id==''){
           $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.type',$type)->where('o.status',$status)->orderBy('o.id','desc')->get();

    }
    else{
     
   
   $qry=DB::table('cylinder_order as o')->select('o.date_sent','o.size','o.date_received','o.expected_date','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','o.type','o.mat_type','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','o.order_reference','o.qty','o.id as oid','o.status','p.id as pid','c.id as cid','p.product_type_id','p.product_name','s.supplier_name','p.weight','o.remarks','c.customer_name')->join('product as p','p.id','=','o.product_id')->join('customer as c','c.id','=','p.customer_id')->join('cylinder_supplier as s','s.id','=','o.supplier_id')->where('o.customer_id',$cid)->where('o.type',$type)->where('o.status',$status)->where('o.supplier_id',$supplier_id)->orderBy('o.id','desc')->get();
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
  

public static function InsertCylinderSupplier($request){
    $data=array(
        'supplier_name'=>$request->customer_name,
        'email'=>$request->email,
         'address'=>$request->address,
          'phone'=>$request->phone,
           'city'=>$request->city,
    );
    DB::table('cylinder_supplier')->insert($data);
}
public static function CylinderSupplierUpdate($request){
    $data=array(
        'supplier_name'=>$request->customer_name,
        'email'=>$request->email,
         'address'=>$request->address,
          'phone'=>$request->phone,
            'status'=>$request->status,
           'city'=>$request->city,
        'updated_at'=>date('Y-m-d h:i:s')
    );
    DB::table('cylinder_supplier')->where('id',$request->id)->update($data);
}
public static function ShowCylinderSupplier(){
    $qry=DB::table('cylinder_supplier')->where('is_deleted',0)->orderBy('id','desc')->get();
    return $qry;
}
public static function CylinderSupplierEdit($request){
    $qry=DB::table('cylinder_supplier')->where('id',$request->id)->first();
    return $qry;
}
public static function CylinderSupplierDelete($request){
    $data=array(
        'is_deleted'=>1,
        'deleted_at'=>date('Y-m-d h:i:s')
    );
    $qry=DB::table('cylinder_supplier')->where('id',$request->id)->update($data);
    return $qry;
}

}