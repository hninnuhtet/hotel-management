<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'detail'];

    public function room(){
        return $this->hasMany(Room::class);
    }

    public function roomtypeimgs(){
        return $this->hasMany(Roomtypeimage::class);
    }
}
