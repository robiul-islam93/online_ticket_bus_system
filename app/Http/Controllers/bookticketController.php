<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\BookTicket;

class bookticketController extends Controller
{
    public function customerbookAll(){
        return view('backend.pages.trip_search');
    }
    public function customerbookAdd(){
        return view('backend.pages.bookticketadd');
    }


    public function store_book_ticket(Request $request){
        // dd($request->all());
     
    $request->validate([
        'id' => 'required', 
        'customer_name' => 'required',
        'customer_mobile' => 'required',
        'selected_seats' => 'required|array',
    ]);

    // Find the trip by its ID
    $trip = Trip::find($request->id);


    if (!$trip) {
        return redirect()->back()->with('error', 'Trip not found.');
    }

    $availableSeat = $trip->available_seat - count($request->selected_seats);

    
    if ($availableSeat < 0) {
        return redirect()->back()->with('error', 'Not enough available seats.');
    }

    
    $trip->update(['available_seat' => $availableSeat]);

   
    $bookTicket = BookTicket::create([
        'customer_name' => $request->customer_name,
        'customer_mobile' => $request->customer_mobile,
        'trip_id' => $request->id,
    ]);


        $notification = [
            'message' => 'Book Ticket Created Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('dashbord.book.ticket')->with($notification); 



    }

    public function all_book_ticket(){
        $book_tickets= BookTicket::get();
        return view('backend.pages.book_tickets_all',compact('book_tickets'));
    }



}
