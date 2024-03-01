<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name','email','gender','serial_number','personal_image'
    ];
    protected $table='proflie';
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');

    }

}
