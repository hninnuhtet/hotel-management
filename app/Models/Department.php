<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['title','detail'];

    function staff(){
        return $this->hasMany(Staff::class);
    }
}
