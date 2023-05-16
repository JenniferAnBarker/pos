<?php

namespace App\Models;

use App\Models\AdvanceSalary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function advance() {
        return $this->belongsTo(AdvanceSalary::class,'id','employee_id');
    }
}
