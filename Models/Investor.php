<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $fillable = [
        'mole_id','investor_name'
    ];
    protected $table='investors';

    public function mole()
    {
        return $this->belongsTo (Mole::class, 'mole_id');
    }
    public function onners(){
        return $this->belongsToMany(Onner::class,'investors_onner','investor_id','onner_id')
        ->withPivot('investor_name', 'onner_name');
    }
    public function floors(){
        return $this->belongsToMany(Floor::class,'investor_floor','investor_id','floor_id');
    }
    public function departments(){
        return $this->belongsToMany(Department::class,'investor_department','investor_id','department_id');
    }
}
