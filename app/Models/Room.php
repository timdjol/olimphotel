<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $fillable = ['code', 'title', 'title_en', 'description', 'description_en', 'price', 'image', 'tv', 'closet',
        'safe', 'bar', 'cond', 'cabinet', 'wtable'];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'images');
    }

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }

    public function setTvAttribute($value){
        $this->attributes['tv'] = $value === 'on' ? 1 : 0;
    }

    public function setClosetAttribute($value){
        $this->attributes['closet'] = $value === 'on' ? 1 : 0;
    }

    public function setSafeAttribute($value){
        $this->attributes['safe'] = $value === 'on' ? 1 : 0;
    }

    public function setBarAttribute($value){
        $this->attributes['bar'] = $value === 'on' ? 1 : 0;
    }

    public function setCondAttribute($value){
        $this->attributes['cond'] = $value === 'on' ? 1 : 0;
    }

    public function setCabinetAttribute($value){
        $this->attributes['cabinet'] = $value === 'on' ? 1 : 0;
    }

    public function setWtableAttribute($value){
        $this->attributes['wtable'] = $value === 'on' ? 1 : 0;
    }

    public function isTv(){
        return $this->tv === 1;
    }

    public function isCloset(){
        return $this->closet === 1;
    }

    public function isSafe(){
        return $this->safe === 1;
    }

    public function isBar(){
        return $this->Bar === 1;
    }

    public function isCond(){
        return $this->cond === 1;
    }

    public function isCabinet(){
        return $this->cabinet === 1;
    }

    public function isWtable(){
        return $this->wtable === 1;
    }

}
