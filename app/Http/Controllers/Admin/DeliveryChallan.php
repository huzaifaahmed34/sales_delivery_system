<?php

namespace App\Http\Controllers\Admin;

use App\Delivery_model as m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;
class DeliveryChallan extends Controller
{


    public function GenerateDeliveryChallan(){

        return view('user/GenerateDeliveryChallan');

    }
     public function ViewDeliveryChallan(){

  $html='';
   $sno=0;
   $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.rate','d.net_amount','d.created_at','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->orderBy('d.id','desc')->paginate(10);
   
 

        return view('user/ViewDeliveryChallan',['qry'=>$qry]);
        
    }
      public function ViewCompletedOrder(){

        return view('user/ViewCompletedOrder');
        
    }
      public function ViewRate(Request $request){

         $data=m::ViewRate($request);
        return response()->json($data);
        
    }
        public function ChallanPrint($id){
 $data=m::ChallanPrint($id);
        return view('printViews/delivery_challan',['res'=>$data]);
        
    }
       public function showRollsCore(Request $request){

         $data=m::showRollsCore($request);
        return response()->json($data);
        
    }
 

    public function DispatchDelivery1(Request $request){
        
          $data=m::DispatchDelivery1($request);
          if($data=='true'){
   return response()->json(['success'=>'Added new records.']);
}
else{ 
    return response()->json(['error'=>'Added new records.']);

}
    
    } 
    public function DispatchDelivery(Request $request){
        
          $data=m::DispatchDelivery($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
    
        public function UpdateDispatch(Request $request){
        
          $data=m::UpdateDispatch($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

    
        public function DeleteDispatch(Request $request){
        
          $data=m::DeleteDispatch($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
       public function DeleteDelivery(Request $request){
        
          $data=m::DeleteDelivery($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

        public function InsertDirectDelivery(Request $request){
        
          $data=m::InsertDirectDelivery($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
    
      public function AddBag(Request $request){
        
          $data=m::AddBag($request);
   return response()->json(['success'=>'Added new records.']);
    
    }   public function AddRolls(Request $request){
        
          $data=m::AddRolls($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
       
      public function InsertDeliveryChallan(Request $request){
        
          $data=m::InsertDeliveryChallan($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
    public function CustomerSearch(Request $request){
        $data=m::CustomerSearch($request);
        return response()->json($data);
    }
     public function showDispatchRolls(Request $request){
        $data=m::showDispatchRolls($request);
        return response()->json($data);
    }

   public function ShowDeliveryChallan(Request $request){
        $data=m::ShowDeliveryChallan($request);
        return response()->json($data);
    }


   public function ShowBagsInfo(Request $request){
        $data=m::ShowBagsInfo($request);
        return  ($data);
    }


  public function AddRate(Request $request){
        $data=m::AddRate($request);
        return response()->json($data);
    }



    public function DeliveryChallanDelete(Request $request){
      
        $data=m::DeliveryChallanDelete($request);
        return response()->json($data);
    }

    public function DeliveryChallanEdit(Request $request){
      
        $data=m::DeliveryChallanEdit($request);
        return response()->json($data);
    }
        public function DeliveryChallanUpdate(Request $request){
      
        $data=m::DeliveryChallanUpdate($request);
        return response()->json($data);
    }

  public function DeliveryChallanUpdate1(Request $request){
      
        $data=m::DeliveryChallanUpdate1($request);
        return response()->json($data);
    }
      public function DeliveryChallanDelete1(Request $request){
      
        $data=m::DeliveryChallanDelete1($request);
        return response()->json($data);
    }
    

    
    public function ShowCustomerD(Request $request){
      
        $data=m::ShowCustomerD($request);
        return $data;
    }
}
?>