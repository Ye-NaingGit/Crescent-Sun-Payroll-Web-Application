<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeID',
        'employeeName',
        'adminName',
        'adminID',
        'baseSalary',
        'attendence',
        'attendence_bonus',
        'bonus',
        'bonus_information',
        'fine',
        'fine_information',
        'total'
    ];

    public function employee(){
        return $this->belongsTo(User::class, 'employeeID');
    }

    public function admin(){
        return $this->belongsTo(User::class, 'adminID');
    }

}
