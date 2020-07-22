<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Records extends Model {

public static function AddData($request){
    $data=array(
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname
    );
    DB::table('company_staff')->insert($data);
}
public static function UpdateData($request){
    $data=array(
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'updated_on'=>date('Y-m-d h:i:s')
    );
    DB::table('company_staff')->where('id',$request->id)->update($data);
}
public static function ViewData(){
    $qry=DB::table('company_staff')->where('is_deleted',0)->orderBy('id','desc')->get();
    return $qry;
}
public static function EditData($request){
    $qry=DB::table('company_staff')->where('id',$request->id)->first();
    return $qry;
}
public static function DeleteData($request){
    $data=array(
        'is_deleted'=>1,
        'deleted_on'=>date('Y-m-d h:i:s')
    );
    $qry=DB::table('company_staff')->where('id',$request->id)->update($data);
    return $qry;
}
}