<?php

namespace App\Http\Controllers\Admin;

use App\Customer_model as m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class Customers extends Controller
{


    public function AddCustomers(){

        return view('user/AddCustomers');

    }
     public function ViewCustomers(){

        return view('user/ViewCustomers');
        
    }
    public function InsertCustomers(Request $request){
        
        $validator = Validator::make($request->all(), [
        
            'customer_name' => 'required',
                   
                  
                     'city' => 'required',
          ]);
         
         
                 if ($validator->passes()) 
                 {
                     $data=m::InsertCustomers($request);
   return response()->json(['success'=>'Added new records.']);
    }
    else{
       return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }
    }
    public function ShowCustomers(){
        $data=m::ShowCustomers();
        return response()->json($data);
    }
    public function CustomersEdit(Request $request){
      
        $data=m::CustomersEdit($request);
        return response()->json($data);
    }
    public function CustomersDelete(Request $request){
      
        $data=m::CustomersDelete($request);
        return response()->json($data);
    }
    public function CustomersUpdate(Request $request){
      
        $data=m::CustomersUpdate($request);
        return response()->json('Successfully Updated');
    }
}
?>