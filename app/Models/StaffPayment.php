<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;

class StaffPayment extends Model
{
    use HasFactory;

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
