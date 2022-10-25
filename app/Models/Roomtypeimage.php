<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class Roomtypeimage extends Model
{
    use HasFactory;

    protected $fillable = ['room_type_id', 'img_src', 'img_alt'];

    public function room_type(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
