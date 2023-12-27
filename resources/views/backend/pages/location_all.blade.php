
@extends('backend.layouts.master')

@section('title', 'location all')
<!-- Blog Post List -->

        @section('contents')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center mt-5">
                    <h4 class="text-xl ">Location All</h4>
                    <a href="{{ route('dashbord.location') }}"  class="btn btn-link  btn-warning">Add Location</a>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            
                            <tr>
                                <th>Id</th>
                                <th>Location Name</th>
                                <th>Published Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($locations as $location)
                               <tr>
                                <td>{{$location->id}}</td>
                                <td>{{$location->location_name}}</td>
                                <td>{{$location->created_at}}</td>
                                <td>
                                <form action="{{ route('location.destroy',$location->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                    class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                                </form>

                                </td>
                               </tr>
                               
                            </tbody>
                            @endforeach
            
                    </table>
                </div>
            </div>
\
    @endsection

