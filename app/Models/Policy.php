<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['checkin', 'hotel_id', 'checkout', 'extra', 'amount'];

    public function hotel(){
        return $this->hasOne(Hotel::class, 'id', 'hotel_id');
    }
}
