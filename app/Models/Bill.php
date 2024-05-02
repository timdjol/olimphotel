<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $fillable = [
        'title',
        'hotel_id',
        'status',
        'date',
        'file1',
        'file2'
    ];
}
