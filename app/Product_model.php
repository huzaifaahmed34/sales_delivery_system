<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product_model extends Model {

public static function InsertProductType($request){
    $data=array(
        'name'=>$request->name,
     
    );
    DB::table('product_type')->insert($data);
}
public static function ProductTypeUpdate($request){
    $data=array(
        'name'=>$request->name,
       
           'status'=>$request->status,
        'updated_at'=>date('Y-m-d h:i:s')
    );
    DB::table('product_type')->where('id',$request->id)->update($data);
}
public static function ShowProductType(){
    $qry=DB::table('product_type')->where('is_deleted',0)->orderBy('id','desc')->get();
    return $qry;
}
public static function ProductTypeEdit($request){
    $qry=DB::table('product_type')->where('id',$request->id)->first();
    return $qry;
}
public static function ProductTypeDelete($request){
    $data=array(
        'is_deleted'=>1,
        'deleted_at'=>date('Y-m-d h:i:s')
    );
    $qry=DB::table('product_type')->where('id',$request->id)->update($data);
    return $qry;
}












public static function InsertProducts($request){
   
 

    $data=array(
        'product_name'=>$request->product_name,
        'product_type_id'=>$request->product_type_id,
        'customer_id'=>$request->customer_id,
        'weight'=>$request->weight,
        'polyster_size'=>$request->polyster_size,
        'polyster_weight'=>$request->polyster_wt,


        'M_POLYSTER_SIZE'=>$request->m_polyster_size,
        'M_BOPP_SIZE'=>$request->m_bopp_size,
        'BOPP_SIZE'=>$request->bopp_size,
           'MILKY_POLY_SIZE'=>$request->milky_poly_size,
            'poly'=>$request->poly_size,
           'PERILIZED_SIZE'=>$request->perilized_size,
           'M_POLYSTER_WT'=>$request->m_polyster_wt,

           'M_BOPP_WT'=>$request->m_bopp_wt,
           'BOPP_WT'=>$request->bopp_wt,
           'MILKY_POLY_WT'=>$request->milky_poly_wt,
           'poly_weight'=>$request->poly_wt,
           'PERILIZED_WT'=>$request->perilized_wt,


     
    );
    DB::table('product')->insert($data);
}
public static function ProductsUpdate($request){
    $data=array(
         'product_name'=>$request->product_name,
        'product_type_id'=>$request->product_type_id,
        'customer_id'=>$request->customer_id,
        'weight'=>$request->weight,
        'polyster_size'=>$request->polyster_size,
        'polyster_weight'=>$request->polyster_wt,


        'M_POLYSTER_SIZE'=>$request->m_polyster_size,
        'M_BOPP_SIZE'=>$request->m_bopp_size,
        'BOPP_SIZE'=>$request->bopp_size,
           'MILKY_POLY_SIZE'=>$request->milky_poly_size,
            'poly'=>$request->poly_size,
           'PERILIZED_SIZE'=>$request->perilized_size,
           'M_POLYSTER_WT'=>$request->m_polyster_wt,

           'M_BOPP_WT'=>$request->m_bopp_wt,
           'BOPP_WT'=>$request->bopp_wt,
           'MILKY_POLY_WT'=>$request->milky_poly_wt,
           'poly_weight'=>$request->poly_wt,
           'PERILIZED_WT'=>$request->perilized_wt,
           'status'=>$request->status,
        'updated_at'=>date('Y-m-d h:i:s')
    );
    DB::table('product')->where('id',$request->id)->update($data);
}
public static function ShowProducts(){
    $qry=DB::table('product as p')->select('p.id','p.polyster_size','p.m_polyster_size','p.m_bopp_size','p.bopp_size','p.milky_poly_size','p.poly','p.perilized_size','p.polyster_weight','p.m_polyster_wt','p.m_bopp_wt','p.bopp_wt','p.milky_poly_wt','p.poly_weight','p.perilized_wt','c.id as cid','p.product_type_id','p.product_name','pt.name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.status','p.weight','c.customer_name')->join('product_type as pt','pt.id','=','p.product_type_id')->join('customer as c','c.id','=','p.customer_id')->where('pt.is_deleted',0)->where('c.is_deleted',0)->where('p.is_deleted',0)->orderBy('p.id','desc')->get();
    return $qry;
}
public static function ProductsEdit($request){
    $qry=DB::table('product')->where('id',$request->id)->first();
    return $qry;
}
public static function ProductsDelete($request){
    $data=array(
        'is_deleted'=>1,
        'deleted_at'=>date('Y-m-d h:i:s')
    );
    $qry=DB::table('product')->where('id',$request->id)->update($data);
    return $qry;
}


public static function ShowSize(){
    $qry=DB::table('size')->get();
    return $qry;
}




public static function AddInsertSize($request){
     $data=array(
  'Polyster_size'=>$request->polyster_size1,
            'M_Polyster_size'=>$request->m_polyster_size1,
                'M_Bopp_size'=>$request->m_bopp_size1,
                    'Bopp_size'=>$request->bopp_size1,
                    'Milky_Poly_size'=>$request->milky_poly_size1,
                    'Poly_size'=>$request->poly_size1,
                      'Perilized_size'=>$request->perlized_size1,
             
    );
     DB::table('size')->insert($data);
    }   


public static function SizeDelete($request){
  DB::table('size')->where('id',$request->id)->delete();
}


public static function UpdateSize($request){
  $count=$request->count;

    for($i=1;$i<=$count;$i++){

     $data1=array(
           'Polyster_size'=>$request->Polyster_size[$i],
            'M_Polyster_size'=>$request->M_Polyster_size[$i],
                'M_Bopp_size'=>$request->M_Bopp_size[$i],
                    'Bopp_size'=>$request->Bopp_size[$i],
                    'Milky_Poly_size'=>$request->Milky_Poly_size[$i],
                    'Poly_size'=>$request->Poly_size[$i],
                      'Perilized_size'=>$request->Perilized_size[$i],
             
    );
  
    DB::table('size')->where('id',$request->id[$i])->update($data1);


}
}

}