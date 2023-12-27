<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_mobile',
        'trip_id',
        ];
    
        public function trip()
        {
            return $this->belongsTo(Trip::class, 'trip_id');
        }
}
