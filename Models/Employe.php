<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = ['mole_id','department_id','floor_id','employ_name'
      ,'sallary','rank','floor_name','department_name'];
      protected $table='employees';
      public function floor(){
        return $this->belongsTo(Floor::class,'floor_id');
      }
      public function department(){
        return $this->belongsTo(Department::class,'department_id');
      }
      public function mole(){
        return $this->belongsTo(mole::class,'mole_id');
      }

}
