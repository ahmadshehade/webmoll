<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['department_name','mole_id','floor_id','employ_count','floor_name'];
    protected $table='departments';
    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }
    public function mole(){
        return $this->belongsTo(Mole::class,'mole_id');
    }
    public function investors(){
        return $this->belongsToMany(Investor::class,'investor_department','department_id','investor_id');
    }
    public function employees()
    {
        return $this->hasMany(Employe::class, 'department_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
