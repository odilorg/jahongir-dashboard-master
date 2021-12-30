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

   protected $fillable = ['hotel_city', 'hotel_name', 'checkin_date', 'checkout_date'];
   
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

}
