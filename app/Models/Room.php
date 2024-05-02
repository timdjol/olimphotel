<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $fillable = ['code', 'title', 'title_en', 'description', 'description_en', 'price', 'image', 'hotel_id', 'count', 'pricec', 'status'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'images');
    }

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }

}
