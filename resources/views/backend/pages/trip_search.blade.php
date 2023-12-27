@extends('backend.layouts.master')

@section('title', 'Book Ticket Add')

@section('contents')


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center mt-5">
            <h4 class="text-xl font-semibold">Search Trip</h4>
            <a href="{{ route('dashbord.book.ticket') }}" class="btn btn-link  btn-warning">Back To List</a>
        </div>
    
        <div class="card-body">
            <form method="get" action="{{route('dashbord.trip.search')}}">
                @csrf

              
                <div class="form-group date_small">
                    <label>Date:</label>
                    <input type="date" class="form-control" id="date" name="search_date" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn mt-2 btn-warning">Search</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection