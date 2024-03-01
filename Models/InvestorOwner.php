<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorOwner extends Model
{
    use HasFactory;
    protected $fillable = [
        'investor_id','investor_name','onner_id','onner_name'
    ];
     protected $table='investors_onner';
}
