<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use Translatable;

    protected $fillable = ['code', 'title', 'title_en', 'description', 'description_en', 'image','checkin', 'checkout',
        'breakfast', 'phone', 'email', 'count', 'type', 'address', 'address_en', 'lng', 'lat', 'status'];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }


}
