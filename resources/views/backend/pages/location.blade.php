@extends('backend.layouts.master')

@section('contents')
<div class="card-main">
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center mt-5">
        <h4 class="text-xl font-semibold ">Add Location</h4>
        <a href="{{ route('dashbord.location.all') }}" class="btn btn-link location_list btn-warning">Back</a>
    </div>

    <div class="card-body">
        <form method="post" action="{{route('location.store')}}">
            @csrf
            <div class="form-group">
                <label for="location">Location Name:</label>
                <input type="text" class="form-control" id="location" name="location_name" required>
            </div>

            <button type="submit" class="btn mt-2 btn-warning location_list">Submit</button>
        </form>
    </div>
</div>
</div>


@endsection