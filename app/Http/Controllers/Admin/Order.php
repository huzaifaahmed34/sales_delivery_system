<?php

namespace App\Http\Controllers\Admin;

use App\Order_model as m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class Order extends Controller
{


    public function GenerateOrder(){

        return view('user/GenerateOrder');

    }
     public function ViewOrder(){

        return view('user/ViewOrder');
        
    }
      public function ViewCompletedOrder(){

        return view('user/ViewCompletedOrder');
        
    }
      public function ViewPendingOrder(){

        return view('user/ViewPendingOrder');
        
    }
    public function InsertOrder(Request $request){
        
          $data=m::InsertOrder($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
      public function UpdateOrders(Request $request){
        
          $data=m::UpdateOrders($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
        public function ResetPriority(Request $request){
        
          $data=m::ResetPriority($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

    
    public function ShowByProduct(Request $request){
        $data=m::ShowByProduct($request);
        return response()->json($data);
    }

   public function ShowPendingOrder(Request $request){
        $data=m::ShowPendingOrder($request);
        return response()->json($data);
    }


   public function ShowCompletedOrder(Request $request){
        $data=m::ShowCompletedOrder($request);
        return response()->json($data);
    }


  public function FilterOrder(Request $request){
        $data=m::FilterOrder($request);
        return response()->json($data);
    }

  public function ShowByCustomer(Request $request){
        $data=m::ShowByCustomer($request);
        return response()->json($data);
    }



    public function ShowOrders(Request $request){
      
        $data=m::ShowOrders($request);
        return response()->json($data);
    }

    public function OrderPending(Request $request){
      
        $data=m::OrderPending($request);
        return response()->json($data);
    }
    
    public function OrderCompleted(Request $request){
      
        $data=m::OrderCompleted($request);
        return response()->json('Successfully Updated');
    }
}
?>