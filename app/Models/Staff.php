<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\StaffPayment;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'department_id', 'photo', 'bio', 'salary_type', 'salary_amt'];

    function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    function staffpayment(){
        return $this->hasMany(StaffPayment::class);
    }
}
