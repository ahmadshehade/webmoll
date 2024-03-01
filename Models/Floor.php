<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $fillable = ['floor_name','departments_count','moel_id'];
    protected $table='floors';
    public function mole(){
        return $this->belongsTo(Mole::class, 'moel_id', 'id');
    }
    public function investors(){
        return $this->belongsToMany(Investor::class,'investor_floor','floor_id','investor_id');
    }
    public function employes(){
        return $this->hasMany(Employe::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class, 'floor_id');
    }
}
