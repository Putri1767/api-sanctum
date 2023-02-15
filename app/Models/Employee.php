<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'gender',
        'hire_date',
        'birth_date'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
   }
}
