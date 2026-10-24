<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use Translatable;

    protected $fillable = ['code', 'title', 'title_en', 'description', 'description_en', 'image'];
}
