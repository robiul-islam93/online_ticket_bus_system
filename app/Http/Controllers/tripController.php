<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Location;

class tripController extends Controller
{
    public function tripall(){
        $trips= Trip::get();
        return view('backend.pages.tripall',compact('trips'));
    }
    public function tripcreate(){
        $locations = Location::get();
        return view('backend.pages.tripadd',compact('locations'));
    }

    public function tripstore(Request $request)
{
    // dd($request->all());
    $request->validate([
        'trip_name' => 'required',
        'trip_date' => 'required|date',
        'trip_form' => 'required|string',
        'trip_to' => 'required|string',
        'departure_time' => 'required|date_format:H:i',
        'available_seat' => 'required|string',
        'bus_fare' => 'required|string',
    ]);


    Trip::insert([
        'trip_name' => $request->trip_name,
        'trip_date' => $request->trip_date,
        'trip_form' => $request->trip_form,
        'trip_to' => $request->trip_to,
        'departure_time' => $request->departure_time,
        'available_seat' => $request->available_seat,
        'bus_fare' => $request->bus_fare,
    ]);


    $notification = [
        'message' => 'Trip Created Successfully',
        'alert-type' => 'success',
    ];

    return redirect()->back()->with($notification);
}


    public function tripedit($id)
    {
        $trips = Trip::findOrFail($id);
        return view('backend.pages.tripedit', compact('trips'));
    }

    
  
        public function tripupdate(Request $request)
        {
            $request->validate([
                'trip_name' => 'required',
                'trip_date' => 'required|date',
                'trip_form' => 'required|string',
                'trip_to' => 'required|string',
                'departure_time' => 'required|date_format:H:i',
                'available_seat' => 'required|string',
                'bus_fare' => 'required|string',
            ]);
        
            $trip_id = $request->id;
            Trip::findOrFail($trip_id)->update([
                'trip_name' => $request->trip_name,
                'trip_date' => $request->trip_date,
                'trip_form' => $request->trip_form,
                'trip_to' => $request->trip_to,
                'departure_time' => $request->departure_time,
                'available_seat' => $request->available_seat,
                'bus_fare' => $request->bus_fare,
            ]);
        
            $notification = [
                'message' => 'Trip Update Successfully',
                'alert-type' => 'success',
            ];
        
            return redirect()->back()->with($notification);
        }
        
  
    public function tripdelete($id){
        $locations = Trip::findOrFail($id);
        $locations->delete();
        $notification = array(
            'message' => 'Trip Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }


    public function tripsearch(Request $request){
        
        $request->validate([
            'search_date' => 'required|date',
        ]);
    
        $searchDate = $request->search_date;
        $trips = Trip::where('trip_date', $searchDate)->get();
    
        return view('backend.pages.serach_trip_all', compact('trips'));

    }

    public function seatAll($id){
        $trips = Trip::findOrFail($id);
        return view('backend.pages.seatall',compact('trips'));
       }
  
}
