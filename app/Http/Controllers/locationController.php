<?php

namespace App\Http\Controllers;
use App\Models\location;
use Illuminate\Http\Request;

class locationController extends Controller
{
      
  public  function locationAll(){
    $locations = location::latest()->get();
        return view('backend.pages.location_all',compact('locations'));
    }

  public  function location(){
        return view('backend.pages.location');
    }


    public function store(Request $request){

        $request->validate([

            'location_name' => 'required|string',

        ]);

        //location name create

        location::create([
            'location_name' => $request->location_name,
            $notification = array(
                'message' => 'Location Created Successfully',
                'alert-type' => 'success',
            )
        
        ]);

        return redirect()->back()->with($notification);    
    }

    public function destroy($id){
        $locations = location::findOrFail($id);
        $locations->delete();
        $notification = array(
            'message' => 'location Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }
}
