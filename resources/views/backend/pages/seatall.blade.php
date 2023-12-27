
@extends('backend.layouts.master')

@section('title', 'Book Ticket')
<!-- Blog Post List -->

        @section('contents')
        
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center bg-warning text-white">
                <h3 class="font-semibold">Seat All for Trip: {{ $trips->trip_name }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Trip Name</th>
                            <th>Trip Date</th>
                            <th>Trip Form</th>
                            <th>Trip To</th>
                            <th>Departure Time</th>
                            <th>Available Seat</th>
                            <th>Bus Fare</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $trips->id }}</td>
                            <td>{{ $trips->trip_name }}</td>
                            <td>{{ $trips->trip_date }}</td>
                            <td>{{ $trips->trip_form }}</td>
                            <td>{{ $trips->trip_to }}</td>
                            <td>{{ $trips->departure_time }}</td>
                            <td>{{ $trips->available_seat }}</td>
                            <td>{{ $trips->bus_fare }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-header mb-1 d-flex justify-content-between align-items-center bg-warning text-white p-1 rounded-1">
            <h3 class="font-semibold">Customer Information</h3>
        </div>
        <form method="post" action="{{route('dashbord.store_book_ticket')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $trips->id }}">
        <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="trip_name">Customer Name</label>
                <input type="text" class="form-control"  name="customer_name" required>
              </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                  <label for="trip_name">Phone Number</label>
                  <input type="number" class="form-control"  name="customer_mobile" required>
                </div>
              </div>
        </div>
       
        
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="text-xl font-semibold">Bus Seat Selection</h4>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
                            $colorMapping = [
                                'A' => 'primary',
                                'B' => 'secondary',
                                'C' => 'success',
                                'D' => 'danger',
                                'E' => 'warning',
                                'F' => 'info',
                                'G' => 'dark',
                                'H' => 'light',
                                'I' => 'info',
                            ];
                        @endphp
        
        <div class="row">
            @php
                $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
                $colorMapping = [
                    'A' => 'primary',
                    'B' => 'secondary',
                    'C' => 'success',
                    'D' => 'danger',
                    'E' => 'warning',
                    'F' => 'info',
                    'G' => 'dark',
                    'H' => 'light',
                    'I' => 'info',
                ];
            @endphp
        
        @foreach ($rows as $row)
        <div class="col-md-6 mb-3">
            <div class="row">
                @for ($seat = 1; $seat <= 4; $seat++)
                    <div class="col">
                        <label>
                            <input type="checkbox" class="d-none" name="selected_seats[]" value="{{ $row }}-{{ $seat }}">
                            <button type="button" class="btn btn-{{ $colorMapping[$row] }} btn-block btn-seat">
                                {{ $row }}-{{ $seat }}
                            </button>
                        </label>
                    </div>
                @endfor
            </div>
        </div>
    @endforeach
        </div>
        

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Buy Ticket</button>
                        </div>
                    </div>
                </div>
        
            </div>
        </form>
        
        

    @endsection

