<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'property_id',
        'status',
        'date',
        'time_slot',
        'total_price',
    ] ;

    public $timestamps = false;

    public function getTotalPriceAttribute()
    {
        $fullDayPrice = $this->property->price_per_full_day;

        switch ($this->time_slot) {
            case 'full day':
                return $fullDayPrice;
            case 'night':
                return $fullDayPrice * 0.7;
            case 'afternoon':
                return $fullDayPrice * 0.6;
            default:
                return $fullDayPrice;
        }
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }
}