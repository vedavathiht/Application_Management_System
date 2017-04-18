<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Appuser;

class AppuserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 
    //
    public function index()
    {
    	$appusers = Appuser::all();

		
        return view('appuser',array('appusers' => $appusers));
    }

    public function appuser_insert(Request $request)
    {

    	date_default_timezone_set("Asia/Kolkata");
       
	    $appuser_in = new Appuser;
		$appuser_in->appuser_name = $request->input('appuser_name');
   		$appuser_in->appuser_email = $request->input('appuser_email');
		$appuser_in->appuser_on = $request->input('appuser_on');
		$appuser_in->created_at = date("Y-m-d h:i:s");		
		$appuser_insert = $appuser_in->save();
		if($appuser_insert){
        	
            return redirect('appuser')->with('appuser_status', 'Inserted Successfully!');
        } 
        else{
        	
            return redirect('appuser')->with('appuser_status', 'Failed To Insert');
        }
    }

    public function appuser_del(Request $request)
    {
      
       $appuser_id = $request->input('appuser_id');
       $au_delete = Appuser::where('appuser_id', $appuser_id)->delete();
       
        if($au_delete){
            return redirect('appuser')->with('appuser_status', 'Deleted Successfully!');
        }else{
        	 return redirect('appuser')->with('appuser_status', 'Failed To Delete!');
        }
       
       
    }


     public function appuser_update(Request $request)
    {
    	date_default_timezone_set("Asia/Kolkata");

    	$appuser_id = $request->input('appuser_id');
    	$appuser_name = $request->input('appuser_name');
    	$appuser_email = $request->input('appuser_email');
    	$appuser_on = $request->input('appuser_on');
    	$updated_at = date("Y-m-d h:i:s");


       
        $au_update = Appuser::where('appuser_id', $appuser_id)
        	->update(['appuser_name' => $appuser_name,
        	'appuser_email' => $appuser_email,
        	'appuser_on' => $appuser_on,
        	'updated_at' =>$updated_at]);  
        
        if($au_update){
            //$request->session()->flash('workstation_status', 'Added Workstation successfully!');
            return redirect('appuser')->with('appuser_status', 'Updated Successfully!');
        } 
        else{
            //$request->session()->flash('workstation_status', 'Failed!');
            return redirect('appuser')->with('appuser_status', 'Failed To Update');
        }
       
       
    }

}
