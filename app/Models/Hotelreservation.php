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
   
<<<<<<< HEAD
   public function setCheckinDateAttribute($value)
   {
       $this->attributes['checkin_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
   }

   public function setCheckoutDateAttribute($value)
   {
       $this->attributes['checkout_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
   }
   
   public function getCheckinDateAttribute($value)
{
    return Carbon::parse($value)->format('d/m/Y');
}

public function getCheckoutDateAttribute($value)
{
    return Carbon::parse($value)->format('d/m/Y');
}
=======
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
  
>>>>>>> 6210d9e9d11777a871ea5f0380730da15483c36f

}
