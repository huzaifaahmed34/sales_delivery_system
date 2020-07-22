<?php

namespace App\Http\Controllers\Admin;

use App\Report_model as m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
class Reports extends Controller
{

     public function ViewAdvanceReport(){

  $html='';
   $sno=0;
   $qry=DB::table('delivery_challan as d')->select('d.id as delivery_id','d.item','d.net_gross_wt','net_cross_wt','total_net_weight','d.rate','d.net_amount','d.created_at','o.date_commited','o.date_received','o.qty','o.id as oid','o.status','p.id','c.id as cid','p.product_name','p.polyster_weight','p.polyster_size','p.poly_weight','p.poly','p.weight','p.materialized','p.materialized_weight','p.PP_Wt','p.PP','c.customer_name')->join('product as p','p.id','=','d.product_id')->join('customer as c','c.id','=','d.customer_id') ->join('orders as o','o.id','=','d.order_id')->orderBy('d.id','desc')->whereBetween('d.created_at',[date('Y-m-d').' 00:00:00',date('Y-m-d').' 23:59:59'])->paginate(15);
   
 

        return view('user/ViewAdvanceReport',['qry'=>$qry]);
        
    }
    

     public function ViewSimpleReport(){
 

        return view('user/ViewSimpleReport');
        
    }
    
     public function Required_Reports(){
 

        return view('user/Required_Reports');
        
    }
        public function ViewMachineReport(){
 

        return view('user/ViewMachineReport');
        
    }
        public function ViewStatusReport(){
 

        return view('user/ViewStatusReport');
        
    }
    



    public function ShowInProcessReport(Request $request){
      
        $data=m::ShowInProcessReport($request);
       return response()->json($data);
    }

    public function ShowPendingReport(Request $request){
      
        $data=m::ShowPendingReport($request);
       return response()->json($data);
    }

    public function ShowScheduledReport(Request $request){
      
        $data=m::ShowScheduledReport($request);
       return response()->json($data);
    }
      public function ShowNotStartedReport(Request $request){
      
        $data=m::ShowNotStartedReport($request);
       return response()->json($data);
    }
   public function ShowReleasedReport(Request $request){
      
        $data=m::ShowReleasedReport($request);
       return response()->json($data);
    }





    public function ShowInProcessFReport(Request $request){
      
        $data=m::ShowInProcessFReport($request);
       return response()->json($data);
    }

    public function ShowPendingFReport(Request $request){
      
        $data=m::ShowPendingFReport($request);
       return response()->json($data);
    }

    public function ShowScheduledFReport(Request $request){
      
        $data=m::ShowScheduledFReport($request);
       return response()->json($data);
    }
      public function ShowNotStartedFReport(Request $request){
      
        $data=m::ShowNotStartedFReport($request);
       return response()->json($data);
    }
   public function ShowReleasedFReport(Request $request){
      
        $data=m::ShowReleasedFReport($request);
       return response()->json($data);
    }
    
   public function UpdateInProcessStatus(Request $request){
      
        $data=m::UpdateInProcessStatus($request);
       return response()->json($data);
    }
     public function UpdateScheduledStatus(Request $request){
      
        $data=m::UpdateScheduledStatus($request);
       return response()->json($data);
    } public function UpdateReleasedStatus(Request $request){
      
        $data=m::UpdateReleasedStatus($request);
       return response()->json($data);
    } public function UpdateNotStartedStatus(Request $request){
      
        $data=m::UpdateNotStartedStatus($request);
       return response()->json($data);
    } public function UpdatePendingStatus(Request $request){
      
        $data=m::UpdateInProcessStatus($request);
       return response()->json($data);
    }
    




        public function Show2CReport(Request $request){
      
        $data=m::Show2CReport($request);
       return response()->json($data);
    }

    public function Show4CReport(Request $request){
      
        $data=m::Show4CReport($request);
       return response()->json($data);
    }
      public function Show8CReport(Request $request){
      
        $data=m::Show8CReport($request);
       return response()->json($data);
    }

   public function Show6CReport(Request $request){
      
        $data=m::Show6CReport($request);
       return response()->json($data);
    }

    
       public function ShowLAMSReport(Request $request){
      
        $data=m::ShowLAMSReport($request);
       return response()->json($data);
    }
     public function ShowLAMBReport(Request $request){
      
        $data=m::ShowLAMBReport($request);
       return response()->json($data);
    }

     public function ShowFLEXOBReport(Request $request){
      
        $data=m::ShowFLEXOBReport($request);
       return response()->json($data);
    }
  public function ShowFLEXOSReport(Request $request){
      
        $data=m::ShowFLEXOSReport($request);
       return response()->json($data);
    }

  public function Show2CFReport(Request $request){
      
        $data=m::Show2CFReport($request);
       return response()->json($data);
    }


    public function Show4CFReport(Request $request){
      
        $data=m::Show4CFReport($request);
       return response()->json($data);
    }
      public function Show8CFReport(Request $request){
      
        $data=m::Show8CFReport($request);
       return response()->json($data);
    }

   public function Show6CFReport(Request $request){
      
        $data=m::Show6CFReport($request);
       return response()->json($data);
    }

    
       public function ShowLAMSFReport(Request $request){
      
        $data=m::ShowLAMSFReport($request);
       return response()->json($data);
    }
     public function ShowLAMBFReport(Request $request){
      
        $data=m::ShowLAMBFReport($request);
       return response()->json($data);
    }

     public function ShowFLEXOBFReport(Request $request){
      
        $data=m::ShowFLEXOBFReport($request);
       return response()->json($data);
    }
  public function ShowFLEXOSFReport(Request $request){
      
        $data=m::ShowFLEXOSFReport($request);
       return response()->json($data);
    }
    public function ShowPolysterReport(Request $request){
      
        $data=m::ShowPolysterReport($request);
       return response()->json($data);
    }
 public function ShowMPolysterReport(Request $request){
      
        $data=m::ShowMPolysterReport($request);
       return response()->json($data);
    }
 
       
        public function ShowPerlizedReport(Request $request){
      
        $data=m::ShowPerlizedReport($request);
       return response()->json($data);
    }
        public function ShowMilkyPolyReport(Request $request){
      
        $data=m::ShowMilkyPolyReport($request);
       return response()->json($data);
    }
        public function ShowPolyReport(Request $request){
      
        $data=m::ShowPolyReport($request);
       return response()->json($data);
    }
        public function ShowBoppReport(Request $request){
      
        $data=m::ShowBoppReport($request);
       return response()->json($data);
    }
        public function ShowMBoppReport(Request $request){
      
        $data=m::ShowMBoppReport($request);
       return response()->json($data);
    }
  public function Update2CMachine(Request $request){
        
          $data=m::Update2CMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

      public function Update4CMachine(Request $request){
        
          $data=m::Update4CMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
       public function Update6CMachine(Request $request){
        
          $data=m::Update6CMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

   public function Update8CMachine(Request $request){
        
          $data=m::Update8CMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }
        public function UpdateLamSMachine(Request $request){
        
          $data=m::UpdateLamSMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

 public function UpdateLamBMachine(Request $request){
        
          $data=m::UpdateLamBMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }

 public function UpdateFlexoSMachine(Request $request){
        
          $data=m::UpdateFlexoSMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }


 public function UpdateFlexoBMachine(Request $request){
        
          $data=m::UpdateFlexoBMachine($request);
   return response()->json(['success'=>'Added new records.']);
    
    }








   public function ShowFPolysterReport(Request $request){
      
        $data=m::ShowFPolysterReport($request);
       return response()->json($data);
    }
 public function ShowFMPolysterReport(Request $request){
      
        $data=m::ShowFMPolysterReport($request);
       return response()->json($data);
    }
 
       
        public function ShowFPerlizedReport(Request $request){
      
        $data=m::ShowFPerlizedReport($request);
       return response()->json($data);
    }
        public function ShowFMilkyPolyReport(Request $request){
      
        $data=m::ShowFMilkyPolyReport($request);
       return response()->json($data);
    }
        public function ShowFPolyReport(Request $request){
      
        $data=m::ShowFPolyReport($request);
       return response()->json($data);
    }
        public function ShowFBoppReport(Request $request){
      
        $data=m::ShowFBoppReport($request);
       return response()->json($data);
    }
        public function ShowFMBoppReport(Request $request){
      
        $data=m::ShowFMBoppReport($request);
       return response()->json($data);
    }






    public function SimpleReportFilter(Request $request){
      
        $data=m::SimpleReportFilter($request);
       return response()->json($data);
    }
     public function OrderCompletion(Request $request){
      
        $data=m::OrderCompletion($request);
       return response()->json($data);
    }

    public function AdvanceReportFilter(Request $request){
      
        $data=m::AdvanceReportFilter($request);
        return  $data;
    }
    public function ShowOrderReport(Request $request){
      
        $data=m::ShowOrderReport($request);
        return response()->json($data);
    }

    public function ShowDispatchOrders(Request $request){
      
        $data=m::ShowDispatchOrders($request);
        return response()->json($data);
    }


    public function ShowDispatchOrders1(Request $request){
      
        $data=m::ShowDispatchOrders1($request);
        return response()->json($data);
    }    
    public function ShowDispatchOrdersByDate(Request $request){
     $data=m::ShowDispatchOrdersByDate($request);
        return response()->json($data);
    }
}
?>