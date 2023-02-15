<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emp_no',
        'title',
        'from_date',
        'to_date'
    ];

    public function title(){
        return $this->belongsTo(Title::class);
   }
}
