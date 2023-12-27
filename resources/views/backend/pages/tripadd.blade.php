@extends('backend.layouts.master')

@section('contents')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="text-xl font-semibold ">Trip</h4>
        <a href="{{ route('dashbord.tripall') }}" class="btn btn-link location_list btn-warning">Back</a>
    </div>

    <div class="card-body">
        <form method="post" action="{{route('dashbord.trip.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="trip_name">Trip Name</label>
                    <input type="text" class="form-control" id="trip_name" name="trip_name" required>
                  </div>
              
                  <div class="mb-3">
                    <label for="trip_date">Trip Date</label>
                    <input type="date" class="form-control" id="trip_date" name="trip_date" required>
                  </div>
                </div>
              
              <div class="col-md-6">
    <div class="mb-3">
        <label for="fromSelect" class="form-label">From</label>
        <select id="fromSelect" name="trip_form" class="form-select">
            <option value="" selected>Select an option</option>
            @foreach ($locations as $location)
                <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
            @endforeach
        </select>
    </div>              
                  <div class="mb-3">
                    <label for="toSelect" class="form-label">To</label>
                    <select id="toSelect" name="trip_to" class="form-select">
                      <option value="" selected>Select an option</option>
                      @foreach ($locations as $location)
                      <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                  @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="timeInput" class="form-label">Deprature Time:</label>
                <input type="time" class="form-control" id="timeInput" name="departure_time">
              </div>

            <div class="mb-3">
                <label for="location">Available Seat</label>
                <input type="text" class="form-control" id="available_seat" name="available_seat" required>
            </div>

            <div class="mb-3">
                <label for="location">Bus Fare</label>
                <input type="text" class="form-control" id="available_seat" name="bus_fare" required>
            </div>



            <button type="submit" class="btn mt-2 btn-warning location_list">Submit</button>
        </form>
    </div>
</div>



@endsection