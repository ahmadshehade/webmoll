<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorFloor extends Model
{
    use HasFactory;
    protected $fillable = [
        'investor_id','floor_id','investor_name','floor_name'
    ];
    protected $table='investor_floor';
    
}
