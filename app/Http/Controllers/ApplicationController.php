<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Application;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 
    //
    public function index()
    {
    	$applications = Application::all();

		
        return view('application',array('applications' => $applications));
    }

     public function app_del(Request $request)
    {
      
        $app_id = $request->input('app_id');
       $ws_delete = Application::where('app_id', $app_id)->delete();
       
        if($ws_delete){
            return redirect('application')->with('app_status', 'Deleted Successfully!');
        }else{
        	 return redirect('application')->with('app_status', 'Failed To Delete!');
        }
       
       
    }

    public function app_update(Request $request)
    {
    	date_default_timezone_set("Asia/Kolkata");

    	$app_id = $request->input('app_id');
    	$name = $request->input('name');
    	$version = $request->input('version');
    	$description = $request->input('description');
    	$updated_at = date("Y-m-d h:i:s");


       
        $ws_update = Application::where('app_id', $app_id)
        	->update(['name' => $name,
        	'version' => $version,
        	'description' => $description,
        	'updated_at' =>$updated_at]);  
        
        if($ws_update){
            //$request->session()->flash('workstation_status', 'Added Workstation successfully!');
            return redirect('application')->with('app_status', 'Updated Successfully!');
        } 
        else{
            //$request->session()->flash('workstation_status', 'Failed!');
            return redirect('application')->with('app_status', 'Failed To Update');
        }
       
       
    }

     public function app_insert(Request $request)
    {

    	date_default_timezone_set("Asia/Kolkata");
       
	    $app_in = new Application;
		$app_in->name = $request->input('a_name');
   		$app_in->version = $request->input('a_version');
		$app_in->description = $request->input('a_description');
		$app_in->created_at = date("Y-m-d h:i:s");		
		$app_insert = $app_in->save();
		if($app_insert){
        	
            return redirect('application')->with('app_status', 'Inserted Successfully!');
        } 
        else{
        	
            return redirect('application')->with('app_status', 'Failed To Insert');
        }
    }

}
