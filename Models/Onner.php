<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onner extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','gender','mole_id','Nationality','email'];
    protected $table='onner';



 public function mole(){
     return $this->belongsTo(Mole::class,'mole_id');
 }
 /**
  * The roles that belong to the Onner
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
  */
 public function investors()
 {
     return $this->belongsToMany(Investor::class,'investors_onner','onner_id','investor_id')
    ->withPivot('investor_name', 'onner_name');
 }
}
