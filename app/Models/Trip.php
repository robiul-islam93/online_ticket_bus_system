<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_name',
        'trip_date',
        'trip_form',
        'trip_to',
        'departure_time',
        'available_seat',
        'bus_fare',
        ];


        public function bookTickets()
    {
        return $this->hasMany(BookTicket::class, 'trip_id');
    }

    public function seats()
    {
        return $this->hasManyThrough(Seat::class, BookTicket::class, 'trip_id', 'book_ticket_id');
    }



}


