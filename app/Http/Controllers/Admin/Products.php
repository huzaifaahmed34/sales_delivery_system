<?php

namespace App\Http\Controllers\Admin;

use App\Product_model as m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Excel;
use DB;
use Session;
use File;
class Products extends Controller
{

    public function AddProducts(){

        return view('user/AddProducts');

    }
      public function AddSize(){

        return view('user/AddSize');

    }  public function ViewSize(){

        return view('user/ViewSizeList');

    }

    
     public function ViewProducts(){

        return view('user/ViewProducts');
        
    }

    public function AddInsertSize(Request $request){
      
        $data=m::AddInsertSize($request);
        return response()->json('Successfully Updated');
    }   


    public function SizeDelete(Request $request){
      
        $data=m::SizeDelete($request);
        return response()->json('Successfully Updated');
    }   

    
    public function InsertProducts(Request $request){
        
        $validator = Validator::make($request->all(), [
        
            'product_name' => 'required',
            'product_type_id' => 'required',
            'customer_id' => 'required',
            'weight' => 'required',
          
            
                    
          ]);
         
         
                 if ($validator->passes()) 
                 {
                     $data=m::InsertProducts($request);
   return response()->json(['success'=>'Added new records.']);
    }
    else{
       return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }
    }



   public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){

            $extension = File::extension($request->file->getClientOriginalName());

            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();

                $data = Excel::load($path, function($reader) {

                })->get();

 

             if(!empty($data) && $data->count()){
                    $count=0;
                    
                        foreach ($data as $key => $value) {
 
   
          
                        $insert[] = [
                         
                        'Polyster_size' => $value->polyster_size,
                         'M_Polyster_size' =>  $value->m_polyster_size
,
                          'M_Bopp_size' => $value->m_bopp_size
,
                           'Bopp_size' => $value->bopp_size
,

                            'Milky_Poly_size' => $value->milky_poly_size
,
                             'Poly_size' =>  $value->poly_size
,
                              'Perilized_size' => $value->perlized_size,
                                
                      
                        ];
                 $count++;
                     }
                    if(!empty($insert)){
 
                        $insertData = DB::table('size')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return back();
 
            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    public function ShowProducts(){
        $data=m::ShowProducts();
        return response()->json($data);
    }
       public function ShowSize(){
        $data=m::ShowSize();
        return response()->json($data);
    }
    
  
  
    public function UpdateSize(Request $request){
      
        $data=m::UpdateSize($request);
        return response()->json($data);
    }
      public function ProductsEdit(Request $request){
      
        $data=m::ProductsEdit($request);
        return response()->json($data);
    }
    public function ProductsDelete(Request $request){
      
        $data=m::ProductsDelete($request);
        return response()->json($data);
    }
    public function ProductsUpdate(Request $request){
      
        $data=m::ProductsUpdate($request);
        return response()->json('Successfully Updated');
    }













    public function AddProductType(){

        return view('user/AddProductType');

    }
     public function ViewProductType(){

        return view('user/ViewProductType');
        
    }
    public function InsertProductType(Request $request){
        
        $validator = Validator::make($request->all(), [
        
            'name' => 'required|unique:product_type',
                    
          ]);
         
         
                 if ($validator->passes()) 
                 {
                     $data=m::InsertProductType($request);
   return response()->json(['success'=>'Added new records.']);
    }
    else{
       return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }
    }
    public function ShowProductType(){
        $data=m::ShowProductType();
        return response()->json($data);
    }
    public function ProductTypeEdit(Request $request){
      
        $data=m::ProductTypeEdit($request);
        return response()->json($data);
    }
    public function ProductTypeDelete(Request $request){
      
        $data=m::ProductTypeDelete($request);
        return response()->json($data);
    }
    public function ProductTypeUpdate(Request $request){
      
        $data=m::ProductTypeUpdate($request);
        return response()->json('Successfully Updated');
    }
}
?>