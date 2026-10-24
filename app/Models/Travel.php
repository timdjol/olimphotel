<?php

namespace App\Models;

use App\Mail\OrderCreated;
use App\Mail\SendSubscriptionMessage;
use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Travel extends Model
{
    use Translatable;

    protected $fillable = ['code', 'title', 'title_en', 'description', 'description_en', 'image'];

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }

}
