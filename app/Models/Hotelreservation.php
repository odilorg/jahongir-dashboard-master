<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotelreservation extends Model
{
    use HasFactory;

    public function tourgroup() {
        return $this->belongsTo(Tourgroup::class);
    }

   protected $guarded = [];
   
//    public function getCheckinDateAttribute($value)
// {
//     return Carbon::parse($value)->format('d/m/Y');
// }

// public function getCheckoutDateAttribute($value)
// {
//     return Carbon::parse($value)->format('d/m/Y');
// }

// public function getEarlyCheckinAttribute($value)
// {
//     return Carbon::parse($value)->format('d/m/Y HH:MM:SS');
// }
public function getCheckinDateAttribute($value) {
    return \Carbon\Carbon::parse($value)->format('d-m-Y');
}

}
