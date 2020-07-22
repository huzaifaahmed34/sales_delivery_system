<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout','Auth\LoginController@Logout');
Auth::routes();



Route::group( [ 'prefix' => 'admin' ,'middleware'=>['auth']], function()
{	
 Route::get('/','Admin\Dashboard@index');
 Route::get('/AddCustomers','Admin\Customers@AddCustomers');
  Route::get('/ViewCustomers','Admin\Customers@ViewCustomers');
    Route::get('/ShowCustomers','Admin\Customers@ShowCustomers');
    Route::get('/CustomersEdit/{id}','Admin\Customers@CustomersEdit');
      Route::get('/CustomersDelete/{id}','Admin\Customers@CustomersDelete');
  
 Route::post('/InsertCustomers','Admin\Customers@InsertCustomers');
 Route::post('/CustomersUpdate','Admin\Customers@CustomersUpdate');



 Route::get('/AddProducts','Admin\Products@AddProducts');
  Route::get('/ViewProducts','Admin\Products@ViewProducts');

 
  Route::get('/AddProductType','Admin\Products@AddProductType');
  Route::get('/ViewProductType','Admin\Products@ViewProductType');

    Route::get('/ShowProductType','Admin\Products@ShowProductType');
    Route::get('/ProductTypeEdit/{id}','Admin\Products@ProductTypeEdit');
      Route::get('/ProductTypeDelete/{id}','Admin\Products@ProductTypeDelete');
  
 Route::post('/InsertProductType','Admin\Products@InsertProductType');
 Route::post('/ProductTypeUpdate','Admin\Products@ProductTypeUpdate');



    Route::get('/ShowProducts','Admin\Products@ShowProducts');
    Route::get('/ProductsEdit/{id}','Admin\Products@ProductsEdit');
      Route::get('/ProductsDelete/{id}','Admin\Products@ProductsDelete');
  
 Route::post('/InsertProducts','Admin\Products@InsertProducts');
 Route::post('/ProductsUpdate','Admin\Products@ProductsUpdate');

  Route::get('/GenerateOrder','Admin\Order@GenerateOrder');

  Route::post('InsertOrder','Admin\Order@InsertOrder');
  Route::get('/ShowByProduct','Admin\Order@ShowByProduct');
  Route::get('/ShowByCustomer','Admin\Order@ShowByCustomer');
   Route::get('/ViewOrder','Admin\Order@ViewOrder');
     Route::get('/ShowOrders','Admin\Order@ShowOrders');
 
   Route::get('/OrderPending','Admin\Order@OrderPending');
     Route::get('/OrderCompleted','Admin\Order@OrderCompleted');
          Route::get('/ShowPendingOrders','Admin\Order@ShowPendingOrder');

               Route::get('/ShowCompletedOrder','Admin\Order@ShowCompletedOrder');
            Route::get('/ViewCompletedOrder','Admin\Order@ViewCompletedOrder');
              Route::get('/ViewPendingOrder','Admin\Order@ViewPendingOrder');
                Route::get('/GenerateDeliveryChallan','Admin\DeliveryChallan@GenerateDeliveryChallan');
   
    Route::get('/InsertDeliveryChallan','Admin\DeliveryChallan@InsertDeliveryChallan');
    Route::get('/CustomerSearch','Admin\DeliveryChallan@CustomerSearch');
        Route::get('/ViewDeliveryChallan','Admin\DeliveryChallan@ViewDeliveryChallan');
           Route::get('/ShowDeliveryChallan','Admin\DeliveryChallan@ShowDeliveryChallan');
               Route::get('/ShowBagsInfo','Admin\DeliveryChallan@ShowBagsInfo'); 
       Route::get('/DeliveryChallanDelete','Admin\DeliveryChallan@DeliveryChallanDelete');
        Route::get('/DeliveryChallanEdit','Admin\DeliveryChallan@DeliveryChallanEdit');
         Route::get('/DeliveryChallanUpdate','Admin\DeliveryChallan@DeliveryChallanUpdate');
                 
                Route::get('/ShowCustomerD','Admin\DeliveryChallan@ShowCustomerD');
                 Route::get('/AddRate','Admin\DeliveryChallan@AddRate');
   Route::get('/ViewRate','Admin\DeliveryChallan@ViewRate');
                 Route::get('/DispatchDelivery','Admin\DeliveryChallan@DispatchDelivery');
                  Route::get('/ChallanPrint/{id}','Admin\DeliveryChallan@ChallanPrint');
                   Route::get('/ShowOrderReport','Admin\Reports@ShowOrderReport');

                    Route::get('/ShowDispatchOrders','Admin\Reports@ShowDispatchOrders');
                       Route::get('/ShowDispatchOrdersByDate','Admin\Reports@ShowDispatchOrdersByDate');
 Route::get('/DispatchDelivery1','Admin\DeliveryChallan@DispatchDelivery1');
 Route::get('/showDispatchRolls','Admin\DeliveryChallan@showDispatchRolls');
  Route::get('/AddBag','Admin\DeliveryChallan@AddBag');
   Route::get('/AddRolls','Admin\DeliveryChallan@AddRolls');
      Route::get('/ViewAdvanceReport','Admin\Reports@ViewAdvanceReport');
       Route::get('/SimpleReportFilter','Admin\Reports@SimpleReportFilter');
      Route::get('/ViewSimpleReport','Admin\Reports@ViewSimpleReport');
            Route::get('/AdvanceReportFilter','Admin\Reports@AdvanceReportFilter');

  Route::get('/OrderCompletion','Admin\Reports@OrderCompletion');      
   Route::get('/ShowDispatchOrders1','Admin\Reports@ShowDispatchOrders1');  
   
    Route::get('/InsertDirectDelivery','Admin\DeliveryChallan@InsertDirectDelivery');

 
   Route::get('/DeliveryChallanUpdate1','Admin\DeliveryChallan@DeliveryChallanUpdate1');    
    Route::get('/showRollsCore','Admin\DeliveryChallan@showRollsCore');    
      Route::get('/DeliveryChallanDelete1','Admin\DeliveryChallan@DeliveryChallanDelete1');   
      Route::post('/UpdateDispatch','Admin\DeliveryChallan@UpdateDispatch');    
        Route::get('/DeleteDispatch','Admin\DeliveryChallan@DeleteDispatch');   
          Route::get('/DeleteDelivery','Admin\DeliveryChallan@DeleteDelivery');   
    
      Route::get('/AddSize','Admin\Products@AddSize');
       Route::get('/ViewSize','Admin\Products@ViewSize');

      Route::post('/importExcel','Admin\Products@import');
     Route::post('/UpdateOrders','Admin\Order@UpdateOrders');
      Route::get('/ResetPriority','Admin\Order@ResetPriority');

        Route::get('/ShowSize','Admin\Products@ShowSize');
        Route::post('/UpdateSize','Admin\Products@UpdateSize');

         Route::get('/AddCylinderSupplier','Admin\CylinderOrder@AddCylinderSupplier');
          Route::get('/ViewCylinderSupplier','Admin\CylinderOrder@ViewCylinderSupplier');
           Route::get('/ViewCylinderOrder','Admin\CylinderOrder@ViewCylinderOrder');
            Route::get('/GenerateCylinderOrder','Admin\CylinderOrder@GenerateCylinderOrder');
Route::post('/InsertCylinderSupplier','Admin\CylinderOrder@InsertCylinderSupplier');
        

    Route::get('/ShowCylinderSupplier','Admin\CylinderOrder@ShowCylinderSupplier');
    Route::get('/CylinderSupplierEdit/{id}','Admin\CylinderOrder@CylinderSupplierEdit');
      Route::get('/CylinderSupplierDelete/{id}','Admin\CylinderOrder@CylinderSupplierDelete');
   
 Route::post('/CylinderSupplierUpdate','Admin\CylinderOrder@CylinderSupplierUpdate');
Route::post('/InsertCylinderOrder','Admin\CylinderOrder@InsertCylinderOrder');
          Route::get('/ShowCylinderOrders','Admin\CylinderOrder@ShowCylinderOrders');
             Route::post('/UpdateCylinderOrders','Admin\CylinderOrder@UpdateCylinderOrders');
                  Route::get('/FilterCorder','Admin\CylinderOrder@FilterCorder');
     Route::get('/CylinderOrderEdit/{id}','Admin\CylinderOrder@CylinderOrderEdit');
     Route::get('/changeProduct','Admin\CylinderOrder@changeProduct');
     Route::post('/CylinderOrderUpdate','Admin\CylinderOrder@CylinderOrderUpdate');
     Route::get('/CylinderOrderDelete/{id}','Admin\CylinderOrder@CylinderOrderDelete');
          Route::get('/AddInsertSize','Admin\Products@AddInsertSize');
          Route::get('/SizeDelete/{id}','Admin\Products@SizeDelete');
            Route::get('/FilterOrder','Admin\Order@FilterOrder');
                  Route::get('/Required_Reports','Admin\Reports@Required_Reports');
                      Route::get('/ShowPolysterReport','Admin\Reports@ShowPolysterReport');
                      Route::get('/ShowMPolysterReport','Admin\Reports@ShowMPolysterReport');
                      Route::get('/ShowBoppReport','Admin\Reports@ShowBoppReport');
                      Route::get('/ShowMBoppReport','Admin\Reports@ShowMBoppReport');
                      Route::get('/ShowPerlizedReport','Admin\Reports@ShowPerlizedReport');
                      Route::get('/ShowPolyReport','Admin\Reports@ShowPolyReport');
                      Route::get('/ShowMilkyPolyReport','Admin\Reports@ShowMilkyPolyReport');

            Route::get('/ShowFPolysterReport','Admin\Reports@ShowFPolysterReport');
            Route::get('/ShowFMPolysterReport','Admin\Reports@ShowFMPolysterReport');
            Route::get('/ShowFMBoppReport','Admin\Reports@ShowFMBoppReport');
            Route::get('/ShowFPolyReport','Admin\Reports@ShowFPolyReport');
            Route::get('/ShowFBoppReport','Admin\Reports@ShowFBoppReport');
            Route::get('/ShowFPerlizedReport','Admin\Reports@ShowFPerlizedReport');
            Route::get('/ShowFMilkyPolyReport','Admin\Reports@ShowFMilkyPolyReport');
   Route::get('/ViewMachineReport','Admin\Reports@ViewMachineReport');
     Route::get('/Show2CReport','Admin\Reports@Show2CReport');
       Route::get('/Show4CReport','Admin\Reports@Show4CReport');
         Route::get('/Show8CReport','Admin\Reports@Show8CReport');
           Route::get('/Show6CReport','Admin\Reports@Show6CReport');
             Route::get('/ShowLAMSReport','Admin\Reports@ShowLAMSReport');
               Route::get('/ShowLAMBReport','Admin\Reports@ShowLAMBReport');
   Route::get('/ShowFLEXOBReport','Admin\Reports@ShowFLEXOBReport');

   Route::get('/ShowFLEXOSReport','Admin\Reports@ShowFLEXOSReport');
 Route::get('/Show2CFReport','Admin\Reports@Show2CFReport');

 
       Route::get('/Show4CFReport','Admin\Reports@Show4CFReport');
         Route::get('/Show8CFReport','Admin\Reports@Show8CFReport');
           Route::get('/Show6CFReport','Admin\Reports@Show6CFReport');
             Route::get('/ShowLAMSFReport','Admin\Reports@ShowLAMSFReport');
               Route::get('/ShowLAMBFReport','Admin\Reports@ShowLAMBFReport');
   Route::get('/ShowFLEXOBFReport','Admin\Reports@ShowFLEXOBFReport');

   Route::get('/ShowFLEXOSFReport','Admin\Reports@ShowFLEXOSFReport'); 

  Route::get('/Update2CMachine','Admin\Reports@Update2CMachine'); 
    Route::get('/Update4CMachine','Admin\Reports@Update4CMachine'); 
  Route::get('/Update6CMachine','Admin\Reports@Update6CMachine'); 
  Route::get('/Update8CMachine','Admin\Reports@Update8CMachine'); 
  Route::get('/UpdateLamSMachine','Admin\Reports@UpdateLamsMachine'); 
  Route::get('/UpdateLamBMachine','Admin\Reports@UpdateLamBMachine'); 
  Route::get('/UpdateFlexoSMachine','Admin\Reports@UpdateFlexoSMachine'); 
  Route::get('/UpdateFlexoBMachine','Admin\Reports@UpdateFlexoBMachine'); 
 
  Route::get('/ViewStatusReport','Admin\Reports@ViewStatusReport'); 
   Route::get('/ShowInProcessReport','Admin\Reports@ShowInProcessReport'); 
   
     Route::get('/ShowPendingReport','Admin\Reports@ShowPendingReport'); 
      Route::get('/ShowScheduledReport','Admin\Reports@ShowScheduledReport'); 
       Route::get('/ShowNotStartedReport','Admin\Reports@ShowNotStartedReport'); 
   Route::get('/ShowReleasedReport','Admin\Reports@ShowReleasedReport'); 

    Route::get('/ShowInProcessFReport','Admin\Reports@ShowInProcessFReport'); 
    Route::get('/ShowPendingFReport','Admin\Reports@ShowPendingFReport'); 
      Route::get('/ShowScheduledFReport','Admin\Reports@ShowScheduledFReport'); 
       Route::get('/ShowNotStartedFReport','Admin\Reports@ShowNotStartedFReport'); 
   Route::get('/ShowReleasedFReport','Admin\Reports@ShowReleasedFReport'); 
     Route::get('/UpdateInProcessStatus','Admin\Reports@UpdateInProcessStatus'); 
   Route::get('/UpdateScheduledStatus','Admin\Reports@UpdateScheduledStatus'); 
      Route::get('/UpdateReleasedStatus','Admin\Reports@UpdateReleasedStatus'); 
         Route::get('/UpdateNotStartedStatus','Admin\Reports@UpdateNotStartedStatus'); 
            Route::get('/UpdatePendingStatus','Admin\Reports@UpdatePendingStatus'); 







   

});