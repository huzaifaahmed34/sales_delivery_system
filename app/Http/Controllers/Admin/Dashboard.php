<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class Dashboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dashboard');
    }
    
    

      public function Addposter(Request $request)
    {      $validator = Validator::make($request->all(), [
            'title' => 'required',
             'image' => 'required',
            
        ]);


        if ($validator->passes()) {

        
 $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();


 $request->image->move(public_path('poster'), $imageName);

$data=array(
    'title'=>$request->title,
    'image'=>$imageName
    );
    
    DB::table('poster_homepage')->insert($data);
  
            return response()->json(['success'=>'Added new records.']);
        }

else{
        return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }

    }

}
