<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mole extends Model
{
    use HasFactory;
    protected $fillable = ['name','Construction_time'];
    protected $table='moles';
    public function onner(){
        return $this->hasMany('App/Models/Onner');
    }
    public function investors(){
        return $this->hasMany(Investor::class);
    }
    public function floors(){
        return $this->hasMany(Floor::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function employes(){
        return $this->hasMany(Employe::class);
    }
}
