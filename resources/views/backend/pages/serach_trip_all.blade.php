
@extends('backend.layouts.master')

@section('title', 'Search Trip')
<!-- Blog Post List -->

        @section('contents')
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="text-xl font-semibold ">Search All Trip</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            
                            <tr>
                                <th>Id</th>
                                <th>Trip Name</th>
                                <th>Trip Date</th>
                                <th>Trip Form</th>
                                <th>Trip To</th>
                                <th>Departure Time</th>
                                <th>Available Seat</th>
                                <th>Bus Fare</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($trips as $trip)
                               <tr>
                                <td>{{$trip->id}}</td>
                                <td>{{$trip->trip_name}}</td>
                                <td>{{$trip->trip_date}}</td>
                                <td>{{$trip->trip_form}}</td>
                                <td>{{$trip->trip_to}}</td>
                                <td>{{$trip->departure_time}}</td>
                                <td>{{$trip->available_seat}}</td>
                                <td>{{$trip->bus_fare}}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <a href="{{route('dashbord.seatAll',['id' => $trip->id, 'trip' => $trip]) }}" class="btn btn-success btn-sm">Book Seats</a>
                                 
                                    </div>
                                </td>
                               </tr>
                               
                            </tbody>
                            @endforeach
            
                    </table>
                </div>
            </div>

    @endsection

