
@extends('backend.layouts.master')

@section('title', 'Allocation All')
<!-- Blog Post List -->

        @section('contents')
        <div class="card-main">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center mt-5">
                    <h4 class="text-xl">Seat Allocation All</h4>
                    <a href="{{ route('dashbord.seatAllocation') }}" class="btn btn-link location_list btn-warning">Add Seat</a>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            
                            <tr>
                                <th>Id</th>
                                <th>seat_number</th>
                                <th>Published Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($seatgets as $seatget )
                               <tr>
                                <td>{{$seatget->id}}</td>
                                <td>{{$seatget->seat_number}}</td>
                                <td>{{$seatget->created_at}}</td>
                                <td>
                                    <form action="{{ route('seatAllocation.destroy',$seatget->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                    </form>

                                </td>
                               </tr>
                               @endforeach
                            </tbody>
                          
                            
                    </table>
                </div>
            </div>
        </div>

    @endsection

