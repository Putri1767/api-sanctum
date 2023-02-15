<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emp_no',
        'salary',
        'from_date',
        'to_date'
    ];

    public function salary(){
        return $this->belongsTo(Salary::class);
   }
}
