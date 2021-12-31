<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourgroup extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function hotelreservation() {
        return $this->hasMany(Hotelreservation::class);

    }

    public function touroperator() {
        return $this->belongsTo(User::class, 'user_id');



    }


}
