@extends('backend.layouts.master')

@section('contents')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="text-xl font-semibold">Trip Update</h4>
        <a href="{{ route('dashbord.tripall') }}" class="btn btn-link location_list btn-warning">Back</a>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('dashbord.trip.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $trips->id }}">
            
            <div class="form-group">
                <label for="location">Trip Name</label>
                <input type="text" class="form-control" id="trip_name" name="trip_name" value="{{ $trips->trip_name }}" required>
            </div>

            <div class="form-group">
                <label for="location">Available Seat</label>
                <input type="text" class="form-control" id="available_seat" name="available_seat" value="{{ $trips->available_seat }}">
            </div>

            <div class="form-group">
                <label for="location">Trip Date</label>
                <input type="date" class="form-control" id="trip_date" name="trip_date" required value="{{ $trips->trip_date }}">
            </div>

            <!-- Add other form fields as needed -->

            <button type="submit" class="btn mt-2 btn-warning location_list">Submit</button>
        </form>
    </div>
</div>




@endsection