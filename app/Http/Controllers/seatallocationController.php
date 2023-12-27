<?php

namespace App\Http\Controllers;
use App\Models\SeatAllocation;
use Illuminate\Http\Request;
use App\Models\Trip;

class seatallocationController extends Controller
{
    public function seatAllocationAll(){
        $seatgets = SeatAllocation::get();
      return view('backend.pages.seat_allocation.seatallocation_all',compact('seatgets'));
     }
  
  
     public function seatAllocation(){
        return view('backend.pages.seat_allocation.seatallocation_add');
    }
  
    public function seatStore(Request $request){
     $request->validate([
        'seat_number' => 'required|string',
     ]);
     SeatAllocation::create([
        'seat_number' => $request->seat_number,
        $notification = array(
         'message' => 'Seat Number Created Successfully',
         'alert-type' => 'success',
     )
    ]);
  
    return redirect()->back()->with($notification); 
    }
  
  
    public function destroy($id){
     $seatgets = SeatAllocation::findOrFail($id);
     $seatgets->delete();
     $notification = array(
      'message' => 'seatallocation Deleted Successfully',
      'alert-type' => 'warning',
  );
     return redirect()->back()->with($notification);
  }

  
}
