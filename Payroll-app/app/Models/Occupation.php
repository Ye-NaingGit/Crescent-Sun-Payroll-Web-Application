<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'baseSalary',
        'permission',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

}
