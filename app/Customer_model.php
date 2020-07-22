<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Customer_model extends Model {

public static function InsertCustomers($request){
    $data=array(
        'customer_name'=>$request->customer_name,
        'email'=>$request->email,
         'address'=>$request->address,
          'phone'=>$request->phone,
           'city'=>$request->city,
    );
    DB::table('customer')->insert($data);
}
public static function CustomersUpdate($request){
    $data=array(
        'customer_name'=>$request->customer_name,
        'email'=>$request->email,
         'address'=>$request->address,
          'phone'=>$request->phone,
            'status'=>$request->status,
           'city'=>$request->city,
        'updated_at'=>date('Y-m-d h:i:s')
    );
    DB::table('customer')->where('id',$request->id)->update($data);
}
public static function ShowCustomers(){
    $qry=DB::table('customer')->where('is_deleted',0)->orderBy('id','desc')->get();
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