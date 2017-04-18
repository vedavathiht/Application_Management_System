<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Workstation;

class WorkstationController extends Controller
{


public function __construct()
    {
        $this->middleware('auth');
    } 
    //
    public function index()
    {
    	$workstations = Workstation::all();

		
        return view('workstation',array('workstations' => $workstations));
    }
    public function show()
    {
        $workstations = Workstation::all();

        
        return view('workstation',array('workstations' => $workstations));
    }

     public function store(Request $request)
    {

    	date_default_timezone_set("Asia/Kolkata");
       
	    $ws = new Workstation;
		$ws->name = $request->input('name');
   		$ws->manufacturer_name = $request->input('manufacturer_name');
		$ws->ip_address = $request->input('ip_address');
   		$ws->mac_address = $request->input('mac_address');   
		$ws->created_at = date("Y-m-d h:i:s");		
		$ws_insert = $ws->save();
		if($ws_insert){
        	//$request->session()->flash('workstation_status', 'Added Workstation successfully!');
            return redirect('workstation')->with('workstation_status', 'Inserted Successfully!');
        } 
        else{
        	//$request->session()->flash('workstation_status', 'Failed!');
            return redirect('workstation')->with('workstation_status', 'Failed To Insert');
        }
    }
    public function destroy($id)
    {
        $ws_d = Workstation::find($id);

        $ws_delete = $ws_d->delete();
       
            //$request->session()->flash('workstation_status', 'Added Workstation successfully!');
            return redirect('workstation')->with('workstation_status', 'Deleted Successfully!');
       
    }
    public function update($id,Request $request)
    {
        date_default_timezone_set("Asia/Kolkata");
        $name = $request->input('name');
        $manufacturer_name = $request->input('manufacturer_name');
        $ip_address = $request->input('ip_address');
        $mac_address = $request->input('mac_address');
        $updated_at = date("Y-m-d h:i:s");

        $ws_u = Workstation::find($id);
        $ws_u->name = $name;
        $ws_u->manufacturer_name = $manufacturer_name;
        $ws_u->ip_address = $ip_address;
        $ws_u->mac_address =$mac_address;   
        $ws_u->updated_at = $updated_at;  
        $ws_update = $ws_u->save();
        if($ws_update){
            //$request->session()->flash('workstation_status', 'Added Workstation successfully!');
            return redirect('workstation')->with('workstation_status', 'Updated Successfully!');
        } 
        else{
            //$request->session()->flash('workstation_status', 'Failed!');
            return redirect('workstation')->with('workstation_status', 'Failed To Update');
        }

       

    }
}
