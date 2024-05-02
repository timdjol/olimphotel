<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    use Translatable;

    protected $fillable = [
        'hotel_id',
        'room_id',
        'title',
        'phone',
        'email',
        'comment',
        'count',
        'countc',
        'sum',
        'status',
        'start_d',
        'end_d'
    ];

    public function showStartDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->start_d)->format('d/m/Y');
    }

    public function showEndDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->end_d)->format('d/m/Y');
    }
}
