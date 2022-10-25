<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class Room extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'rt_id'];

    public function room_type(){
        return $this->belongsTo(RoomType::class, 'rt_id');
    }

}
