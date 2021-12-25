<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotelreservation extends Model
{
    use HasFactory;

    public function tourgroup() {
        return $this->belongsTo(Tourgroup::class);
    }

   protected $fillable = ['hotel_city', 'hotel_name', 'checkin_date', 'checkout_date'];
   


}
