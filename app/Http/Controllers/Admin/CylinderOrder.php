<?php

namespace App\Http\Controllers\Admin;

use App\CylinderOrder_model as m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class CylinderOrder extends Controller
{

 public function GenerateCylinderOrder(){

        return view('user/GenerateCylinderOrder');

    }
        public function AddCylinderSupplier(){

        return view('user/AddCylinderSupplier');

    }
            public function ViewCylinderSupplier(){

        return view('user/ViewCylinderSupplier');

    }
     public function ViewCylinderOrder(){

        return view('user/ViewCylinderOrder');
        
    }
     public function InsertCylinderSupplier(Request $request){
        
        $validator = Validator::make($request->all(), [
        
            'customer_name' => 'required',
                   
                  
                     'city' => 'required',
          ]);
         
         
                 if ($validator->passes()) 
                 {
                     $data=m::InsertCylinderSupplier($request);
   return response()->json(['success'=>'Added new records.']);
    }
    else{
       return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }
    }

      public function InsertCylinderOrder(Request $request){
        
          $data=m::InsertCylinderOrder($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
    public function ShowCylinderSupplier(){
        $data=m::ShowCylinderSupplier();
        return response()->json($data);
    }
    public function CylinderSupplierEdit(Request $request){
      
        $data=m::CylinderSupplierEdit($request);
        return response()->json($data);
    }
    public function CylinderSupplierDelete(Request $request){
      
        $data=m::CylinderSupplierDelete($request);
        return response()->json($data);
    }
    public function CylinderSupplierUpdate(Request $request){
      
        $data=m::CylinderSupplierUpdate($request);
        return response()->json('Successfully Updated');
    }


 
      public function UpdateCylinderOrders(Request $request){
        
          $data=m::UpdateCylinderOrders($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
        public function FilterCorder(Request $request){
        
          $data=m::FilterCorder($request);
   return response()->json($data);
    
    }

    
    public function ShowByProduct(Request $request){
        $data=m::ShowByProduct($request);
        return response()->json($data);
    }

   public function ShowCylinderOrders(Request $request){
        $data=m::ShowCylinderOrders($request);
        return response()->json($data);
    }


   public function ShowCompletedOrder(Request $request){
        $data=m::ShowCompletedOrder($request);
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

    public function CylinderOrderEdit(Request $request){
      
        $data=m::CylinderOrderEdit($request);
        return response()->json($data);
    }
    

    public function changeProduct(Request $request){
      
        $data=m::changeProduct($request);
        return response()->json($data);
    }
    
    

 
    public function CylinderOrderUpdate(Request $request){
      
        $data=m::CylinderOrderUpdate($request);
        return response()->json('Successfully Updated');
    }
      public function CylinderOrderDelete(Request $request){
      
        $data=m::CylinderOrderDelete($request);
        return response()->json('Successfully Updated');
    }
    
}
?>