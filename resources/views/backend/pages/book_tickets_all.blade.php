
@extends('backend.layouts.master')

@section('title', 'Book Ticket All')
<!-- Blog Post List -->

        @section('contents')
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="text-xl font-semibold ">All Books Tickets</h4>
                    <a href="{{route('dashbord.book.ticket')}}" class="btn btn-link product_list btn-warning">Search Trip</a>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            
                            <tr>
                                <th>Id</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($book_tickets as $book_ticket)
                               <tr>
                                <td>{{$book_ticket->id}}</td>
                                <td>{{$book_ticket->customer_name}}</td>
                                <td>{{$book_ticket->customer_mobile}}</td>
                               </tr>
                               
                            </tbody>
                            @endforeach
            
                    </table>
                </div>
            </div>

    @endsection

