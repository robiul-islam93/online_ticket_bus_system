
@extends('backend.layouts.master')

@section('contents')
<div class="card-main">
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center mt-5">
        <h4 class="text-xl font-semibold ">Book a Seat</h4>
        <a href="{{route('dashbord.seatallocation')}}" class="btn btn-link location_list btn-warning">Back</a>
    </div>

    <div class="card-body">
        <form method="post" action="{{route('dashbord.seatStore')}}">
            @csrf
            <div class="form-group">
                <label for="seat_number">Seat Number:</label>
                <input type="text" class="form-control" id="seat_number" name="seat_number" required>
            </div>
            <button type="submit" class="btn mt-2 location_list btn-primary">Book Seat</button>
        </form>
    </div>
</div>
</div>


@endsection