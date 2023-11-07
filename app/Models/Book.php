<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = ['room_id', 'title', 'phone', 'email', 'comment', 'count', 'start_d', 'end_d'];

    public function showStartDate(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->start_d)->format('d/m/Y');
    }

    public function showEndDate(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->end_d)->format('d/m/Y');
    }
}
